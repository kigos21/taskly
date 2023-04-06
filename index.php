<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - Taskly</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/favicon.ico" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800&family=Outfit:wght@200;400;600;800&display=swap" rel="stylesheet" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="styles/bootstrap.css" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/login-signup.css" />
</head>

<body>

  <?php
  if (isset($_SESSION['email'])) {
    echo '<button type="button" onclick="location.href=\'logout.php\';">Log out</button>';
    echo 'You are logged in as ' . $_SESSION['email'];
  } else {
    echo '<button type="button" onclick="location.href=\'login.php\';">Log in</button>';
    echo '<button type="button" onclick="location.href=\'signup.php\';">Sign up</button>';
  }
  ?>

</body>

</html>