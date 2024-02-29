/**
 * Aqui obtenemos la altura del height para redimencionar el header principal
 */
var heightMenu = function () {
    var headerMenu = document.querySelector('.elementor-location-header');
    var mainRecetas = document.querySelectorAll('.recetas-header');
    if (headerMenu) {
        var height = headerMenu.offsetHeight;
        console.log(height);
        mainRecetas.forEach(function (element) {
            // element.style.marginTop  = `${height + 60}px`
        });
    }
};
export default heightMenu;
