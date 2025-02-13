<?php
include_once('../Back-end/server.php');
$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error fetching user data: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styleeCss/adminst.css">
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
                <li><a href="manage_assignments.php">Manage Assignments</a></li>
                <li><a href="admin_settings.php">Settings</a></li>
                <li><a href="./loginPage.php">Logout</a></li>
            </ul>
        </div>
    <!-- Main Content -->
    <main class="content">
    <?php if (isset($_GET['message'])): ?>
    <p style="color: green;"><?= htmlspecialchars($_GET['message']) ?></p>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?= htmlspecialchars($_GET['error']) ?></p>
<?php endif; ?>

      <div class="container">
       <input type="search" id="searchInput" onkeyup="searchTable()" placeholder="Search users by name, email, or type...">
         <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Parent's Name</th>
                <th>User Type</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['fullName']) ?></td>
                        <td><?= htmlspecialchars($row['Email']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= htmlspecialchars($row['parents']) ?></td>
                        <td><?= htmlspecialchars($row['userType']) ?></td>
                        <td>
                        <button onclick="editUser(<?= $row['id'] ?>)" class= "edit">Edit</button>   
                        <div id="editFormContainer" class= "editss"style="display: none; margin-top: 20px; border: 1px solid #ccc; padding: 20px; background: #f9f9f9;">
                        </div>
                        <button onclick="deleteUser(<?= $row['id'] ?>)" class= "delete" style="">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No users found</td>
                </tr>
            <?php endif; ?>
            </tbody>
           </table>
           <div style="text-align: right; margin-top: 10px;">
        <button id="addButton" onclick="showAddForm()" style="font-size: 20px; padding: 10px 20px; cursor: pointer;">+</button>
    </div>

    <!-- Add Form (Hidden by Default) -->
    <div id="addFormContainer" style="display: none; margin-top: 20px; border: 1px solid #ccc; padding: 20px; background: #f9f9f9;">
        <h3>Add New User</h3>
        <form id="addUserForm" action="../Back-end/addAccount.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br><br>

            <label for="parent">Parent's Name:</label>
            <input type="text" id="parent" name="parent" required><br><br>

            <label for="type">User Type:</label>
            <select id="type" name="type" required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select><br><br>

            <button type="submit" style="padding: 10px 20px; cursor: pointer;">Submit</button>
            <button type="button" onclick="hideAddForm()" style="padding: 10px 20px; cursor: pointer;">Cancel</button>
        </form>
    </div>
    </div>
    </main>
    <script src="../JS/adminadd.js"></script>
    <script src="../JS/edit.js"></script>

</body>
</html>