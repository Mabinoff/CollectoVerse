document.addEventListener("DOMContentLoaded", () => {
  const filter = document.getElementById("filter");
  const categorie = document.querySelector(".categorie-section");

  if (!filter || !categorie) return;

  function toggle() {
    const open = categorie.classList.toggle("is-open");
    filter.setAttribute("aria-expanded", open ? "true" : "false");
  }

  filter.addEventListener("click", toggle);

  filter.addEventListener("keydown", (e) => {
    if (e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      toggle();
    }
  });

  categorie.addEventListener("click", (e) => {
    const link = e.target.closest("a");
    if (link) {
      categorie.classList.remove("is-open");
      filter.setAttribute("aria-expanded", "false");
    }
  });
});

document.addEventListener("click", (e) => {
  if (!categorie.classList.contains("is-open")) return;
  const isClickInside = categorie.contains(e.target) || filter.contains(e.target);
  if (!isClickInside) {
    categorie.classList.remove("is-open");
    filter.setAttribute("aria-expanded", "false");
  }
});
