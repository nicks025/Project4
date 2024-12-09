document.addEventListener('DOMContentLoaded', () => {
    // Simulate fetching data for dashboard
    const totalCourses = 5;
    const upcomingExams = 2;
    const pendingAssignments = 3;
  
    document.getElementById('total-courses').textContent = totalCourses;
    document.getElementById('upcoming-exams').textContent = upcomingExams;
    document.getElementById('pending-assignments').textContent = pendingAssignments;
  });
  
  // Function to join class based on the URL
  function joinClass(link) {
    window.open(link, '_blank');
  }
  