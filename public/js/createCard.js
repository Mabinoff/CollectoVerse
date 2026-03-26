const uploadBtn = document.getElementById("uploadBtn");
const previewImage = document.getElementById("previewImage");
const uploadPlaceholder = document.getElementById("uploadPlaceholder");
const imageSection = document.querySelector(".image-section");


uploadBtn.addEventListener("click", () => {
    const fileInput = document.getElementById("fileInput");
    fileInput.click();
});


fileInput.addEventListener("change", () => {
    if (fileInput.files.length > 0) {
        handleFile(fileInput.files[0]);
    }
});


imageSection.addEventListener("dragover", (e) => {
    e.preventDefault();
    imageSection.classList.add("drag-over");
});

imageSection.addEventListener("dragleave", () => {
    imageSection.classList.remove("drag-over");
});

imageSection.addEventListener("drop", (e) => {
    e.preventDefault();
    imageSection.classList.remove("drag-over");

    const file = e.dataTransfer.files[0];
    if (file) {
        handleFile(file);
        fileInput.files = e.dataTransfer.files; 
    }
});

function handleFile(file) {
    if (!file.type.startsWith("image/")) {
        alert("Veuillez déposer une image valide.");
        return;
    }

    const reader = new FileReader();
    reader.onload = () => {
        previewImage.src = reader.result;
        previewImage.style.display = "block";
        uploadPlaceholder.style.display = "none";
        uploadBtn.textContent = "Changer l’image";
    };
    reader.readAsDataURL(file);
}


function resetForm() {
    document.getElementById('name').value = ""
    document.getElementById('categorie').value = ""
    document.getElementById('description').value = ""
    document.getElementById('fileInput').value = ""
}

const openModalBtn = document.getElementById("openCategoryModal");
const modal = document.getElementById("simpleModal");

const modalCategorie = document.getElementById("modalCategorieSelect");
const modalColorInput = document.getElementById("modalColorInput");
const modalColorDot = document.getElementById("modalColorDot");
const validateBtn = document.getElementById("validateCategory");

const baseSelect = document.getElementById("baseCategorieSelect");
const baseColorDot = document.getElementById("baseColorDot");
const hiddenColor = document.getElementById("categoryColor");

openModalBtn.addEventListener("click", () => {
  modal.classList.add("active");
});

modal.addEventListener("click", (e) => {
  if (e.target === modal) modal.classList.remove("active");
});

modalColorInput.addEventListener("input", () => {
  modalColorDot.style.backgroundColor = modalColorInput.value;
});

validateBtn.addEventListener("click", () => {
  const categoryValue = modalCategorie.value;
  const categoryLabel = modalCategorie.options[modalCategorie.selectedIndex]?.text;
  const color = modalColorInput.value;

  if (!categoryValue) {
    alert("Choisis une catégorie");
    return;
  }

  let existing = [...baseSelect.options].find(
    opt => opt.value === categoryValue
  );

  if (!existing) {
    const option = document.createElement("option");
    option.value = categoryValue;
    option.textContent = categoryLabel;
    option.dataset.color = color;
    baseSelect.appendChild(option);
    existing = option;
  }

  baseSelect.value = existing.value;
  baseColorDot.style.backgroundColor = color;
  hiddenColor.value = color;

  modal.classList.remove("active");
});

baseSelect.addEventListener("change", () => {
  const opt = baseSelect.selectedOptions[0];
  const color = opt?.dataset.color;

  baseColorDot.style.backgroundColor = color || "transparent";
  hiddenColor.value = color || "";
});

modalColorDot.style.backgroundColor = modalColorInput.value;
