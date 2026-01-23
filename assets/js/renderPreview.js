import { cvState } from "./cvState.js";
import { dateToFr } from "./dateUtils.js";

function renderSkills()
{
  const container = document.querySelector('.skills-preview');
  if (!container) return;

  container.innerHTML = "";

  cvState.skills.forEach(skill =>
  {
    const div = document.createElement('div');
    div.textContent = `${skill.label} - ${skill.level}`;
    container.appendChild(div);
  });
}

function renderHobbies()
{
  const container = document.querySelector('.hobbies-preview');
  if (!container) return;

  container.innerHTML = "";

  cvState.hobbies.forEach(hobby =>
  {
    const div = document.createElement('div');
    div.textContent = hobby.label;
    container.appendChild(div);
  });
}

function renderExperiences()
{
  const container = document.querySelector('.experiences-preview');
  if (!container) return;

  container.innerHTML = "";

  cvState.experiences.forEach(exp =>
  {
    const div = document.createElement("div");

    div.innerHTML = `
      <h6>${exp.title}</h6>
      <p><strong>${exp.location}</strong> – ${dateToFr(exp.start)} → ${dateToFr(exp.end)}</p>
      <p>${exp.description}</p>
    `;

    container.appendChild(div);
  });
}

function renderCourses()
{
  const container = document.querySelector('.courses-preview');
  if (!container) return;

  container.innerHTML = "";

  cvState.courses.forEach(course =>
  {
    const div = document.createElement("div");

    div.innerHTML = `
      <h6>${course.title}</h6>
      <p><strong>${course.location}</strong> – ${dateToFr(course.start)} → ${dateToFr(course.end)}</p>
      <p>${course.description}</p>
    `;

    container.appendChild(div);
  });
}

export function renderPreview()
{
  const firstname = document.querySelector(".firstname-preview");
  const name = document.querySelector(".name-preview");
  const job = document.querySelector(".job-title-preview");
  const mail = document.querySelector(".mail-preview");
  const tel = document.querySelector(".tel-preview");
  const photo = document.querySelector(".pdp-preview");
  const intro = document.querySelector(".introduction-preview");

  if (firstname) firstname.textContent = cvState.identity.firstname.toUpperCase();
  if (name) name.textContent = cvState.identity.name.toUpperCase();
  if (job) job.textContent = cvState.identity.jobTitle;
  if (mail) mail.textContent = cvState.identity.mail;
  if (tel) tel.textContent = cvState.identity.tel;
  if (intro) intro.textContent = cvState.identity.introduction;

  if (photo && cvState.identity.photo)
  {
    photo.src = cvState.identity.photo;
  }

  renderExperiences();
  renderCourses();
  renderHobbies();
  renderSkills();
}

