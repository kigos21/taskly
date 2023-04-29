<?php

session_start();
if (isset($_SESSION['email'])) {
  header('Location: alltasks.php');
  exit();
}

?>

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
  <link rel="stylesheet" href="styles/index.css" />
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-sm fixed-top">
      <div class="container-fluid col-10">
        <h1 class="nav-brand">Taskly</h1>

        <div class="justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container-fluid col-10">
      <section class="hero">
        <div class="row">
          <div class="col-lg-4 text-center">
            <img class="img-fluid" src="assets/remote-work.svg" alt="woman working on a computer">
          </div>
          <div class="col-lg-6 text-center hero-right-col m-auto">
            <h1 class="hero-title">Never lose track of tasks</h1>
            <div class="row hero-buttons">
              <div class="col-md-6">
                <button class="hero-btn hero-login" onclick="window.location.href = 'login.php';">Log in</button>
              </div>
              <div class="col-md-6">
                <button class="hero-btn hero-signup" onclick="window.location.href = 'signup.php';">Sign up</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <hr class="separator">
      <section class="features text-center">
        <div class="row">
          <div class="col-lg">
            <p>Sleek, simple, modern</p>
            <img class="img-fluid" src="assets/modern-design.svg">
          </div>
          <div class="col-lg">
            <p>Comes with a calendar</p>
            <img class="img-fluid" src="assets/schedule-plan.svg">
          </div>
          <div class="col-lg">
            <p>Lightning fast</p>
            <img class="img-fluid" src="assets/fast-rocket.svg">
          </div>
        </div>
      </section>
    </div>
  </main>

</body>

</html>