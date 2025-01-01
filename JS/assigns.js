// Function to show the "View Submitted Assignments" section
function showViewAssignments() {
    document.getElementById("create-assignment").style.display = "none";
    document.getElementById("view-assignments").style.display = "block";
  }
  
  // Function to show the "Create New Assignment" section
  function showCreateAssignment() {
    document.getElementById("view-assignments").style.display = "none";
    document.getElementById("create-assignment").style.display = "block";
  }
  
  // Function to save the draft (for demonstration)
  function saveDraft() {
    alert("Draft saved successfully!");
  }
  
  // Function to clear the form
  function clearForm() {
    const form = document.getElementById("assignmentForm");
    form.reset();
    alert("Form cleared!");
  }
  
  // Simulate loading submitted assignments dynamically
  function loadAssignments() {
    const assignmentsList = document.getElementById("assignments-list");
  
    // Mock data
    const assignments = [
      {
        title: "Math Quiz",
        student: "John Doe",
        submittedDate: "2024-12-25",
        grade: "Pending",
      },
      {
        title: "History Essay",
        student: "Jane Smith",
        submittedDate: "2024-12-27",
        grade: "Pending",
      },
    ];
  
    // Generate HTML for each assignment
    assignments.forEach((assignment) => {
      const div = document.createElement("div");
      div.className = "assignment-item";
      div.innerHTML = `
        <strong>Title:</strong> ${assignment.title}<br>
        <strong>Student:</strong> ${assignment.student}<br>
        <strong>Submitted Date:</strong> ${assignment.submittedDate}<br>
        <strong>Grade:</strong> ${assignment.grade}
        <hr>
      `;
      assignmentsList.appendChild(div);
    });
  }
  
  // Load assignments on page load
  document.addEventListener("DOMContentLoaded", () => {
    loadAssignments();
  });
  