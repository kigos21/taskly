<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tasks - Taskly</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/favicon.ico" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800&family=Outfit:wght@200;400;600;800&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/69269c1ba0.js" crossorigin="anonymous"></script>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/tasks.css" />

  <!-- JS components -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
          <?php include 'calendarFeed.php' ?>
        ],
        eventBackgroundColor: '#ff9494',
        eventBorderColor: '#ff9494',
        eventTextColor: '#555555',
      });
      calendar.render();
    });
  </script>
</head>

<body>
  <div class="grid-container">
    <nav class="navbar">
      <h1 class="nav-brand">Taskly</h1>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
    </nav>
    <div class="views">
      <p>Views</p>
      <div class="views-list">
        <button class="views-item inactive-view" onclick="location.href = 'allTasks.php';">
          <i class="fa-solid fa-globe fa-lg"></i><span class="view-text">All</span>
        </button>
        <button class="views-item active-view" onclick="location.href = 'monthTasks.php';">
          <i class="fa-solid fa-calendar fa-lg"></i><span class="view-text">Month</span>
        </button>
        <button class="views-item inactive-view" onclick="location.href = 'todayTasks.php';">
          <i class="fa-solid fa-sun fa-lg"></i><span class="view-text">Today</span>
        </button>
      </div>
    </div>
    <div class="third-grid-container">
      <div class="calendar-container">
        <div id='calendar'></div>
      </div>
    </div>
</body>

</html>