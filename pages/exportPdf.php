<?php
declare(strict_types=1);

use Dompdf\Dompdf;

require_once __DIR__ . '/../vendor/autoload.php';

function dateToFr(?string $value): string {
  if (!$value) return "";
  $ts = strtotime($value);
  return $ts ? date("d/m/Y", $ts) : "";
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  header('Content-Type: text/plain; charset=utf-8');
  exit('Method Not Allowed');
}

try {
  $raw = file_get_contents('php://input');
  if ($raw === false || trim($raw) === '') {
    throw new RuntimeException("Body vide (php://input)");
  }

  $PDF = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
  if (!is_array($PDF)) {
    throw new RuntimeException("JSON invalide");
  }

  if (!empty($PDF['experiences']) && is_array($PDF['experiences'])) {
    foreach ($PDF['experiences'] as &$exp) {
      $exp['start'] = dateToFr($exp['start'] ?? '');
      $exp['end'] = dateToFr($exp['end'] ?? '');
    }
    unset($exp);
  }

  if (!empty($PDF['courses']) && is_array($PDF['courses'])) {
    foreach ($PDF['courses'] as &$c) {
      $c['start'] = dateToFr($c['start'] ?? '');
      $c['end'] = dateToFr($c['end'] ?? '');
    }
    unset($c);
  }

  $template = $PDF['template'] ?? '1default';

  $allowedTemplates = ['1default', '2minima'];
  if (!in_array($template, $allowedTemplates, true)) {
    $template = '1default';
  }

  $templatePath = __DIR__ . "/../templates/pdf/$template.php";
  if (!is_file($templatePath)) {
    throw new RuntimeException("Template PDF introuvable: $templatePath");
  }

  $cssPath = __DIR__ . "/../assets/css/pdf-$template.css";
  if (!is_file($cssPath)) {
    throw new RuntimeException("CSS PDF introuvable: $cssPath");
  }

  $css = file_get_contents($cssPath);
  if ($css === false) {
    throw new RuntimeException("Impossible de lire CSS: $cssPath");
  }

  $dompdf = new Dompdf();
  $dompdf->set_option('isRemoteEnabled', true);
  $dompdf->set_option('isHtml5ParserEnabled', true);

  ob_start();
  ?>
  <!doctype html>
  <html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>CV</title>
    <style><?= $css ?></style>
  </head>
  <body>
    <?php require $templatePath; ?>
  </body>
  </html>
  <?php
  $html = ob_get_clean();

  $dompdf->loadHtml($html, 'UTF-8');
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();
  $dompdf->stream('cv.pdf', ['Attachment' => true]);
  exit;

} catch (Throwable $e) {
  http_response_code(500);
  header('Content-Type: text/plain; charset=utf-8');
  exit("Export PDF échoué : " . $e->getMessage());
}
