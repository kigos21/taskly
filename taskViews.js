const viewsArray = document.querySelectorAll(".views-list .views-item");
const path = window.location.pathname;
let viewObject;

if (path === "/taskly/allTasks.php") {
  viewObject = viewsArray[0];
} else if (path === "/taskly/monthTasks.php") {
  viewObject = viewsArray[1];
} else {
  viewObject = viewsArray[2];
}

viewObject.classList.remove("inactive-view");
viewObject.classList.add("active-view");
