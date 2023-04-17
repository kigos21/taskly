<?php

session_start();
if (!(isset($_SESSION['email']))) {
  header('Location: index.php');
  exit();
}

?>

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
</head>

<body>
  <div class="grid-container">
    <nav class="navbar">
      <h1 class="nav-brand">Taskly</h1>
      <ul class="navbar-nav">
        <?php
        if (isset($_SESSION['email'])) {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="#">Profile</a>';
          echo '</li>';
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="logout.php">Log out</a>';
          echo '</li>';
        } else {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="login.php">Log in</a>';
          echo '</li>';
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="signup.php">Sign up</a>';
          echo '</li>';
        }
        ?>
      </ul>
    </nav>
    <div class="views">
      <p>Views</p>
      <div class="views-list">
        <button class="views-item active-view">
          <i class="fa-solid fa-globe fa-lg"></i><span class="view-text">All</span>
        </button>
        <button class="views-item inactive-view">
          <i class="fa-solid fa-calendar fa-lg"></i><span class="view-text">Month</span>
        </button>
        <button class="views-item inactive-view">
          <i class="fa-solid fa-sun fa-lg"></i><span class="view-text">Today</span>
        </button>
      </div>
    </div>
    <div class="tasks-container">
      <form action="" method="">
        <input class="form-details" type="text" required maxlength="44" name="taskTitleInput" id="taskTitleInput" placeholder="Task title">
        <input class="form-details" type="date" required name="taskDueInput" id="taskDueInput" placeholder="Due date">
        <div class="btn-group">
          <input class="form-btn" type="reset" id="resetBtn" value="Clear">
          <input class="form-btn" type="submit" id="submitBtn" value="Add">
        </div>
      </form>

      <div class="hrule"></div>

      <!-- TODO: render data -->
      <div class="task-item">
        <div class="task-details">
          <p class="task-title">Task Title</p>
          <p class="task-due">Due Date</p>
        </div>
        <button class="delete-btn">
          <i class="fa-solid fa-trash fa-lg" style="color: #555555;"></i>
        </button>
      </div>
      <div class="task-item">
        <div class="task-details">
          <p class="task-title">Task Title</p>
          <p class="task-due">Due Date</p>
        </div>
        <button class="delete-btn">
          <i class="fa-solid fa-trash fa-lg" style="color: #555555;"></i>
        </button>
      </div>
      <div class="task-item">
        <div class="task-details">
          <p class="task-title">Prelims_CIP-Task-1</p>
          <p class="task-due">Due Date</p>
        </div>
        <button class="delete-btn">
          <i class="fa-solid fa-trash fa-lg" style="color: #555555;"></i>
        </button>
      </div>
      <div class="task-item">
        <div class="task-details">
          <p class="task-title">123456789012345678901234567890123456789012345678901234567890</p>
          <p class="task-due">Due Date</p>
        </div>
        <button class="delete-btn">
          <i class="fa-solid fa-trash fa-lg" style="color: #555555;"></i>
        </button>
      </div>
    </div>
  </div>
</body>

</html>