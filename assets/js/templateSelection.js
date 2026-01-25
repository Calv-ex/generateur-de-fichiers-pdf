import { cvState } from "./cvState.js";
import { renderPreview } from "./renderPreview.js";

export function templateSelection({ templatesContainer, previewZone }) {
  templatesContainer.addEventListener("click", (e) => {
    const card = e.target.closest(".card-template");
    if (!card) return;

    const templateName = card.dataset.templateName;
    cvState.template = templateName;

    fetch("../templates/" + templateName + ".php")
      .then((res) => res.text())
      .then((html) => {
        previewZone.innerHTML = html;
        renderPreview();
      });

    const templateCss = document.getElementById("template-css");
    if (templateCss) {
      templateCss.href = `../assets/css/templates/${templateName}.web.css`;
    }
  });
}
