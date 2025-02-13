function searchTable() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#userTable tbody tr');
    rows.forEach(row => {
        const rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(input) ? '' : 'none';
    });
}
function showAddForm() {
    const formContainer = document.getElementById('addFormContainer');
    formContainer.style.display = 'block'; // Show the form
}

function hideAddForm() {
    const formContainer = document.getElementById('addFormContainer');
    formContainer.style.display = 'none'; // Hide the form
}
// function editUser(userId) {
//     alert("Edit user with ID: " + userId);
//    }

function deleteUser(userId) {
    const confirmDelete = confirm("Are you sure you want to delete this user?");
    if (confirmDelete) {
        window.location.href = `../Back-end/delete-user.php?id=${userId}`;
    }
}
