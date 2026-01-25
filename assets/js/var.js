export function getElements() {
  return {
    personalsDataForm: document.getElementById("personalsData-form"),
    previewZone: document.getElementById("preview-zone"),

    formlink: document.getElementById("formlink"),
    sidebar: document.getElementById("sidebar"),
    closeBtn: document.getElementById("closeSidebar"),

    addExperienceBtn: document.getElementById("add-experience"),
    experiencesContainer: document.querySelector(".experiences-container"),

    addCourseBtn: document.getElementById("add-course"),
    coursesContainer: document.querySelector(".courses-container"),

    addSkillBtn: document.getElementById("add-skill"),
    skillsContainer: document.querySelector(".skills-container"),

    addHobbyBtn: document.getElementById("add-hobby"),
    hobbiesContainer: document.querySelector(".hobbies-container"),

    templatesContainer: document.getElementById("templates-container"),

    inputsToPreview: document.querySelectorAll("input[data-preview]"),
    firstnameInput: document.getElementById("firstname"),
    nameInput: document.getElementById("name"),
    jobTitleInput: document.getElementById("job-title"),
    introductionInput: document.getElementById("introduction"),
    pdpInput: document.getElementById("pdp"),
    mailInput: document.getElementById("mail"),
    telInput: document.getElementById("tel"),

    previewFirstname: document.querySelector(".fullname__firstname"),
    previewName: document.querySelector(".fullname__name"),
    previewPdp: document.querySelector(".pdp-preview"),
    previewJobTitle: document.querySelector(".main-data__job-title"),
    previewIntroduction: document.querySelector(".introduction-preview"),
    previewMail: document.querySelector(".mail-preview"),
    previewTel: document.querySelector(".tel-preview"),
    previewSkills: document.querySelector(".skills-preview"),
    previewHobbies: document.querySelector(".hobbies-preview"),
    previewExperiences: document.querySelector(".experiences-preview"),
    previewCourses: document.querySelector(".courses-preview"),
  };
}
