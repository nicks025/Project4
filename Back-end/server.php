<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'educationportal'); // Update with your DB credentials

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>