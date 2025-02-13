<?php

include_once('../Back-end/server.php');

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']); 

    $sql = "DELETE FROM user WHERE id = $userId";

    if (mysqli_query($con, $sql)) {
        header("Location: ../Html/add-student.php?message=User+deleted+successfully");
        exit;
    } else {
        header("Location: ../Html/add-student.php?error=" . urlencode("Error deleting user: " . mysqli_error($con)));
        exit;
    }
} else {
    header("Location: ../Html/add-student.php?error=" . urlencode("No user ID provided"));
    exit;
}
?>