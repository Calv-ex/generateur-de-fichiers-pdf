<?php
$PDF = $PDF ?? null;

$firstname = $PDF['identity']['firstname'] ?? '';
$name = $PDF['identity']['name'] ?? '';
$jobTitle = $PDF['identity']['jobTitle'] ?? '';
$intro = $PDF['identity']['introduction'] ?? '';
$mail = $PDF['identity']['mail'] ?? '';
$tel = $PDF['identity']['tel'] ?? '';
$photo = $PDF['identity']['photo'] ?? '';

$skills = $PDF['skills'] ?? [];
$hobbies = $PDF['hobbies'] ?? [];
$experiences = $PDF['experiences'] ?? [];
$courses = $PDF['courses'] ?? [];
?>

<div class="displayResume">
  <table class="cv-table" role="presentation" cellspacing="0" cellpadding="0">
    <tr>
      <td class="cv-left" valign="top">
        <div class="cv-left-inner">
        <div class="cv-photo">
          <img
            class="pdp-preview"
            alt="Photo de profil"
            <?php if (!empty($photo)) : ?>
              src="<?= $photo ?>"
            <?php endif; ?>
          >
        </div>

        <div class="cv-block">
          <h6 class="cv-title">Contact</h6>
          <ul class="cv-list">
            <li class="mail-preview"><?= $mail ?></li>
            <li class="tel-preview"><?= $tel ?></li>
          </ul>
        </div>

        <div class="cv-block">
          <h6 class="cv-title">Compétences</h6>
          <div class="skills-preview">
            <?php if (!empty($skills)) : ?>
              <?php foreach ($skills as $s) : ?>
                <div><?= $s['label'] ?><?= !empty($s['level']) ? ' - ' . $s['level'] : '' ?></div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="cv-block">
          <h6 class="cv-title">Centres d’intérêt</h6>
          <div class="hobbies-preview">
            <?php if (!empty($hobbies)) : ?>
              <?php foreach ($hobbies as $h) : ?>
                <div><?= $h['label'] ?></div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
        </div>
        
      </td>

      <td class="cv-right" valign="top">
      <div class="cv-right-inner">
        <div class="cv-identity">
          <h2 class="cv-name">
            <span class="fullname__firstname firstname-preview"><?= $firstname ?></span>
            <span class="fullname__name name-preview"><?= $name ?></span>
          </h2>

          <h5 class="job-title-preview"><?= $jobTitle ?></h5>
          <p class="introduction-preview"><?= $intro ?></p>
        </div>

        <div class="cv-section">
          <h5 class="cv-section-title">Expériences professionnelles</h5>
          <div class="experiences-preview">
            <?php if (!empty($experiences)) : ?>
              <?php foreach ($experiences as $exp) : ?>
                <div class="cv-item">
                  <h6 class="cv-item-title"><?= $exp['title'] ?></h6>
                  <p class="cv-item-meta">
                    <strong><?= $exp['location'] ?></strong>
                    <?php if (!empty($exp['start']) || !empty($exp['end'])) : ?>
                      – <?= $exp['start'] ?> → <?= $exp['end'] ?>
                    <?php endif; ?>
                  </p>
                  <p class="cv-item-desc"><?= $exp['description'] ?></p>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="cv-section">
          <h5 class="cv-section-title">Formations</h5>
          <div class="courses-preview">
            <?php if (!empty($courses)) : ?>
              <?php foreach ($courses as $c) : ?>
                <div class="cv-item">
                  <h6 class="cv-item-title"><?= $c['title'] ?></h6>
                  <p class="cv-item-meta">
                    <strong><?= $c['location'] ?></strong>
                    <?php if (!empty($c['start']) || !empty($c['end'])) : ?>
                      – <?= $c['start'] ?> → <?= $c['end'] ?>
                    <?php endif; ?>
                  </p>
                  <p class="cv-item-desc"><?= $c['description'] ?></p>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
        </div>
      </td>
    </tr>
  </table>
</div>
