document.addEventListener('DOMContentLoaded', function() {
    // Inicializar el carrusel de Bootstrap
    var myCarousel = document.querySelector('#myCarousel');
    if (myCarousel) {
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: true
        });
    }

    // Verifica si hay una intención de desplazarte a "Servicios Jurídicos"
    if (localStorage.getItem('scrollToServicios') === 'true') {
        const serviciosSection = document.getElementById('servicios');
        if (serviciosSection) {
            serviciosSection.scrollIntoView({ behavior: 'smooth' });
        }
        localStorage.removeItem('scrollToServicios');
    }

    // Actualizar el año actual
    const year = document.getElementById('current-year');
    if (year) {
        year.innerHTML = new Date().getFullYear();
    }

    // Manejo del carrusel y cambio de texto
    var carouselExampleRide = document.getElementById('carouselExampleRide');
    if (carouselExampleRide) {
        var headerText = document.querySelector('.frame-container h1');
        carouselExampleRide.addEventListener('slide.bs.carousel', function(event) {
            if (event.to === 1) {
                headerText.textContent = 'INTEGRIDAD Y RESPONSABILIDAD SOCIAL';
            } else {
                headerText.textContent = 'VINCULACIÓN GUBERNAMENTAL Y ENLACE EMPRESARIAL';
            }

            const activeItem = document.querySelector('.carousel-item.active');
            if (activeItem) {
                const activeIndex = parseInt(activeItem.getAttribute('data-bs-slide-to'));
                const links = document.querySelectorAll('.link-afiliados');
                links.forEach((link, index) => {
                    link.style.display = index === activeIndex ? 'block' : 'none';
                });
            }
        });
    }
});

function scrollToServicios() {
    if (window.location.pathname.includes('index.php') || window.location.pathname === '/') {
        const serviciosSection = document.getElementById('servicios');
        if (serviciosSection) {
            serviciosSection.scrollIntoView({ behavior: 'smooth' });
        }

        const navbarToggle = document.getElementById('navbarToggleExternalContent');
        if (navbarToggle && navbarToggle.classList.contains('show')) {
            const bootstrapCollapse = new bootstrap.Collapse(navbarToggle, {
                toggle: true,
            });
        }
    } else {
        if (typeof Storage !== 'undefined') {
            localStorage.setItem('scrollToServicios', 'true');
        }
        window.location.href = '/index.php';
    }
}