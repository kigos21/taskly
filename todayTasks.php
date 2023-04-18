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
                <button class="views-item inactive-view" onclick="location.href = 'alltasks.php';">
                    <i class="fa-solid fa-globe fa-lg"></i><span class="view-text">All</span>
                </button>
                <button class="views-item inactive-view">
                    <i class="fa-solid fa-calendar fa-lg"></i><span class="view-text">Month</span>
                </button>
                <button class="views-item active-view" onclick="location.href = 'todayTasks.php';">
                    <i class="fa-solid fa-sun fa-lg"></i><span class="view-text">Today</span>
                </button>
            </div>
        </div>
        <div class="tasks-container">

            <div class="today-heading">Today</div>
            <div class="hrule"></div>

            <!-- Render tasks for the current user  
            FILTER: TODAY -->
            <?php

            $email = $_SESSION['email'];

            require_once 'connect.php';

            $sql = "SELECT * FROM `tasks` WHERE `email` LIKE '$email' AND `taskDue` = CURDATE();";
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
                    </div>

                    ";
                }
            }

            $mysqli->close();

            ?>
        </div>
    </div>
</body>

</html>