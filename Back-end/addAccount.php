<?php
include_once('./server.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $parent = $_POST['parent'];
    $usertype = $_POST['type'];

    $sql = "INSERT INTO user (fullName, Email, password, phone, parents, userType) 
    VALUES ('$fullname','$email', '$password',  '$number', '$parent', '$usertype')";

    if (mysqli_query($con, $sql)) {
        header("Location: ../Html/add-student.php?message=Create+successfully");
        exit;
    } else { 
        header("Location: ../Html/add-student.php?error=" . urlencode("Error updating user: " . mysqli_error($con)));
        exit;
    }
    header("Location: ../Html/add-student.php");
    exit();

}
?>