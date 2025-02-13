<?php
include_once('../Back-end/server.php'); 

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "You need to be logged in to view submissions!";
    header('location: ../Html/loginPage.php');
    exit();
}

$mark_viewed_sql = "UPDATE assignments SET is_viewed = 1 WHERE is_viewed = 0";
mysqli_query($con, $mark_viewed_sql);

$sql = "SELECT * FROM assignments";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submitted Assignments</title>
    <link rel="stylesheet" href="../styleeCss/viewa.css">
</head>
<body>

<div class="Assignment">
    <div class="sidebar">
        <h2>Teacher Panel</h2>
        <ul>
            <li><a href="./t.php">Dashboard</a></li>
            <li><a href="#">Manage Classes</a></li>
            <li><a href="./teacherassign.php">Assignments</a></li>
            <li><a href="./view_submissions.php">View Submissions</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Profile Settings</a></li>
            <li><a href="./loginPage.php">Logout</a></li>
        </ul>
    </div>

    <main class="container">
        <h2>Submitted Assignments</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Subject</th>
                    <th>File Name</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['assignment_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['file_name']); ?></td>
                        <td>
                            <a href="<?php echo htmlspecialchars($row['file_path']); ?>" download>Download</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</div>

<footer>
    <p>&copy; Teacher Panel</p>
</footer>

</body>
</html>
