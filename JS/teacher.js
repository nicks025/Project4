// Function to simulate fetching overview data
function fetchOverviewData() {
    // Example data
    const overviewData = {
      totalClasses: 5,
      totalStudents: 120,
      pendingAssignments: 10,
      examsScheduled: 3,
    };
  
    // Update overview cards dynamically
    document.querySelector(".card:nth-child(1) p").textContent = overviewData.totalClasses;
    document.querySelector(".card:nth-child(2) p").textContent = overviewData.totalStudents;
    document.querySelector(".card:nth-child(3) p").textContent = overviewData.pendingAssignments;
    document.querySelector(".card:nth-child(4) p").textContent = overviewData.examsScheduled;
  }
  
  // Function to simulate recent activity loading
  function loadRecentActivities() {
    const activities = [
      "Reviewed Assignment 1 for Class 10A.",
      "Scheduled Math Quiz for Class 12B.",
      "Added resources for Physics Class 11C.",
    ];
  
    const activityList = document.querySelector(".recent-activity ul");
    activityList.innerHTML = "";
  
    activities.forEach((activity) => {
      const li = document.createElement("li");
      li.textContent = activity;
      activityList.appendChild(li);
    });
  }
  
  // Initialize dashboard data on page load
  document.addEventListener("DOMContentLoaded", () => {
    fetchOverviewData();
    loadRecentActivities();
  });
  