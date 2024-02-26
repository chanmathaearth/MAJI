fetch('../topbar.html')
    .then(response => response.text())
    .then(html => {
        document.getElementById('sidebar').innerHTML = html;
    });

function loadPage(link) {
    window.location.href = link;
}
document.addEventListener('DOMContentLoaded', function () {
    const toggleMenu = document.getElementById('toggleMenu');
    const navbarHamburger = document.getElementById('navbar-hamburger');

    toggleMenu.addEventListener('click', function () {
        navbarHamburger.classList.toggle('hidden');
    });
});