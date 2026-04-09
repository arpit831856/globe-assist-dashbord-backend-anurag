/* ==================== SHARED DASHBOARD JS ==================== */

/* --- Sidebar toggle (mobile) --- */
function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");
  var overlay = document.getElementById("sidebarOverlay");
  var btn = document.getElementById("hamburgerBtn");
  sidebar.classList.toggle("open");
  overlay.classList.toggle("active");
  btn.classList.toggle("open");
  document.body.style.overflow = sidebar.classList.contains("open")
    ? "hidden"
    : "";
}
function closeSidebar() {
  var sidebar = document.getElementById("sidebar");
  var overlay = document.getElementById("sidebarOverlay");
  var btn = document.getElementById("hamburgerBtn");
  sidebar.classList.remove("open");
  overlay.classList.remove("active");
  btn.classList.remove("open");
  document.body.style.overflow = "";
}

/* --- Dropdown --- */
function toggleDD() {
  var d = document.getElementById("ddMenu");
  d.style.display = d.style.display === "block" ? "none" : "block";
}
window.addEventListener("click", function (e) {
  if (!e.target.closest(".user-menu")) {
    var dd = document.getElementById("ddMenu");
    if (dd) dd.style.display = "none";
  }
});

/* --- Logout modal --- */
function openLogoutModal() {
  document.getElementById("logoutModal").classList.add("open");
}
function closeLogoutModal() {
  document.getElementById("logoutModal").classList.remove("open");
}

/* --- Close modal on backdrop click --- */
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".modal-bg").forEach(function (bg) {
    bg.addEventListener("click", function (e) {
      if (e.target === bg) bg.classList.remove("open");
    });
  });

  /* Mark active sidebar link by current page filename */
  var page = window.location.pathname.split("/").pop() || "index.html";
  document.querySelectorAll(".sidebar-menu a[data-page]").forEach(function (a) {
    if (a.getAttribute("data-page") === page) a.classList.add("active");
  });
});

/* --- Escape key closes things --- */
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    closeSidebar();
  }
});

/* --- Lightbox --- */
function openLightbox(src, caption) {
  if (!src) return;
  document.getElementById("lightboxImg").src = src;
  document.getElementById("lightboxCaption").textContent = caption || "";
  document.getElementById("lightbox").classList.add("open");
  document.body.style.overflow = "hidden";
}
function closeLightboxBtn() {
  document.getElementById("lightbox").classList.remove("open");
  document.body.style.overflow = "";
}
function closeLightboxBg(e) {
  if (e.target === document.getElementById("lightbox")) closeLightboxBtn();
}
