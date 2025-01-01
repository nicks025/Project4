<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment Submission</title>
  
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
        <li><a href="#">Profile</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="./loginPage.php">Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <header>
        <h1>Submit Your Assignments</h1>
      </header>
      <!-- Assignment List Section -->
      <section class="assignments">
        <h2>Available Assignments</h2>
        
        <!-- Assignment for Math -->
        <div class="assignment-card">
          <h3>Math</h3>
          <p>Due Date: 15th October</p>
          <form id="math-assignment" action="../Back-end/assign.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="subject" value="Math"> <!-- Hidden subject field -->
            <label for="math-file">Upload File:</label>
            <input type="file" id="math-file" name="assign" required>
            <?php
              session_start();
              if (isset($_SESSION['msg']) && $_SESSION['subject'] === 'Math') {
                  echo '<div class="alert">' . $_SESSION['msg'] . '</div>';
                  unset($_SESSION['msg']);
                  unset($_SESSION['subject']);
              }
            ?>
            <button type="submit">Submit Assignment</button>
          </form>
        </div>

        <!-- Assignment for Science -->
        <div class="assignment-card">
          <h3>Science</h3>
          <p>Due Date: 18th October</p>
          <form id="science-assignment" action="../Back-end/assign.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="subject" value="Science">
            <label for="science-file">Upload File:</label>
            <input type="file" id="science-file" name="assign" required>
            <?php
              if (isset($_SESSION['msg']) && $_SESSION['subject'] === 'Science') {
                  echo '<div class="alert">' . $_SESSION['msg'] . '</div>';
                  unset($_SESSION['msg']);
                  unset($_SESSION['subject']);
              }
            ?>
            <button type="submit">Submit Assignment</button>
          </form>
        </div>

        <!-- Assignment for English -->
        <div class="assignment-card">
          <h3>English</h3>
          <p>Due Date: 20th October</p>
          <form id="english-assignment" action="../Back-end/assign.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="subject" value="English">
            <label for="english-file">Upload File:</label>
            <input type="file" id="english-file" name="assign" required>
            <?php
              if (isset($_SESSION['msg']) && $_SESSION['subject'] === 'English') {
                  echo '<div class="alert">' . $_SESSION['msg'] . '</div>';
                  unset($_SESSION['msg']);
                  unset($_SESSION['subject']);
              }
            ?>
            <button type="submit">Submit Assignment</button>
          </form>
        </div>
      </section>
    </div>
  </div>
</body>
</html>
