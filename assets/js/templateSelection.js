export function templateSelection ({templatesContainer, zoomZone})
{
  templatesContainer.addEventListener("click", (e) =>
  {
    const card = e.target.closest(".card-template");
    if (!card) return;

    const templateName = card.dataset.templateName;
    const fileName = templateName + ".php";

    fetch("../templates/" + fileName)
      .then(res =>
      {
        if (!res.ok) throw new Error("Template introuvable");
        return res.text();
      })
      .then(html =>
      {
        zoomZone.innerHTML = html;
      })
      .catch(() =>
      {
        zoomZone.innerHTML = "<p>Erreur : template non trouvé</p>";
      });
  });
}