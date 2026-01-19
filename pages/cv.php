<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer mon CV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/cv.css">
</head>
<body class="create-page">
  <nav class="navbar">
    <ul class="navbar__ul">
      <li class="navbar__li">
        <a href="" class="navlink">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navicon"><path d="M4 5h16"/><path d="M4 12h16"/><path d="M4 19h16"/></svg>
        </a>
      </li>
      <li class="navbar__li">
        <a href="" class="navlink">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navicon"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        </a>
        <span>Accueil</span>
      </li>
      <li class="navbar__li">
        <button class="navlink" id="formlink">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navicon"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M16 22a4 4 0 0 0-8 0"/><circle cx="12" cy="15" r="3"/></svg>
        </button>
        <span>Formulaire</span>
      </li>
    </ul>
  </nav>
  <aside class="sidebar" id="sidebar">
    <button class="sidebar-close" id="closeSidebar" aria-label="Fermer le formulaire">
      <svg class="sidebar-close__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>
    <section class="form-container">
      <h2>Informations générales</h2>

      <details class="templates-details">
        <summary class="templates-summary">
          <span class="summary-label">Templates</span>
          <span class="summary-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg></span>
        </summary>

        <div class="templates-container" id="templates-container">
          <?php
          if (file_exists("../templates"))
          {
            $templatesFolder = scandir("../templates");
            $templateIndex = 1;

            for ($i = 0; $i < count($templatesFolder); $i++)
            {
              if (str_contains($templatesFolder[$i], ".php"))
              {
                $templateName = substr($templatesFolder[$i], 0, -4);

                preg_match('/^(\d+)/', $templateName, $matches);
                $fileNumber = $matches[1] ?? $templateIndex;

                echo '
                <div class="card-template" id="template' . $i . '" data-template-name="' . $templateName . '">
                  <img src="../assets/images/' . $templateName . '.png" alt="" class="template-img">
                  <p class="template-name">' . ucfirst($templateName) . '</p>
                </div>';

                $templateIndex++;
              }
            }
          }
          else
          {
            echo "Le dossier template n'est pas trouvé";
          }
          ?>
        </div>
      </details>

      <form action="" id="personalsData-form" class="personalsData-form" name="personalsData-form">

        <div class="input-container">
          <label for="firstname">Prénom</label>
          <input type="text" id="firstname" class="form-control" name="firstname" value="John">
        </div>

        <div class="input-container">
          <label for="name">Nom</label>
          <input type="text" id="name" class="form-control" name="name" value="Doe">
        </div>

        <div class="input-container">
          <label for="pdp">Photo</label>
          <input type="file" accept="image/png, image/jpeg" id="pdp" class="form-control" name="pdp">
        </div>

        <div class="input-container">
          <label for="job-title">Intitulé de poste</label>
          <input type="text" id="job-title" class="form-control" name="job-title" value="Étudiant développement web">
        </div>

        <div class="input-container">
          <label for="mail">Adresse mail</label>
          <input type="email" id="mail" class="form-control" name="mail">
        </div>

        <div class="input-container">
          <label for="tel">Numéro de téléphone</label>
          <input type="tel" id="tel" class="form-control" name="tel">
        </div>

        <div class="input-container">
          <button id="add-skill" class="form-control">
            Ajouter une compétences
          </button>
          <section class="skills-container composant-container">

          </section>
        </div>

        <div class="input-container">
          <button id="add-hobby" class="form-control">
            Ajouter un centre d'intérêt
          </button>
          <section class="hobbies-container composant-container">

          </section>
        </div>

        <div class="input-container">
          <button id="add-experience" class="form-control">
            Ajouter une expérience
          </button>
          <section class="experiences-container composant-container">

          </section>
        </div>

        <div class="input-container">
          <button id="add-course" class="form-control">
            Ajouter une formation
          </button>
          <section class="courses-container composant-container">

          </section>
        </div>

        <input type="submit" name="submit" value="Télécharger le PDF" class="form-control">
      </form>
    </section>
  </aside>

  <section class="displayContainer">
    <div id="zone-zoom">
      <?php
        require_once "../templates/1default.php";
      ?>
    </div>
  </section>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <!-- <script src="/assets/js/var.js"></script> -->
  <script type="module" src="/assets/js/utils.js"></script>
</body>
</html>