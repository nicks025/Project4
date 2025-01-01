<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment Management</title>
  <link rel="stylesheet" href="../styleeCss/techerassign.css">
</head>
<body>

<div class="Assignment">
<div class="sidebar">
    <h2>Teacher Panel</h2>
    <ul>
        <li><a href="./t.php">Dashboard</a></li>
        <li><a href="#">Manage Classes</a></li>
        <li><a href="./teacherassign.php">Assignments</a></li>
        <li><a href="#">Students</a></li>
        <li><a href="#">Profile Settings</a></li>
        <li><a href="./loginPage.php">Logout</a></li>
    </ul>
</div>



  <!-- Main Content -->
  <main class="container">
    <!-- Create Assignment Section -->
    <section id="create-assignment">
      <h2>Create New Assignment</h2>
      <form id="assignmentForm">
        <div class="form-group">
          <label for="title">Assignment Title:</label>
          <input type="text" id="title" name="title" placeholder="Enter assignment title" required>
        </div>

        <div class="form-group">
          <label for="subject">Subject/Topic:</label>
          <select id="subject" name="subject" required>
            <option value="">Select Subject</option>
            <option value="Math">Math</option>
            <option value="Science">Science</option>
            <option value="History">History</option>
            <option value="English">English</option>
          </select>
        </div>

        <div class="form-group">
          <label for="due-date">Due Date:</label>
          <input type="date" id="due-date" name="due-date" required>
        </div>

        <div class="form-group">
          <label for="description">Assignment Description:</label>
          <textarea id="description" name="description" rows="4" placeholder="Describe the assignment" required></textarea>
        </div>

        <div class="form-group">
          <label for="assignment-type">Assignment Type:</label>
          <select id="assignment-type" name="assignment-type" required>
            <option value="">Select Type</option>
            <option value="Multiple Choice">Multiple Choice</option>
            <option value="Short Answer">Short Answer</option>
            <option value="Essay">Essay</option>
            <option value="Project">Project</option>
          </select>
        </div>

        <div class="form-group">
          <label for="points">Points/Grade:</label>
          <input type="number" id="points" name="points" placeholder="Enter total points" required>
        </div>

        <div class="form-group">
          <label for="file-upload">Upload Files (Optional):</label>
          <input type="file" id="file-upload" name="file-upload" multiple>
        </div>

        <div class="form-group">
          <label for="instructions">Instructions for Submission:</label>
          <textarea id="instructions" name="instructions" rows="4" placeholder="Provide instructions for submission" required></textarea>
        </div>

        <div class="form-group toggle-options">
          <label for="late-submission">Enable Late Submissions:</label>
          <input type="checkbox" id="late-submission" name="late-submission">
          
          <label for="resubmission">Allow Resubmissions:</label>
          <input type="checkbox" id="resubmission" name="resubmission">
          
          <label for="collaboration">Enable Collaboration:</label>
          <input type="checkbox" id="collaboration" name="collaboration">
        </div>

        <div class="form-buttons">
          <button type="button" class="btn save-draft" onclick="saveDraft()">Save Draft</button>
          <button type="submit" class="btn publish">Publish Assignment</button>
          <button type="reset" class="btn cancel" onclick="clearForm()">Cancel</button>
        </div>
      </form>
    </section>

    <!-- View Assignments Section -->
    <section id="view-assignments" style="display: none;">
      <h2>View Submitted Assignments</h2>
      <div id="assignments-list">
        <!-- Submitted assignments will be listed here dynamically -->
      </div>
      <button class="btn back-to-create" onclick="showCreateAssignment()">Back to Create Assignment</button>
    </section>
  </main>
</div>

  <!-- Footer Section -->
  <footer>
  <p>&copy; Teacher Panel</p>
  </footer>

  <script src="../JS/assigns.js"></script>
</body>
</html>
