// public/js/script.js
document.addEventListener("DOMContentLoaded", function () {
  // Fade out alert messages after 3 seconds
  const alerts = document.querySelectorAll(".alert");
  if (alerts.length > 0) {
    setTimeout(function () {
      alerts.forEach(function (alert) {
        alert.style.opacity = "0";
        alert.style.transition = "opacity 0.5s";
        setTimeout(function () {
          alert.style.display = "none";
        }, 500);
      });
    }, 3000);
  }
});
