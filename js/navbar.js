let prevScrollPos = window.pageYOffset;
const navbar = document.getElementById('navbar');
const navbarHeight = navbar.clientHeight;
let isNavbarFixed = false;

navbar.style.transform = 'translateY(0)';

window.addEventListener("scroll", function() {
    const currentScrollPos = window.pageYOffset;
    if (prevScrollPos > currentScrollPos) { // Scroll hacia arriba
        if (isNavbarFixed) {
            isNavbarFixed = false;
            navbar.style.transition = 'transform 0.3s ease';
            navbar.style.transform = 'translateY(0)';
        }
    }
    else { // Scroll hacia abajo
        if (!isNavbarFixed) {
            isNavbarFixed = true;
            navbar.style.transition = 'transform 0.3s ease';
            navbar.style.transform = `translateY(-${navbarHeight}px)`;
        }
    }
    prevScrollPos = currentScrollPos;
});