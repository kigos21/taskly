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
  <link rel="stylesheet" href="styles/login.css" />
</head>

<body>
  <main>
    <div class="blur"></div>
    <div class="main-container container-fluid">
      <div class="main-row row align-items-center">
        <div class="title-col col-lg-5">
          <h1>Taskly</h1>
        </div>
        <div class="form-col col-lg-7 row align-items-center">
          <div class="form-wrapper col-lg-7 col-md-8 col-sm-9">

            <?php
            if (isset($_GET['success'])) {
              echo '<div class="alert-box alert alert-success" role="alert">';
              echo 'Account registered successfully!';
              echo '</div>';
            }

            // check for errors in GET vars
            if (isset($_GET['error'])) {
              $error = urldecode($_GET['error']);
              if ($error == 'email does not exist') {
                echo '<div class="alert-box alert alert-danger" role="alert">';
                echo 'Account does not exist, create now.';
                echo '</div>';
              } elseif ($error == 'password incorrect') {
                echo '<div class="alert-box alert alert-danger" role="alert">';
                echo 'Incorrect credentials, try again.';
                echo '</div>';
              }
            }
            ?>

            <h2>Welcome Back</h2>
            <p>Login to your existing account</p>
            <form action="loginAcc.php" method="post">
              <input type="email" class="form-component form-text" name="email" placeholder="Email address" />
              <input type="password" class="form-component form-text" name="password" placeholder="Password" />
              <input type="submit" class="form-component form-btn login-btn" value="Log in" />
            </form>

            <p class="signup-prompt">Don't have an account?</p>
            <button type="button" onclick="location.href = 'signup.php';" class="form-component form-btn signup-btn">
              Sign up
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>