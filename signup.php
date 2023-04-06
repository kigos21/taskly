<?php

session_start();
if (isset($_SESSION['email'])) {
  header('Location: index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log in - Taskly</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/favicon.ico" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800&family=Outfit:wght@200;400;600;800&display=swap" rel="stylesheet" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="styles/bootstrap.css" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/accounts.css" />
  <link rel="stylesheet" href="styles/signup.css" />
</head>

<body>
  <main>
    <div class="main-container container-fluid">
      <div class="main-row row align-items-center">
        <div class="title-col col-lg-5 order-lg-last">
          <div class="title-wrapper col-lg-12 col-md-8 col-sm-9">
            <h1>Taskly</h1>
            <p>get things done.</p>
          </div>
        </div>
        <div class="form-col col-lg-7 row align-items-center">
          <div class="form-wrapper col-lg-7 col-md-8 col-sm-9 order-lg-first">

            <?php
            if (isset($_GET['error'])) {
              $error = urldecode($_GET['error']);
              echo '<div class="alert-box alert alert-danger" role="alert">';
              if ($error == 'password no match') {
                echo 'Passwords do not match, try again.';
              } elseif ($error == 'email exists') {
                echo 'Email is already in use, try another.';
              } else {
                echo 'Something went wrong, try again.';
              }
              echo '</div>';
            }
            ?>

            <h2>Almost There</h2>
            <p>Fill in the details</p>
            <form action="registerAcc.php" method="post">
              <input required type="email" class="form-component form-text" name="email" placeholder="Email address" />
              <input required type="password" class="form-component form-text" name="password" placeholder="Password" />
              <input required type="password" class="form-component form-text" name="confirmPassword" placeholder="Confirm Password" />
              <input type="submit" class="form-component form-btn signup-btn" value="Sign up" />
            </form>

            <p class="login-prompt">
              Already have an account? <a href="login.php">Log in</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>