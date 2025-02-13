// Fetch assignments from the server
function fetchAssignments() {
    fetch('../Back-end/fetch_assignments.php') // Ensure this file exists
        .then(response => response.json())
        .then(data => displayAssignments(data))
        .catch(error => console.error('Error fetching assignments:', error));
}

// Display assignments in table
function displayAssignments(assignments) {
    const tbody = document.querySelector('#assignmentTable tbody');
    tbody.innerHTML = '';
    assignments.forEach(assignment => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${assignment.id}</td>
            <td>${assignment.username}</td>
            <td>${assignment.assignment_name}</td>
            <td>${assignment.file_name}</td>
            <td>
                <a href="${assignment.file_path}" download>Download</a>
                <button onclick="deleteAssignment(${assignment.id})" 
                    style="padding: 5px 10px; cursor: pointer; background-color: #d9534f; color: white; border: none; border-radius: 3px;">
                    Delete
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Delete assignment
function deleteAssignment(assignmentId) {
    if (confirm('Are you sure you want to delete this assignment?')) {
        fetch(`../Back-end/deleteassi.php?id=${assignmentId}`, { method: 'GET' })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Assignment deleted successfully');
                    fetchAssignments(); // Refresh assignments after deletion
                } else {
                    alert('Error deleting assignment: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error deleting assignment:', error);
            });
    }
}

// Search assignments
function searchTable() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#assignmentTable tbody tr');
    rows.forEach(row => {
        const rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(input) ? '' : 'none';
    });
}

// Load assignments on page load
document.addEventListener('DOMContentLoaded', fetchAssignments);
