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
include 'connect.php';

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
    $salt = bin2hex(random_bytes(16));
    $combinedPassword = $salt . $password;
    $hashedPassword = password_hash($combinedPassword, PASSWORD_DEFAULT);

    // insert details into database
    $sql = "INSERT INTO users (email, password, salt) VALUES ('$email', '$hashedPassword', '$salt')";
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
