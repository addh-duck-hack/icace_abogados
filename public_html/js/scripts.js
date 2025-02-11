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