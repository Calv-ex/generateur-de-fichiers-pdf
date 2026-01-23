import { renderPreview } from "./renderPreview.js";

export function templateSelection({ templatesContainer, previewZone })
{
  templatesContainer.addEventListener("click", (e) =>
  {
    const card = e.target.closest(".card-template");
    if (!card) return;

    const templateName = card.dataset.templateName;
    const fileName = templateName + ".php";

    fetch("../templates/" + fileName)
      .then(res => res.text())
      .then(html =>
      {
        previewZone.innerHTML = html;

        // 🔥 RECONSTRUIT LA PREVIEW DEPUIS LE STATE
        renderPreview();
      });
  });
}
