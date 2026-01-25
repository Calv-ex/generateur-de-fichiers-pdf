import { cvState } from "./cvState.js";
import { renderPreview } from "./renderPreview.js";

export function addSection({
  button,
  container,
  type = "default",
  previewSelector,
}) {
  button.addEventListener("click", (e) => {
    e.preventDefault();
    const previewContainer = document.querySelector(previewSelector);
    if (!previewContainer) return;
    const block = document.createElement("div");
    block.classList.add("block");

    const cross = document.createElement("img");
    cross.classList.add("close-block");
    cross.src = "../assets/images/x.svg";
    block.appendChild(cross);

    const input = document.createElement("input");
    input.classList.add("form-control");
    input.type = "text";
    input.setAttribute("required", true);

    if (type === "skill") {
      input.placeholder = "Compétence";

      const select = document.createElement("select");
      select.classList.add("form-select");

      ["débutant", "intermédiaire", "avancé"].forEach((level) => {
        const opt = document.createElement("option");
        opt.value = level;
        opt.textContent = level;
        select.appendChild(opt);
      });

      const skill = { label: "", level: select.value };
      cvState.skills.push(skill);

      input.addEventListener("input", () => {
        skill.label = input.value;
        renderPreview();
      });

      select.addEventListener("change", () => {
        skill.level = select.value;
        renderPreview();
      });

      cross.addEventListener("click", () => {
        const index = cvState.skills.indexOf(skill);
        if (index !== -1) {
          cvState.skills.splice(index, 1);
        }

        block.remove();
        renderPreview();
      });

      block.appendChild(input);
      block.appendChild(select);
    }
    else if (type === "hobby") {
      input.placeholder = "Centre d'intérêt";

      const hobby = { label: "" };
      cvState.hobbies.push(hobby);

      input.addEventListener("input", () => {
        hobby.label = input.value;
        renderPreview();
      });

      cross.addEventListener("click", () => {
        const index = cvState.hobbies.indexOf(hobby);
        if (index !== -1) {
          cvState.hobbies.splice(index, 1);
        }

        block.remove();
        renderPreview();
      });

      block.appendChild(input);
    }
    else if (type === "experience") {
      input.placeholder = "Titre de l'expérience";

      const locationInput = document.createElement("input");
      locationInput.placeholder = "Établissement / Lieu";
      locationInput.classList.add("form-control");
      locationInput.type = "text";

      const descriptionInput = document.createElement("input");
      descriptionInput.placeholder = "Description";
      descriptionInput.classList.add("form-control");
      descriptionInput.type = "text";

      const startDateInput = document.createElement("input");
      startDateInput.type = "date";
      startDateInput.classList.add("form-control");

      const endDateInput = document.createElement("input");
      endDateInput.type = "date";
      endDateInput.classList.add("form-control");

      const experience = {
        title: "",
        location: "",
        description: "",
        start: "",
        end: "",
      };

      cvState.experiences.push(experience);

      input.addEventListener("input", () => {
        experience.title = input.value;
        renderPreview();
      });

      locationInput.addEventListener("input", () => {
        experience.location = locationInput.value;
        renderPreview();
      });

      descriptionInput.addEventListener("input", () => {
        experience.description = descriptionInput.value;
        renderPreview();
      });

      startDateInput.addEventListener("input", () => {
        experience.start = startDateInput.value;
        renderPreview();
      });

      endDateInput.addEventListener("input", () => {
        experience.end = endDateInput.value;
        renderPreview();
      });

      cross.addEventListener("click", () => {
        const index = cvState.experiences.indexOf(experience);
        if (index !== -1) {
          cvState.experiences.splice(index, 1);
        }

        block.remove();
        renderPreview();
      });

      block.appendChild(input);
      block.appendChild(locationInput);
      block.appendChild(descriptionInput);
      block.appendChild(startDateInput);
      block.appendChild(endDateInput);
    }

    else if (type === "course") {
      input.placeholder = "Titre de la formation";

      const locationInput = document.createElement("input");
      locationInput.placeholder = "Établissement / Lieu";
      locationInput.classList.add("form-control");
      locationInput.type = "text";

      const descriptionInput = document.createElement("input");
      descriptionInput.placeholder = "Description";
      descriptionInput.classList.add("form-control");
      descriptionInput.type = "text";

      const startDateInput = document.createElement("input");
      startDateInput.type = "date";
      startDateInput.classList.add("form-control");

      const endDateInput = document.createElement("input");
      endDateInput.type = "date";
      endDateInput.classList.add("form-control");

      const course = {
        title: "",
        location: "",
        description: "",
        start: "",
        end: "",
      };

      cvState.courses.push(course);

      input.addEventListener("input", () => {
        course.title = input.value;
        renderPreview();
      });

      locationInput.addEventListener("input", () => {
        course.location = locationInput.value;
        renderPreview();
      });

      descriptionInput.addEventListener("input", () => {
        course.description = descriptionInput.value;
        renderPreview();
      });

      startDateInput.addEventListener("input", () => {
        course.start = startDateInput.value;
        renderPreview();
      });

      endDateInput.addEventListener("input", () => {
        course.end = endDateInput.value;
        renderPreview();
      });

      cross.addEventListener("click", () => {
        const index = cvState.courses.indexOf(course);
        if (index !== -1) {
          cvState.courses.splice(index, 1);
        }

        block.remove();
        renderPreview();
      });

      block.appendChild(input);
      block.appendChild(locationInput);
      block.appendChild(descriptionInput);
      block.appendChild(startDateInput);
      block.appendChild(endDateInput);
    }

    container.appendChild(block);
  });
}
