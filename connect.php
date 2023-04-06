<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "taskly";

// Create connection
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $database);

// Check connection
if ($mysqli->connect_error) {
    $mysqli->close();
    die("Connection failed: " . $mysqli->connect_error);
    exit();
}
