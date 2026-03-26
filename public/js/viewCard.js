document.addEventListener('DOMContentLoaded', () => {
  
  const card = document.getElementById('viewCard');
  if (!card) return;

  const editBtn = document.getElementById('editBtn');
  const cancelBtn = document.getElementById('cancelBtn');

  const nameInput = card.querySelector('input[name="name"]');
  const descInput = card.querySelector('textarea[name="description"]');
  const catSelect = card.querySelector('select[name="idCategorie"]');

  if (!nameInput || !descInput) return;

  const initial = {
    name: nameInput.value,
    description: descInput.value,
    idCategorie: catSelect ? catSelect.value : null
  };

  function setEditMode(on) {
    card.classList.toggle('is-editing', on);
  }

  editBtn?.addEventListener('click', () => setEditMode(true));

  cancelBtn?.addEventListener('click', () => {
    nameInput.value = initial.name;
    descInput.value = initial.description;
    if (catSelect) catSelect.value = initial.idCategorie;
    setEditMode(false);
  });

  const toast = document.getElementById('toast');
  if (toast) {
    requestAnimationFrame(() => toast.classList.add('show'));
    setTimeout(() => toast.classList.remove('show'), 2600);
  }
});
