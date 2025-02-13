function editUser(userId) {
    fetch(`../Back-end/user-edit.php?id=${userId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                showEditForm(data);
            }
        })
        .catch(error => {
            console.error('Error fetching user data:', error);
        });
}

function showEditForm(user) {
    const editFormContainer = document.getElementById('editFormContainer');
    editFormContainer.innerHTML = `
        <h3>Edit User</h3>
        <form id="editUserForm" action="../Back-end/update-user.php" method="POST">
            <input type="hidden" name="id" value="${user.id}">
            <label for="editName">Full Name:</label>
            <input type="text" id="editName" name="name" value="${user.fullName}" required><br><br>

            <label for="editEmail">Email:</label>
            <input type="email" id="editEmail" name="email" value="${user.Email}" required><br><br>

            <label for="editPhone">Phone:</label>
            <input type="text" id="editPhone" name="phone" value="${user.phone}" required><br><br>

            <label for="editParent">Parent's Name:</label>
            <input type="text" id="editParent" name="parent" value="${user.parents}" required><br><br>

            <label for="editType">User Type:</label>
            <select id="editType" name="type" required>
                <option value="student" ${user.userType === 'student' ? 'selected' : ''}>Student</option>
                <option value="teacher" ${user.userType === 'teacher' ? 'selected' : ''}>Teacher</option>
            </select><br><br>

            <button type="submit">Update</button>
            <button type="button" onclick="hideEditForm()">Cancel</button>
        </form>
    `;
    editFormContainer.style.display = 'block';
}

function hideEditForm() {
    document.getElementById('editFormContainer').style.display = 'none';
}
