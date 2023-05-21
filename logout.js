const logoutBtn = document.querySelector(".logout");
logoutBtn.addEventListener("click", () => {
  const confirmed = confirm("Do you want to log out of your session?");
  if (!confirmed) {
    event.preventDefault();
  }
});
