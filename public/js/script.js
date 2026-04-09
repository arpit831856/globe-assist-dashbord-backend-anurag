document.addEventListener("DOMContentLoaded", function () {
  // User Growth Chart
  const userGrowthCtx = document.getElementById("userGrowthChart")?.getContext("2d");
  if (userGrowthCtx) {
    new Chart(userGrowthCtx, {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "New Users",
          data: [50, 60, 45, 70, 90, 120, 100, 110, 95, 130, 125, 150],
          borderColor: "#1a386c",
          backgroundColor: "rgba(53, 82, 129, 0.1)",
          borderWidth: 2,
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: true, position: "top" } },
        scales: {
          y: { beginAtZero: true, grid: { drawBorder: false } },
          x: { grid: { display: false } }
        }
      }
    });
  }

  // Partners by Company Type (Doughnut)
  const partnerCategoryCtx = document.getElementById("partnerCategoryChart")?.getContext("2d");
  if (partnerCategoryCtx) {
    new Chart(partnerCategoryCtx, {
      type: "doughnut",
      data: {
        labels: ["Private Ltd", "Partnership", "Startup", "LLP", "Other"],
        datasets: [{
          data: [120, 80, 60, 40, 20],
          backgroundColor: ["#162f5c", "#355281", "#0a1429", "#a1bad5", "#060a18"],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { position: "right" } },
        cutout: "70%"
      }
    });
  }

  // User Engagement Targets (Bar Chart)
  const engagementCtx = document.getElementById("engagementChart")?.getContext("2d");
  if (engagementCtx) {
    new Chart(engagementCtx, {
      type: "bar",
      data: {
        labels: ["Daily Active", "Weekly Active", "Monthly Active"],
        datasets: [{
          label: "Users Engaged",
          data: [180, 600, 1200],
          backgroundColor: ["#65b741", "#c1f2b0", "#8ecd6e"]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          y: { beginAtZero: true, grid: { drawBorder: false } },
          x: { grid: { display: false } }
        }
      }
    });
  }

  // User Demographics (Bar Chart)
  const demographicsCtx = document.getElementById("demographicsChart")?.getContext("2d");
  if (demographicsCtx) {
    new Chart(demographicsCtx, {
      type: "bar",
      data: {
        labels: ["18-24", "25-34", "35-44", "45-54", "55-64", "65+"],
        datasets: [
          {
            label: "Male Users",
            data: [15, 35, 25, 15, 5, 2],
            backgroundColor: "#65b741",
            borderWidth: 0
          },
          {
            label: "Female Users",
            data: [20, 45, 30, 20, 10, 5],
            backgroundColor: "#c1f2b0",
            borderWidth: 0
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { position: "top" } },
        scales: {
          y: { beginAtZero: true, grid: { drawBorder: false } },
          x: { grid: { display: false } }
        }
      }
    });
  }
});
