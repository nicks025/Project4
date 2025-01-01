<?php
session_start();
include_once('./server.php'); // Include the database connection

// Check if the user is logged in (optional, adjust based on your use case)
if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "You need to be logged in to view submitted files!";
    header('location: ../Html/loginPage.php');
    exit();
}

// Fetch all submitted assignments
$sql = "SELECT * FROM assignments ORDER BY id DESC";
$res = mysqli_query($con, $sql);

// Check for errors in the query
if (!$res) {
    die("Error fetching submitted files: " . mysqli_error($con));
}

$assignments = mysqli_fetch_all($res, MYSQLI_ASSOC); // Fetch all rows as an associative array
?>
