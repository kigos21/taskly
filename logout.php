<?php

session_start();
session_unset();
session_destroy();

if (isset($_GET['success'])) {
  $error_message = "account deleted";
  header("Location: login.php?success=" . urlencode($error_message));
  exit();
}
header("Location: login.php");
exit();
