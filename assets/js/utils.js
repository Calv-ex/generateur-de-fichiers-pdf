import { getElements } from "./var.js";
import { cvState } from "./cvState.js";
import { openSidebar } from "./openSidebar.js";
import { templateSelection } from "./templateSelection.js";
import { addSection } from "./addSection.js";
import { renderPreview } from "./renderPreview.js";

document.addEventListener("DOMContentLoaded", () =>
{

  const
  {
    personalsDataForm,
    formlink,
    sidebar,
    closeBtn,
    templatesContainer,
    previewZone,

    addSkillBtn,
    skillsContainer,

    addHobbyBtn,
    hobbiesContainer,

    addExperienceBtn,
    experiencesContainer,

    addCourseBtn,
    coursesContainer,

    inputsToPreview,
    firstnameInput,
    nameInput,
    jobTitleInput,
    pdpInput,
    mailInput,
    telInput,

    previewFirstname,
    previewName,
    previewPdp,
    previewJobTitle,
    previewMail,
    previewTel,
    previewSkills,
    previewHobbies,
    previewExperiences,
    previewCourses
  } = getElements();

  openSidebar({formlink, sidebar, closeBtn});
  templateSelection({templatesContainer, previewZone, form: personalsDataForm});

  addSection({ 
    button: addSkillBtn, 
    container: skillsContainer, 
    type: 'skill',
    previewSelector: '.skills-preview',
  });

   addSection({ 
    button: addHobbyBtn, 
    container: hobbiesContainer, 
    type: 'hobby',
    previewSelector: '.hobbies-preview',
  });

  addSection({ 
    button: addExperienceBtn, 
    container: experiencesContainer, 
    type: 'experience',
    previewSelector: '.experiences-preview',
  });

  addSection({ 
    button: addCourseBtn, 
    container: coursesContainer, 
    type: 'course',
    previewSelector: '.courses-preview',
  });

  firstnameInput.addEventListener("input", () =>
  {
    cvState.identity.firstname = firstnameInput.value;
    renderPreview();
  });

  nameInput.addEventListener("input", () =>
  {
    cvState.identity.name = nameInput.value;
    renderPreview();
  });

  jobTitleInput.addEventListener("input", () =>
  {
    cvState.identity.jobTitle = jobTitleInput.value;
    renderPreview();
  });

  mailInput.addEventListener("input", () =>
  {
    cvState.identity.mail = mailInput.value;
    renderPreview();
  });

  telInput.addEventListener("input", () =>
  {
    cvState.identity.tel = telInput.value;
    renderPreview();
  });

  pdpInput.addEventListener("change", () => {
    const file = pdpInput.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = () =>
    {
      cvState.identity.photo = reader.result;
      renderPreview();
    };
    reader.readAsDataURL(file);
  });
});
