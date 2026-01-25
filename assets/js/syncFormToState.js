import { cvState } from "./cvState.js";
import { renderPreview } from "./renderPreview.js";

export function syncFormToState() {
  cvState.identity.firstname =
    document.querySelector("#firstname")?.value || "";

  cvState.identity.name = document.querySelector("#name")?.value || "";

  cvState.identity.jobTitle = document.querySelector("#job-title")?.value || "";

  cvState.identity.mail = document.querySelector("#mail")?.value || "";

  cvState.identity.tel = document.querySelector("#tel")?.value || "";

  cvState.identity.introduction =
    document.querySelector("#introduction")?.value || "";

  renderPreview();
}
