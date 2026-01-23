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
          <input
          type="text"
          id="firstname"
          class="form-control"
          name="firstname"
          value="John"
          data-uppercase
          data-preview=".firstname-preview"
          required>
        </div>

        <div class="input-container">
          <label for="name">Nom</label>
          <input
          type="text"
          id="name"
          class="form-control"
          name="name"
          value="Doe"
          data-uppercase
          data-preview=".name-preview"
          required>
        </div>

        <div class="input-container">
          <label for="pdp">Photo</label>
          <input
          type="file"
          accept="image/png,image/jpeg"
          id="pdp"
          class="form-control"
          name="pdp"
          data-preview=".pdp-preview"
          required>
        </div>

        <div class="input-container">
          <label for="job-title">Intitulé de poste</label>
          <input
          type="text"
          id="job-title" 
          class="form-control"
          name="job-title"
          value="Étudiant développement web"
          data-preview=".job-title-preview"
          required>
        </div>

        <div class="input-container">
          <label for="introduction">Présentation</label>
          <input
          type="text"
          id="introduction"
          class="form-control"
          name="introduction"
          value="Passionné par la programmation et le sport, je conçois des sites qui lient mes deux passions"
          data-preview=".introduction-preview"
          required>
        </div>

        <div class="input-container">
          <label for="mail">Adresse mail</label>
          <input
          type="email"
          id="mail"
          class="form-control"
          name="mail"
          value="prenom.nom@domain.com"
          data-preview=".mail-preview"
          required>
        </div>

        <div class="input-container">
          <label for="tel">Numéro de téléphone</label>
          <input
          type="tel"
          id="tel"
          class="form-control"
          name="tel"
          value="01 23 45 67 89"
          data-preview=".tel-preview"
          required>
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

        <input
        type="submit"
        name="submit"
        value="Télécharger le PDF"
        class="form-control"
        required>
      </form>
    </section>
  </aside>