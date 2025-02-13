<?php
include_once('../Back-end/server.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $subject = $_POST["subject"];
    $due_date = $_POST["due-date"];
    $description = $_POST["description"];
    $assignment_type = $_POST["assignment-type"];
    $instructions = $_POST["instructions"];
    $late_submission = isset($_POST["late-submission"]) ? 1 : 0;
    $resubmission = isset($_POST["resubmission"]) ? 1 : 0;

    $file_upload = null;
    if (isset($_FILES["file-upload"]) && $_FILES["file-upload"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file-upload"]["name"]);
        move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file);
        $file_upload = $target_file;
    }

    $sql = "INSERT INTO assignments (title, subject, due_date, description, assignment_type, file_upload, instructions, late_submission, resubmission)
            VALUES ('$title', '$subject', '$due_date', '$description', '$assignment_type', '$file_upload', '$instructions', $late_submission, $resubmission)";

    if ($con->query($sql) === TRUE) {
        echo "Assignment created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>