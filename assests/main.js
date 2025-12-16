const titleEror = document.querySelector(".title-error");
const descEror = document.querySelector(".desc-error");
const levelError = document.querySelector(".level-error");
function openModal() {
    document.getElementById("modal-overlay").classList.add("show");
    console.log()
    titleEror.textContent = "*";
    descEror.textContent = "*"
    levelError.textContent = "*";

}
function closeModal() {
    document.getElementById("modal-overlay").classList.remove("show");
}

const form = document.getElementById("courseForm");
const saveBtn = document.getElementById("add-course-form");
saveBtn.addEventListener("click", (e) => {
    e.preventDefault();
    let isValid = true;
    const title = document.getElementById("course-title");
    const description = document.getElementById("course-desc");
    const level = document.getElementById("level");
    const successMessage = document.querySelector(".success");
    const titleEror = document.querySelector(".title-error");
    const descEror = document.querySelector(".desc-error");
    const levelError = document.querySelector(".level-error");

    console.log(title)
    console.log(description)
    if (!title.value.trim()) {
        title.focus();
        titleEror.textContent += " Enter a Valid Title";
        isValid = false;
    }
    if (!description.value.trim()) {
        description.focus();
        descEror.textContent += " Enter a Valid Description"
        isValid = false;
    }
    const allowedLevels = ["Beginner", "Intermediate", "Advanced"];
    if (!allowedLevels.includes(level.value)) {
        levelError.textContent = "Invalid level selected!";
        isValid = false;
    }

    if (isValid) {

        successMessage.style.display = "block";
        successMessage.style.color = "green";
        successMessage.textContent = "Course added successfully!";
        setTimeout(() => {
            successMessage.textContent = "";
            successMessage.style.display = "none";
            form.submit();
            form.reset();
        }, 1000);

    }

});
