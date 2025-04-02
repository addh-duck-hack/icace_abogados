// filepath: /icace_abogados/icace_abogados/js/scripts.js
document.addEventListener('DOMContentLoaded', function() {
    // Aquí puedes agregar scripts personalizados para la funcionalidad adicional del sitio web.
    
    
    // Ejemplo: Inicializar el carrusel de Bootstrap
    var myCarousel = document.querySelector('#myCarousel');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2000,
        wrap: true
    });
});
    const year = document.getElementById('current-year');
    year.innerHTML = new Date().getFullYear();

    var carouselExampleRide = document.getElementById('carouselExampleRide');
    var headerText = document.querySelector('.frame-container h1');

    carouselExampleRide.addEventListener('slide.bs.carousel', function(event) {
    if (event.to === 1) { // Índice de la segunda diapositiva
            headerText.textContent = 'INTEGRIDAD Y RESPONSABILIDAD SOCIAL';
    } else {
            headerText.textContent = 'VINCULACIÓN GUBERNAMENTAL Y ENLACE EMPRESARIAL';
    }
    // Mostrar/ocultar enlaces según la diapositiva activa
    const activeIndex = parseInt(document.querySelector('.carousel-item.active').getAttribute('data-bs-slide-to'));
    const links = document.querySelectorAll('.link-afiliados');

    links.forEach((link, index) => {
        if (index === activeIndex) {
            link.style.display = 'block'; // Muestra el enlace correspondiente
        } else {
            link.style.display = 'none'; // Oculta los demás enlaces
        }
    });
});



