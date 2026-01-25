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

  <form
  action="/export/export.php"
  method="POST"
  id="personalsData-form"
  class="personalsData-form"
  name="personalsData-form"
  novalidate>

  <div class="input-container">
    <label for="firstname">Prénom</label>
    <input
      type="text"
      id="firstname"
      class="form-control"
      name="firstname"
      value="John"
      placeholder="Ex : Jean"
      minlength="2"
      maxlength="50"
      autocomplete="given-name"
      data-uppercase
      data-preview=".firstname-preview"
      required
    >
  </div>

  <div class="input-container">
    <label for="name">Nom</label>
    <input
      type="text"
      id="name"
      class="form-control"
      name="name"
      value="Doe"
      placeholder="Ex : Dupont"
      minlength="2"
      maxlength="50"
      autocomplete="family-name"
      data-uppercase
      data-preview=".name-preview"
      required
    >
  </div>

  <div class="input-container">
    <label for="pdp">Photo professionnelle</label>
    <input
      type="file"
      id="pdp"
      class="form-control"
      name="pdp"
      accept="image/png,image/jpeg"
      aria-describedby="pdp-help"
      data-preview=".pdp-preview"
      required
    >
    <small id="pdp-help">
      Formats acceptés : JPG ou PNG – photo carrée recommandée
    </small>
  </div>

  <div class="input-container">
    <label for="job-title">Intitulé de poste</label>
    <input
      type="text"
      id="job-title"
      class="form-control"
      name="job-title"
      value="Étudiant développement web"
      placeholder="Ex : Développeur web junior"
      minlength="3"
      maxlength="80"
      autocomplete="organization-title"
      data-preview=".job-title-preview"
      required
    >
  </div>

  <div class="input-container">
    <label for="introduction">Présentation professionnelle</label>
    <input
      type="text"
      id="introduction"
      class="form-control"
      name="introduction"
      value="Passionné par la programmation et le sport..."
      placeholder="Résumé professionnel (2–3 phrases)"
      minlength="30"
      maxlength="300"
      data-preview=".introduction-preview"
      required
    >
  </div>

  <div class="input-container">
    <label for="mail">Adresse e-mail</label>
    <input
      type="email"
      id="mail"
      class="form-control"
      name="mail"
      value="prenom.nom@domain.com"
      placeholder="prenom.nom@email.com"
      autocomplete="email"
      pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$"
      data-preview=".mail-preview"
      required
    >
  </div>

  <div class="input-container">
    <label for="tel">Numéro de téléphone</label>
    <input
      type="tel"
      id="tel"
      class="form-control"
      name="tel"
      value="01 23 45 67 89"
      placeholder="06 12 34 56 78"
      autocomplete="tel"
      pattern="^(\+33|0)[1-9](\s?\d{2}){4}$"
      data-preview=".tel-preview"
      required
    >
  </div>

  <div class="input-container">
    <button id="add-skill" class="form-control" type="button">
      Ajouter une compétence
    </button>
    <section class="skills-container composant-container"></section>
  </div>

  <div class="input-container">
    <button id="add-hobby" class="form-control" type="button">
      Ajouter un centre d’intérêt
    </button>
    <section class="hobbies-container composant-container"></section>
  </div>

  <div class="input-container">
    <button id="add-experience" class="form-control" type="button">
      Ajouter une expérience
    </button>
    <section class="experiences-container composant-container"></section>
  </div>

  <div class="input-container">
    <button id="add-course" class="form-control" type="button">
      Ajouter une formation
    </button>
    <section class="courses-container composant-container"></section>
  </div>

  <input type="hidden" name="cv_json" id="cv_json" value="">
  <input type="hidden" name="template_name" id="template_name" value="1default">

  <button 
  type="button"
  id="download-pdf"
  class="form-control">
  Télécharger le PDF
  </button>


</formaction=>

    </section>
  </aside>