<?php 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// date_default_timezone_set('Africa/Nairobi');

// Create connection
$conn = mysqli_connect('127.0.0.1', 'root', '', 'joint');
// Check connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

error_reporting(0);
?>