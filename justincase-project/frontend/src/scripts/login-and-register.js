function showForm(formId) {
  // Remove 'active' from all form-boxes
  document.querySelectorAll('.form-box').forEach(box => {
    box.classList.remove('active');
  });
  // Add 'active' to the selected form-box
  const activeBox = document.getElementById(formId);
  if (activeBox) {
    activeBox.classList.add('active');
  }
}

