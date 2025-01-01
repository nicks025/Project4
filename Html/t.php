<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "teacher") {
    header("Location: ../Html/loginPage.php");
    exit();
}
$teacher_name = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : "Teacher";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Dashboard</title>
  <link rel="stylesheet" href="../styleeCss/teacherDash.css">
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
      <h2>Teacher Panel</h2>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Manage Classes</a></li>
        <li><a href="./teacherassign.php">Assignments</a></li>
        <li><a href="./viewassign.php">View Assignment</a></li>
        <li><a href="#">Students</a></li>
        <li><a href="#">Profile Settings</a></li>
        <li><a href="./loginPage.php">Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <header>
        <h1>Welcome, <?php echo htmlspecialchars($teacher_name); ?>!</h1>
      </header>

      <section class="overview">
        <div class="card">
          <h3>Total Classes</h3>
          <p>5</p>
        </div>
        <div class="card">
          <h3>Total Students</h3>
          <p>120</p>
        </div>
        <div class="card">
          <h3>Pending Assignments</h3>
          <p>10</p>
        </div>
        <div class="card">
          <h3>Exams Scheduled</h3>
          <p>3</p>
        </div>
      </section>

      <section class="recent-activity">
        <h2>Recent Activity</h2>
        <ul>
          <li>Reviewed Assignment 1 for Class 10A.</li>
          <li>Scheduled Math Quiz for Class 12B.</li>
          <li>Added resources for Physics Class 11C.</li>
        </ul>
      </section>
    </div>
  </div>

    <!-- Footer Section -->
    <footer>
  <p>&copy; Teacher Panel</p>
  </footer>

</body>
</html>
