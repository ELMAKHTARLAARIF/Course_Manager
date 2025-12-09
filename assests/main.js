// Open/close Add Course modal
function openModal() {
    document.getElementById("modal-overlay").classList.add("show");
}
function closeModal() {
    document.getElementById("modal-overlay").classList.remove("show");
}

const form = document.getElementById("courseForm");
const saveBtn = document.getElementById("add-course-form");
// const successMessage = document.querySelector(".successMsg");

saveBtn.addEventListener("click", (e) => {
    e.preventDefault();
    let isValid = true;
    const title = document.getElementById("course-title");
    const description = document.getElementById("course-desc");
    const errorMessage = document.querySelector(".error");
    const successMessage = document.querySelector(".success");

    console.log(title)
    console.log(description)
    if (!title.value.trim()) {
        title.focus();
        isValid = false;
        return;
    }
    if (!description.value.trim()) {
        description.focus();
        isValid = false;
        return;
    }
    if (isValid) {  
        errorMessage.textContent = "";
        errorMessage.style.display = "none";
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


function showModalsections(courseId) {
    const courseSectionsModal = document.getElementById('course-sections-modal');
    if (courseSectionsModal) courseSectionsModal.classList.add('show');
}

function closeSectionsModal() {
    const courseSectionsModal = document.getElementById('course-sections-modal');
    if (courseSectionsModal) courseSectionsModal.classList.remove('show');
}

function showAddSectionModal(courseId) {
    const addSectionModal = document.getElementById('add-section-modal');
    if (addSectionModal) addSectionModal.classList.add('show');
}

function closeAddSectionModal() {
    const addSectionModal = document.getElementById('add-section-modal');
    if (addSectionModal) addSectionModal.classList.remove('show');
}
