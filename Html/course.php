<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses</title>
  <link rel="stylesheet" href="../styleeCss/course.css">
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
        <li><a href="#">Profile</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="./loginPage.php">Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <main class="content">
      <header>
        <h1>Available Courses</h1>
      </header>

      <!-- Courses Section -->
      <section class="courses">
        <h2>Browse Courses</h2>
        <div class="course-list">
          <!-- Course 1 -->
          <div class="course">
            <h3>Math 101</h3>
            <p>Learn the basics of algebra, geometry, and calculus.</p>
            <button onclick="enrollCourse('Math 101')">Enroll Now</button>
          </div>

          <!-- Course 2 -->
          <div class="course">
            <h3>Science 101</h3>
            <p>Understand the fundamental concepts of biology, chemistry, and physics.</p>
            <button onclick="enrollCourse('Science 101')">Enroll Now</button>
          </div>

          <!-- Course 3 -->
          <div class="course">
            <h3>English Literature</h3>
            <p>Explore classic and modern literature through analysis and discussion.</p>
            <button onclick="enrollCourse('English Literature')">Enroll Now</button>
          </div>

          <!-- Course 4 -->
          <div class="course">
            <h3>History 101</h3>
            <p>Study key historical events and figures that shaped the modern world.</p>
            <button onclick="enrollCourse('History 101')">Enroll Now</button>
          </div>

          <!-- Course 5 -->
          <div class="course">
            <h3>Geography 101</h3>
            <p>Learn about Earth's landscapes, environments, and the relationship between humans and nature.</p>
            <button onclick="enrollCourse('Geography 101')">Enroll Now</button>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script src="../JS/courses.js"></script>
</body>
</html>
