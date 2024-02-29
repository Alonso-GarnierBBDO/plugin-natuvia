function animationLeaves() {
    var containerLeaves = document.querySelector('.recetas-container .leaves');
    if (containerLeaves) {
        // Obtenemos las url de las imagenes
        var imgLeaveTransparent_1 = containerLeaves.getAttribute('transparent');
        var imgLeaveGreen_1 = containerLeaves.getAttribute('green');
        if (imgLeaveTransparent_1 && imgLeaveGreen_1) {
            insertLeaves(containerLeaves, imgLeaveTransparent_1, imgLeaveGreen_1);
            setInterval(function () {
                insertLeaves(containerLeaves, imgLeaveTransparent_1, imgLeaveGreen_1);
            }, 4000);
        }
    }
}
/**
 * Aqui validamos que debemos imagen debe ir en el box del la hoja
 * @param transparent
 * @param green
 */
function ramdonImage(transparent, green) {
    var typeLeave = Math.floor(Math.random() * 2); // Aqui ejecutamos un ramdon del 0 al 1 para ver que imagen se inserta, si las transparent o la verde
    // Si el ramdom es 1 mostramos la hoja verde
    if (typeLeave) {
        return {
            type: typeLeave,
            img: green
        };
    }
    // Por defecto va la hoja transparent
    return {
        type: typeLeave,
        img: transparent
    };
}
/**
 * Agregamos las hojas en el contenedor
 * @param containerLeaves
 * @param transparent
 * @param green
 */
function insertLeaves(containerLeaves, transparent, green) {
    var leftPosition = Math.floor(Math.random() * 101); // Ejecutamos la posicion del left del 0 al 100 porciento
    var getAllLeaves = containerLeaves.querySelectorAll('.leave'); // Obtenemos todos las hojas para ejecutar el codigo de caida
    containerLeaves.insertAdjacentHTML('beforeend', htmlLeaves(leftPosition, ramdonImage(transparent, green)));
    getAllLeaves.forEach(function (element) {
        element.style.top = '105%';
    });
}
/**
 * Creamos el tipo de hoja
 * @param leftPosition
 * @returns
 */
function htmlLeaves(leftPosition, object) {
    var html = "<span class=\"leave\" style=\"left: ".concat(leftPosition, "%;\"> <img src=\"").concat(object.img, "\" class=\"").concat(object.type ? 'reverse' : 'normal', "\" width=\"30\" height=\"30\" alt=\"img\"/> </span>");
    return html;
}
export default animationLeaves;
