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

  <!-- Stylesheets -->
  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/profile.css" />
</head>

<body>
  <nav class="navbar fluid-container">
    <h1 class="nav-brand">Taskly</h1>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="allTasks.php">Tasks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link logout" href="logout.php">Log out</a>
      </li>
    </ul>
  </nav>
  <main>
    <div class="profile">
      <section class="details">
        <img src="assets/welcome.svg" class="img-fluid">
        <h2>Welcome back</h2>
        <p><?php echo $_SESSION["email"] ?>!</p>
      </section>
      <section class="reset">
        <h2>Reset Password?</h2>
        <form action="resetPassword.php" method="post">
          <input required type="password" name="oldPassword" id="oldPassword" placeholder="Old Password">
          <input required type="password" name="newPassword" id="newPassword" placeholder="New Password">
          <input required type="password" name="confPassword" id="confPassword" placeholder="Confirm Password">
          <button type="submit" class="submit-btn">Reset</button>
        </form>
        <!-- Error messages here -->
        <?php
        if (isset($_GET['success'])) {
          echo '<div class="alert-box alert alert-success" role="alert">';
          echo 'Password reset success!';
          echo '</div>';
        }

        // check for errors in GET vars
        if (isset($_GET['error'])) {
          $error = urldecode($_GET['error']);
          if ($error == 'old password incorrect') {
            echo '<div class="alert-box alert alert-danger" role="alert">';
            echo 'Incorrect old password';
            echo '</div>';
          } else if ($error == 'new and confirm passwords do not match') {
            echo '<div class="alert-box alert alert-danger" role="alert">';
            echo 'New and confirm passwords do not match';
            echo '</div>';
          } else if ($error == 'update error') {
            echo '<div class="alert-box alert alert-danger" role="alert">';
            echo 'Error updating database, try again.';
            echo '</div>';
          }
        }
        ?>
      </section>
      <section class="delete">
        <h2>Delete Account?</h2>
        <form action="deleteAccount.php" method="post">
          <button type="submit" class="submit-btn">Delete</button>
        </form>
      </section>

      <?php
      if (isset($_GET['error'])) {
        $error = urldecode($_GET['error']);
        if ($error == 'delete error') {
          echo '<div class="alert-box alert alert-danger" role="alert">';
          echo 'There was an error deleting your account, try again later.';
          echo '</div>';
        }
      }
      ?>
    </div>
  </main>

  <script src="profile.js" defer></script>
  <script src="logout.js" defer></script>
</body>

</html>