window.addEventListener("DOMContentLoaded", () => {
    const sidebarToggle = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebar");
    const navbar = document.getElementById("navbar");

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
        navbar.classList.toggle("sidebar-closed");
    });
});
