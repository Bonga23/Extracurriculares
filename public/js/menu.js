const toggle = document.querySelector(".menu-toggle");
const navLinks = document.querySelector(".nav-links");

toggle.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});

// Cerrar menú al hacer clic en un enlace
document.querySelectorAll(".nav-links a").forEach(link => {
    link.addEventListener("click", () => {
        navLinks.classList.remove("active");
    });
});
const closeBtn = document.querySelector(".close-btn");

closeBtn.addEventListener("click", () => {
    navLinks.classList.remove("active");
});
