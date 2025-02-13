<?php
// Include database connection
include_once('../Back-end/server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = intval($_POST['id']);
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $parent = $_POST['parent'];
    $usertype = $_POST['type'];

    $sql = "UPDATE user SET 
                fullName = '$fullname', 
                Email = '$email', 
                phone = '$number', 
                parents = '$parent', 
                userType = '$usertype' 
            WHERE id = $userId";

    if (mysqli_query($con, $sql)) {
        header("Location: ../Html/add-student.php?message=User+updated+successfully");
        exit;
    } else {
        header("Location: ../Html/add-student.php?error=" . urlencode("Error updating user: " . mysqli_error($con)));
        exit;
    }
} else {
    header("Location: ../Html/add-student.php?error=" . urlencode("No form data submitted"));
    exit;
}
?>
