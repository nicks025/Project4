<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Assignments</title>
    <link rel="stylesheet" href="../styleeCss/admins.css">
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
            <h1>Manage Assignments</h1>
            <div class="container">
                <input type="search" id="searchInput" onkeyup="searchTable()" placeholder="Search assignments...">
                <table id="assignmentTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Assignment Name</th>
                            <th>File Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Assignments will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="../JS/admin-assi.js"></script>
</body>
</html>
