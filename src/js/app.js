document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkMode();
})

function darkMode() {
    const darkButton = document.querySelector('.dark-mode')
    const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)')

    if(prefersDarkMode.matches) {
        document.body.classList.add('dark')
    } else {
        document.body.classList.remove('dark')
    }

    darkButton.addEventListener('click', () => {
        document.body.classList.toggle('dark')
    })
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    let nav = document.querySelector('.navegacion');
    if(nav.classList.contains('mostrar')) {
        nav.classList.remove('mostrar');
    } else {
        nav.classList.add('mostrar')
    }
}