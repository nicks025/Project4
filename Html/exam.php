<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exam Portal</title>
  <link rel="stylesheet" href="../styleeCss/exam.css">
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
        <h1>Welcome to the Exam Portal</h1>
      </header>

      <!-- Choose between Quiz or Exam -->
      <section id="choose-section" class="section">
        <h2>Choose Your Assessment</h2>
        <div>
          <button onclick="chooseQuiz()">Take a Quiz</button>
          <button onclick="chooseExam()">Take an Exam</button>
        </div>
      </section>

      <!-- Quiz Section -->
      <section id="quiz-section" class="section" style="display:none;">
        <h2>Take a Quiz</h2>
        <label for="quiz-subject-select">Choose a Subject:</label>
        <select id="quiz-subject-select">
          <option value="Math">Math</option>
          <option value="Science">Science</option>
          <option value="English">English</option>
          <option value="History">History</option>
          <option value="Geography">Geography</option>
        </select>
        <button onclick="startQuiz()">Start Quiz</button>
        <div id="quiz-container"></div>
      </section>

      <!-- Exam Section -->
      <section id="exam-section" class="section" style="display:none;">
        <h2>Take an Exam</h2>
        <label for="exam-subject-select">Choose a Subject:</label>
        <select id="exam-subject-select">
          <option value="Math">Math</option>
          <option value="Science">Science</option>
          <option value="English">English</option>
          <option value="History">History</option>
          <option value="Geography">Geography</option>
        </select>
        <button onclick="startExam()">Start Exam</button>
        <div id="exam-container"></div>
      </section>

      <!-- Grade Sheets -->
      <section id="grade-sheets" class="section">
        <h2>Grade Sheets</h2>
        <div class="grade-table">
          <h3>Quiz Grades</h3>
          <table>
            <thead>
              <tr>
                <th>Subject</th>
                <th>Quiz</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody id="quiz-grade-table-body"></tbody>
          </table>
        </div>
        <div class="grade-table">
          <h3>Exam Grades</h3>
          <table>
            <thead>
              <tr>
                <th>Subject</th>
                <th>Exam</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody id="exam-grade-table-body"></tbody>
          </table>
        </div>
      </section>
    </main>
  </div>

  <script src="../JS/exam.js"></script>
</body>
</html>
