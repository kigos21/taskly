<?php

$email = $_POST['email'];
$password = $_POST['password'];

require_once 'connect.php';

// check if email exists in database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($sql);

if ($result->num_rows == 0) {
    // email not found
    $error_message = 'email does not exist';
    $mysqli->close();
    header('Location: login.php?error=' . urlencode($error_message));
    exit();
}

// email found, check password
$row = $result->fetch_assoc();
$hashedPassword = $row['password'];

if (password_verify($password, $hashedPassword)) {
    // password correct
    session_start();
    $_SESSION['email'] = $email;
    $mysqli->close();
    header('Location: alltasks.php');
    exit();
} else {
    // password incorrect
    $error_message = 'password incorrect';
    $mysqli->close();
    header('Location: login.php?error=' . urlencode($error_message));
    exit();
}
