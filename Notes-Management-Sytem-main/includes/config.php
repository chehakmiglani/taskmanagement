<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "task_management_system";

// Establish connection
$con = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
