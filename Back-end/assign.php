<?php
session_start(); 
include_once('./server.php'); // Include the database connection


if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "You need to be logged in to submit an assignment!";
    header('location: ../Html/loginPage.php');
    exit();
}

$student_id = $_SESSION['id'];

$sql = "SELECT fullName FROM user WHERE id = '$student_id'"; 
$res = mysqli_query($con, $sql);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $username = $row['fullName']; 
} else {
    $_SESSION['msg'] = "Student not found!";
    header('location: ../Html/loginPage.php');
    exit();
}

$subject = $_POST['subject'];
$file = $_FILES['assign'];
$temp_name = $file['tmp_name'];
$name = $file['name'];
$folder = "../homework/";

if (move_uploaded_file($temp_name, $folder . $name)) {
    
    $sql = "INSERT INTO assignments (student_id, username, assignment_name, file_name, file_path)
            VALUES ('$student_id', '$username', '$subject', '$name', '$folder$name')";

    $res = mysqli_query($con, $sql); 

    if ($res) {
        $_SESSION['msg'] = "Assignment submitted successfully!";
        $_SESSION['subject'] = $subject; 
    } else {
        $_SESSION['msg'] = "Error submitting assignment: " . mysqli_error($con);
        $_SESSION['subject'] = $subject;
    }
} else {
    $_SESSION['msg'] = "Failed to upload file.";
    $_SESSION['subject'] = $subject;
}

header('location: ../Html/assignment.php');
exit();
?>
