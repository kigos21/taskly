<?php

// only logged in users can execute the script
session_start();
if (!(isset($_SESSION['email']))) {
    header('Location: index.php');
    exit();
}

// form submission received from alltasks.php
$taskId = $_POST['taskId'];

require_once 'connect.php';

// delete the task from the database
$sql = "DELETE FROM tasks WHERE `tasks`.`taskId` = $taskId";
$result = $mysqli->query($sql);

// check if query is successful
if (!$result) {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
header('Location: allTasks.php');
exit();
