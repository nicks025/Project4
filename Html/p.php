<?php
session_start();

// Ensure user is logged in and has admin role
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "student") {
    header("Location: ../Html/loginPage.php");
    exit();
}

// Get the admin's full name from the session
$student_name = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : "Student";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Portal Dashboard</title>
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
        <li><a href="studentProfile.php">Profile</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="./loginPage.php">Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <header>
        <h1>Welcome, <?php echo htmlspecialchars($student_name); ?>!</h1>
      </header>

      <!-- Stats Section -->
      <div class="stats">
        <div class="stat-card">
          <h3>Total Courses</h3>
          <p id="total-courses">5</p>
        </div>
        <div class="stat-card">
          <h3>Upcoming Exams</h3>
          <p id="upcoming-exams">2</p>
        </div>
        <div class="stat-card">
          <h3>Pending Assignments</h3>
          <p id="pending-assignments">3</p>
        </div>
      </div>

      <!-- Join Class Section -->
      <section class="join-class">
        <h2>Join Your Classes</h2>
        <div class="class-card">
          <h4>Math Class</h4>
          <p>Time: 10:00 AM</p>
          <button onclick="joinClass('https://zoom.us/math-class')">Join Class</button>
        </div>
        <div class="class-card">
          <h4>Science Class</h4>
          <p>Time: 12:00 PM</p>
          <button onclick="joinClass('https://meet.google.com/science-class')">Join Class</button>
        </div>
      </section>

      <!-- Recent Activities -->
      <section class="recent-activities">
        <h2>Recent Activities</h2>
        <ul>
          <li>Submitted Assignment 3 for Physics</li>
          <li>Attended Online Math Lecture</li>
          <li>Joined Chemistry Discussion Group</li>
        </ul>
      </section>
    </div>
  </div>

  <script src="../JS/pro.js"></script>
</body>
</html>
