<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    header("Location: ../Html/loginPage.php");
    exit();
}

$admin_name = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : "Admin";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styleeCss/admin.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="a.php">Dashboard</a></li>
                <li><a href="add-student.php">Manage Users</a></li>
                <li><a href="manage_courses.php">Manage Courses</a></li>
                <li><a href="adminassi.php">Manage Assignments</a></li>
                <li><a href="admin_settings.php">Settings</a></li>
                <li><a href="./loginPage.php">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="content">
            <header>
                <h1>Welcome, <?php echo htmlspecialchars($admin_name); ?>!</h1>
            </header>

            <section class="overview">
                <div class="card">
                    <h3>Total Users</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3>Total Courses</h3>
                    <p>20</p>
                </div>
                <div class="card">
                    <h3>Total Assignments</h3>
                    <p>35</p>
                </div>
                <div class="card">
                    <h3>Total Exams</h3>
                    <p>10</p>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
