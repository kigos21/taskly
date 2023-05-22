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

    <?php
    require_once "userNavbar.php";
    require_once "taskViews.php";
    ?>

    <div class="tasks-container">
      <form action="addTask.php" method="post">
        <input class="form-details" type="text" required maxlength="44" name="taskTitleInput" id="taskTitleInput" placeholder="Task title">
        <input class="form-details" type="date" required name="taskDueInput" id="taskDueInput" onfocus="this.showPicker()" onclick="this.showPicker()">
        <div class="btn-group">
          <input class="form-btn" type="reset" id="resetBtn" value="Clear">
          <input class="form-btn" type="submit" id="submitBtn" value="Add">
        </div>
      </form>

      <div class="hrule"></div>

      <!-- Render tasks for the current user  -->
      <?php

      $email = $_SESSION['email'];

      require_once 'connect.php';

      $sql = "SELECT * FROM `tasks` WHERE `email` LIKE '$email'";
      $result = $mysqli->query($sql);

      // if no results found
      if ($result->num_rows == 0) {
        echo "
          
          <div class='task-item'>
            <div class='task-details'>
              <p class='task-title'>Your tasks will be shown here</p>
              <p class='task-due'>with their due date here</p>
            </div>
          </div>

          ";
      }

      // render results
      else {
        while ($row = $result->fetch_assoc()) {

          $taskId = $row['taskId'];
          $taskTitle = $row['taskTitle'];
          $taskDue = $row['taskDue'];

          echo "
          
          <div class='task-item'>
            <div class='task-details'>
              <p class='task-title'>$taskTitle</p>
              <p class='task-due'>$taskDue</p>
            </div>
            <form action='deleteTask.php' method='post'>
              <input type='hidden' name='taskId' value='$taskId'>
              <button class='delete-btn' type='submit'>
                <i class='fa-solid fa-trash fa-lg' style='color: #555555;'></i>
              </button>
            </form>
          </div>

          ";
        }
      }

      $mysqli->close();

      ?>
    </div>
  </div>

  <script src="logout.js" defer></script>
  <script src="taskViews.js" defer></script>
  <script src="deleteTask.js" defer></script>
  <script>
    document.querySelector("#taskTitleInput").focus();
  </script>
</body>

</html>