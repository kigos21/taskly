<?php

session_start();
$email = $_SESSION['email'];

require_once 'connect.php';

$sql = "DELETE FROM users WHERE `users`.`email` = '$email'";
$result = $mysqli->query($sql);

if (!$result) {
  // error deleting from database
  $error_message = "delete error";
  $mysqli->close();
  header("Location: profile.php?error=" . urlencode($error_message));
  exit();
}

// delete successful, log user out
$mysqli->close();
header("Location: logout.php?success=1");
exit();
