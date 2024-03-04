var scrollAnimation = function () {
    var contentRecetas = document.querySelector('.content_mobile .content');
    var contactFom = document.querySelector('.recetas-container .contact-home .all .information');
    var containerWidgetForm = document.querySelector('.recetas-container .contact-home .all .widget');
    var imageReceta = document.querySelector('.recetas-container .header_recetas .thumbnail');
    var titleReceta = document.querySelector('.ingredients_recetas .content_header h1');
    var tituloInstrucciones = document.querySelector('.ingredients_recetas .content_instructions');
    var historyImage = document.querySelectorAll('.history_section img');
    var informationImage = document.querySelectorAll('.information_section img');
    var bienestarImage = document.querySelector('.bienestar img');
    if (contentRecetas) {
        var allRecetas = contentRecetas.querySelectorAll('a');
        allRecetas.forEach(function (itemRecetas) {
            observer.observe(itemRecetas);
        });
    }
    if (contactFom) {
        observer.observe(contactFom);
    }
    if (containerWidgetForm) {
        observer.observe(containerWidgetForm);
    }
    if (imageReceta) {
        observer.observe(imageReceta);
    }
    if (titleReceta) {
        observer.observe(titleReceta);
    }
    if (tituloInstrucciones) {
        observer.observe(tituloInstrucciones);
    }
    if (historyImage.length) {
        historyImage.forEach(function (e) {
            observer.observe(e);
        });
    }
    if (informationImage.length) {
        informationImage.forEach(function (e) {
            observer.observe(e);
        });
    }
    if (bienestarImage) {
        observer.observe(bienestarImage);
    }
};
var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            var element = entry.target;
            element.classList.add('show');
        }
    });
}, { threshold: 0.5 });
export default scrollAnimation;
