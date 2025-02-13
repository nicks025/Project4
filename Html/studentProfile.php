<?php
session_start();
include '../Back-end/server.php'; // Ensure database connection

// Ensure user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "student") {
    header("Location: ../Html/loginPage.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Correct session variable

// Fetch user details from the database
$query = "SELECT fullName, Email, phone, parents, userType, profile_picture FROM user WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if user data exists
if ($user) {
    $student_name = $user['fullName'] ?? "Student";
    $email = $user['Email'] ?? "N/A";
    $phone = $user['phone'] ?? "N/A";
    $parent = $user['parents'] ?? "N/A";
    $usertype = $user['userType'] ?? "N/A";
    $profile_picture = $user['profile_picture'] ?? "default.png"; // Default profile picture
} else {
    $student_name = "Student";
    $email = "N/A";
    $phone = "N/A";
    $parent = "N/A";
    $usertype = "N/A";
    $profile_picture = "default.png";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="../styleeCss/pr.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Student Portal</h2>
            <ul>
                <li><a href="./p.php">Dashboard</a></li>
                <li><a href="./assignment.php">Assignments</a></li>
                <li><a href="./exam.php">Exams</a></li>
                <li><a href="./course.php">Courses</a></li>
                <li><a href="./profile.php">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="./loginPage.php">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Your Profile</h1>
            </header>

            <!-- Profile Section -->
            <section class="profile">
                <div class="profile-details">
                    <img src="../uploads/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;">
                    <form action="../Back-end/uploadphoto.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="profile_picture" required>
                        <button type="submit">Upload</button>
                    </form>
                    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($student_name); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
                    <p><strong>Parent's Name:</strong> <?php echo htmlspecialchars($parent); ?></p>
                    <p><strong>User Type:</strong> <?php echo htmlspecialchars($usertype); ?></p>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
