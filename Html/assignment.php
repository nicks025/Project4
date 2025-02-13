<?php
include_once('../Back-end/server.php'); // Database connection

// Fetch all assignments from teacher_assignments table
$sql = "SELECT * FROM teacher_assignments ORDER BY due_date ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Assignments</title>
    <link rel="stylesheet" href="../styleeCss/assign.css">
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
        <li><a href="studentProfile.php">Profile</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="./loginPage.php">Logout</a></li>
      </ul>
    </div>

    <div class="container">
        <h2 class="header-top">📚 Student Assignments</h2>

        <?php if(isset($_SESSION['msg'])): ?>
            <p class="alert"> <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?> </p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Due Date</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Submit</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['subject']); ?></td>
                    <td><?php echo htmlspecialchars($row['due_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td>
                        <?php if($row['file_path']): ?>
                            <a href="../uploads/<?php echo $row['file_path']; ?>" download>📂 Download</a>
                        <?php else: ?>
                            No File
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="../Back-end/assign.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="assignment_id" value="<?php echo $row['id']; ?>">
                            <input type="text" name="subject" placeholder="Subject Name" required>
                            <input type="file" name="assign" required>
                            <button type="submit">Upload</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>

                <?php if(mysqli_num_rows($result) == 0): ?>
                    <tr>
                        <td colspan="6" class="no-assignments">No assignments available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
