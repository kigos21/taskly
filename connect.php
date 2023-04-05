<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "taskly";

// Create connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    $mysqli->close();
    die("Connection failed: " . $mysqli->connect_error);
    exit();
}
