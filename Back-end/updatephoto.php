<?php
session_start();
include '../Back-end/db_connection.php'; // Ensure database connection

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Html/loginPage.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    $target_dir = "../uploads/";
    $file_name = basename($_FILES["profile_picture"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name; // Unique file name
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allowed file types
    $allowed_types = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($file_type, $allowed_types)) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        exit();
    }

    // Move file to the uploads directory
    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        // Update database
        $profile_picture = time() . "_" . $file_name;
        $query = "UPDATE user SET profile_picture = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $profile_picture, $user_id);
        if ($stmt->execute()) {
            $_SESSION['profile_picture'] = $profile_picture;
            header("Location: studentProfile.php");
        } else {
            echo "Database update failed.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
