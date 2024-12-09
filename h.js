/* script.js */
// Interactive alert for "Enroll Now" buttons
document.querySelectorAll('.enroll-btn').forEach(button => {
    button.addEventListener('click', () => {
        alert('You have clicked to enroll in this course!');
    });
});
