document.addEventListener("DOMContentLoaded", function () {
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
