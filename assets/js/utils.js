import { getElements } from "./var.js";
import { openSidebar } from "./openSidebar.js";
import { templateSelection } from "./templateSelection.js";
import { addSection } from "./addSection.js";
import { displayData } from "./displayData.js";

document.addEventListener("DOMContentLoaded", () =>
{

  const
  {
    formlink,
    sidebar,
    closeBtn,
    templatesContainer,
    zoomZone,

    addExperienceBtn,
    experiencesContainer,

    addCourseBtn,
    coursesContainer,

    addSkillBtn,
    skillsContainer,

    addHobbyBtn,
    hobbiesContainer,

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
  templateSelection({templatesContainer, zoomZone});
  

  addSection({ 
    button: addExperienceBtn, 
    container: experiencesContainer, 
    type: 'experience',
    previewContainer: previewExperiences
  });

  addSection({ 
    button: addCourseBtn, 
    container: coursesContainer, 
    type: 'course',
    previewContainer: previewCourses
  });

  addSection({ 
    button: addSkillBtn, 
    container: skillsContainer, 
    type: 'skill',
    previewContainer: previewSkills 
  });

  addSection({ 
    button: addHobbyBtn, 
    container: hobbiesContainer, 
    type: 'hobby',
    previewContainer: previewHobbies 
  });

  nameInput.addEventListener("input", () => displayData(nameInput, previewName));
  firstnameInput.addEventListener("input", () => displayData(firstnameInput, previewFirstname));
  jobTitleInput.addEventListener("input", () => displayData(jobTitleInput, previewJobTitle));
  mailInput.addEventListener("input", () => displayData(mailInput, previewMail));
  telInput.addEventListener("input", () => displayData(telInput, previewTel));
  pdpInput.addEventListener("change", () => {
    const file = pdpInput.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = () => previewPdp.src = reader.result;
    reader.readAsDataURL(file);
  });
});
