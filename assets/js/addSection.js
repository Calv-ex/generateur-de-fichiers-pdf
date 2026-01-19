export function addSection({ button, container, type = 'default', previewContainer = null })
{
  button.addEventListener("click", (e) =>
  {
    e.preventDefault();

    const block = document.createElement("div");
    block.classList.add("block", "card");

    const input = document.createElement("input");
    input.classList.add("form-control");
    input.type = "text";

    // Gestion des compétences
    if (type === 'skill') 
    {
      input.placeholder = "Compétence";
      const preview = document.createElement("div");
      previewContainer.appendChild(preview);
      input.addEventListener("input", () => preview.textContent = input.value);
      
      // On ajoute l'input au bloc
      block.appendChild(input);
    }
    
    // Gestion des hobbies
    else if (type === 'hobby') 
    {
      input.placeholder = "Centre d'intérêt";
      const preview = document.createElement("div");
      previewContainer.appendChild(preview);
      input.addEventListener("input", () => preview.textContent = input.value);
      
      // On ajoute l'input au bloc
      block.appendChild(input);
    }
    
    // Gestion des expériences (avec inputs supplémentaires)
    else if (type === 'experience')
    {
      input.placeholder = "Titre de l'expérience";
      
      // Création de l'input pour la localisation
      const locationInput = document.createElement('input');
      locationInput.placeholder = "Lieu / Adresse";
      locationInput.classList.add('form-control');
      locationInput.type = "text";
      
      // Création de l'input pour la date de début
      const startDateInput = document.createElement('input');
      startDateInput.placeholder = "Date de début";
      startDateInput.classList.add('form-control');
      startDateInput.type = "text"; // Tu pourrais aussi utiliser type="date"
      
      // Création de l'input pour la date de fin
      const endDateInput = document.createElement('input');
      endDateInput.placeholder = "Date de fin";
      endDateInput.classList.add('form-control');
      endDateInput.type = "text"; // Tu pourrais aussi utiliser type="date"
      
      // Si tu as un conteneur de preview, tu peux créer les éléments de prévisualisation
      if (previewContainer)
      {
        const previewTitle = document.createElement("h3");
        const previewLocation = document.createElement("p");
        const previewPeriod = document.createElement("p");
        
        previewContainer.appendChild(previewTitle);
        previewContainer.appendChild(previewLocation);
        previewContainer.appendChild(previewPeriod);
        
        // Liaison des inputs avec la prévisualisation
        input.addEventListener("input", () => previewTitle.textContent = input.value);
        locationInput.addEventListener("input", () => previewLocation.textContent = locationInput.value);
        startDateInput.addEventListener("input", () => {
          previewPeriod.textContent = `${startDateInput.value} - ${endDateInput.value}`;
        });
        endDateInput.addEventListener("input", () => {
          previewPeriod.textContent = `${startDateInput.value} - ${endDateInput.value}`;
        });
      }
      
      // IMPORTANT : On ajoute tous les inputs au bloc dans l'ordre voulu
      block.appendChild(input);
      block.appendChild(locationInput);
      block.appendChild(startDateInput);
      block.appendChild(endDateInput);
    }
    
    // Gestion des formations (similaire aux expériences)
    else if (type === 'course')
    {
      input.placeholder = "Titre de la formation";
      
      const locationInput = document.createElement('input');
      locationInput.placeholder = "Établissement / Lieu";
      locationInput.classList.add('form-control');
      locationInput.type = "text";
      
      const startDateInput = document.createElement('input');
      startDateInput.placeholder = "Date de début";
      startDateInput.classList.add('form-control');
      startDateInput.type = "text";
      
      const endDateInput = document.createElement('input');
      endDateInput.placeholder = "Date de fin";
      endDateInput.classList.add('form-control');
      endDateInput.type = "text";
      
      // Même logique de preview si nécessaire
      if (previewContainer)
      {
        const previewTitle = document.createElement("h3");
        const previewLocation = document.createElement("p");
        const previewPeriod = document.createElement("p");
        
        previewContainer.appendChild(previewTitle);
        previewContainer.appendChild(previewLocation);
        previewContainer.appendChild(previewPeriod);
        
        input.addEventListener("input", () => previewTitle.textContent = input.value);
        locationInput.addEventListener("input", () => previewLocation.textContent = locationInput.value);
        startDateInput.addEventListener("input", () => {
          previewPeriod.textContent = `${startDateInput.value} - ${endDateInput.value}`;
        });
        endDateInput.addEventListener("input", () => {
          previewPeriod.textContent = `${startDateInput.value} - ${endDateInput.value}`;
        });
      }
      
      block.appendChild(input);
      block.appendChild(locationInput);
      block.appendChild(startDateInput);
      block.appendChild(endDateInput);
    }

    // Ajout du bloc complet au conteneur
    container.appendChild(block);
  });
}