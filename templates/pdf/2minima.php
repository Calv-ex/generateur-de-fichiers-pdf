<?php
$identity    = $PDF['identity'] ?? [];
$skills      = $PDF['skills'] ?? [];
$hobbies     = $PDF['hobbies'] ?? [];
$experiences = $PDF['experiences'] ?? [];
$courses     = $PDF['courses'] ?? [];

$fn    = strtoupper($identity['firstname'] ?? '');
$ln    = strtoupper($identity['name'] ?? '');
$job   = $identity['jobTitle'] ?? '';
$intro = $identity['introduction'] ?? '';
$mail  = $identity['mail'] ?? '';
$tel   = $identity['tel'] ?? '';
$photo = $identity['photo'] ?? null;
?>

<div class="displayResume">
  <table class="cv-table" role="presentation" cellspacing="0" cellpadding="0">
    <tr>

      <td class="cv-left" valign="top">
        <div class="cv-left-inner">

          <div class="cv-photo">
            <?php if ($photo): ?>
              <img class="pdp-preview" alt="Photo de profil" src="<?= htmlspecialchars($photo) ?>">
            <?php else: ?>
              <div class="pdp-preview pdp-placeholder"></div>
            <?php endif; ?>
          </div>

          <div class="cv-block">
            <h6 class="cv-title">Contact</h6>
            <ul class="cv-list">
              <li class="mail-preview"><?= htmlspecialchars($mail) ?></li>
              <li class="tel-preview"><?= htmlspecialchars($tel) ?></li>
            </ul>
          </div>

          <div class="cv-block">
            <h6 class="cv-title">Compétences</h6>
            <div class="skills-preview">
              <?php foreach ($skills as $s): ?>
                <div><?= htmlspecialchars(($s['label'] ?? '') . ' - ' . ($s['level'] ?? '')) ?></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="cv-block">
            <h6 class="cv-title">Centres d’intérêt</h6>
            <div class="hobbies-preview">
              <?php foreach ($hobbies as $h): ?>
                <div><?= htmlspecialchars($h['label'] ?? '') ?></div>
              <?php endforeach; ?>
            </div>
          </div>

        </div>
      </td>

      <td class="cv-right" valign="top">
        <div class="cv-right-inner">

          <div class="cv-identity">
            <h2 class="cv-name">
              <span class="fullname__firstname firstname-preview"><?= htmlspecialchars($fn) ?></span>
              <span class="fullname__name name-preview"><?= htmlspecialchars($ln) ?></span>
            </h2>
            <h5 class="job-title-preview"><?= htmlspecialchars($job) ?></h5>
            <p class="introduction-preview"><?= htmlspecialchars($intro) ?></p>
          </div>

          <div class="cv-section">
            <h5 class="cv-section-title">Expériences professionnelles</h5>
            <div class="experiences-preview">
              <?php foreach ($experiences as $e): ?>
                <div class="cv-item">
                  <div class="cv-item-title"><?= htmlspecialchars($e['title'] ?? '') ?></div>
                  <div class="cv-item-meta">
                    <strong><?= htmlspecialchars($e['location'] ?? '') ?></strong>
                    – <?= htmlspecialchars($e['start'] ?? '') ?> → <?= htmlspecialchars($e['end'] ?? '') ?>
                  </div>
                  <div class="cv-item-desc"><?= htmlspecialchars($e['description'] ?? '') ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="cv-section">
            <h5 class="cv-section-title">Formations</h5>
            <div class="courses-preview">
              <?php foreach ($courses as $c): ?>
                <div class="cv-item">
                  <div class="cv-item-title"><?= htmlspecialchars($c['title'] ?? '') ?></div>
                  <div class="cv-item-meta">
                    <strong><?= htmlspecialchars($c['location'] ?? '') ?></strong>
                    – <?= htmlspecialchars($c['start'] ?? '') ?> → <?= htmlspecialchars($c['end'] ?? '') ?>
                  </div>
                  <div class="cv-item-desc"><?= htmlspecialchars($c['description'] ?? '') ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

        </div>
      </td>

    </tr>
  </table>
</div>
