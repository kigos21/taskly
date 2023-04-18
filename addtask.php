<?php

// only logged in users can execute the script
session_start();
if (!(isset($_SESSION['email']))) {
    header('Location: index.php');
    exit();
}

$email = $_SESSION['email'];
$taskTitle = $_POST['taskTitleInput'];
$taskDue = $_POST['taskDueInput'];

require_once 'connect.php';

// insert details into database
$sql =  "INSERT INTO `tasks` (`email`, `taskTitle`, `taskDue`) 
        VALUES ('$email', '$taskTitle', '$taskDue');";
$result = $mysqli->query($sql);

if (!$result) {
    // error inserting into database
    $error_message = "insert error";
    $mysqli->close();
    header("Location: alltasks.php?error=" . urlencode($error_message));
    exit();
} else {
    // close and redirect
    $mysqli->close();
    header("Location: alltasks.php?success=1");
    exit();
}
