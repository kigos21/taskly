const buttons = document.querySelectorAll(".submit-btn");
for (const button of buttons) {
  button.addEventListener("click", confirmDelete);
}

function confirmDelete() {
  const choice = confirm("Are you sure you want to do this?");
  if (!choice) {
    event.preventDefault();
  }
}
