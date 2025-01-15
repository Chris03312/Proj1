// Get the toggle button, sidebar, and content elements
const toggler = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");
const content = document.querySelector(".content");

// Add event listener to the toggle button
toggler.addEventListener("click", function() {
    // Toggle the collapsed class on sidebar and overlay-active on content
    sidebar.classList.toggle("collapsed");
    content.classList.toggle("overlay-active");
});

// Close sidebar when pressing the Esc key
document.addEventListener("keydown", function(e) {
    if (e.key === "Escape" && sidebar.classList.contains("collapsed")) {
        sidebar.classList.remove("collapsed");
        content.classList.remove("overlay-active");
    }
});

// Close sidebar when clicking outside of it on smaller screens
document.addEventListener("click", function(event) {
    if (window.innerWidth <= 768) { // Adjust as needed for your responsive breakpoint
        if (!sidebar.contains(event.target) && !toggler.contains(event.target) && sidebar.classList.contains("collapsed")) {
            sidebar.classList.remove("collapsed");
            content.classList.remove("overlay-active");
        }
    }
});






// Adding active class to the current page
document.querySelectorAll('.nav-link').forEach(link => {
    if(link.href === window.location.href) {
        link.setAttribute('aria-current', 'page');
    }
})