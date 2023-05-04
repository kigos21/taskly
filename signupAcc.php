<?php

$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// check password verification
if ($password != $confirmPassword) {
    $error_message = "password no match";
    header("Location: signup.php?error=" . urlencode($error_message));
    exit();
}

// connect to mysql database
require_once 'connect.php';

// if email is unique, insert into database
// else, return error
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // email is not unique, try again
    $error_message = "email exists";
    $mysqli->close();
    header("Location: signup.php?error=" . urlencode($error_message));
    exit();
} else {
    // email is unique, proceed
    // prepare the password for insertion
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // insert details into database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";
    $result = $mysqli->query($sql);

    if (!$result) {
        // error inserting into database
        $error_message = "insert error";
        $mysqli->close();
        header("Location: signup.php?error=" . urlencode($error_message));
        exit();
    }

    // close and redirect
    $mysqli->close();
    header("Location: login.php?success=1");
    exit();
}
