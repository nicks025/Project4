<?php
session_start();
include_once('./server.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $due_date = $_POST['due_date'];
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $assignment_type = mysqli_real_escape_string($con, $_POST['assignment_type']);
    $instructions = mysqli_real_escape_string($con, $_POST['instructions']);
    $late_submission = isset($_POST['late_submission']) ? 1 : 0;
    $resubmission = isset($_POST['resubmission']) ? 1 : 0;
    $file_path = NULL;

    // Handle file upload
    if (!empty($_FILES['file_upload']['name'])) {
        $file_name = $_FILES['file_upload']['name'];
        $file_tmp = $_FILES['file_upload']['tmp_name'];
        $upload_dir = "../uploads/";
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            // File uploaded successfully
        } else {
            $_SESSION['msg'] = "File upload failed.";
            header("Location: ../Html/teacherassign.php");
            exit();
        }
    }

    // Insert data into database
    $sql = "INSERT INTO teacher_assignments (title, subject, due_date, description, assignment_type, file_path, instructions, late_submission, resubmission) 
            VALUES ('$title', '$subject', '$due_date', '$description', '$assignment_type', '$file_path', '$instructions', '$late_submission', '$resubmission')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['msg'] = "Assignment created successfully!";
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($con);
    }

    header("Location: ../Html/teacherassign.php");
    exit();
} else {
    header("Location: ../Html/teacherassign.php");
    exit();
}
?>
