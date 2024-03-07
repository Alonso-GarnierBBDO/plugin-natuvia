function animationLeaves() {
    if (window.innerWidth >= 1200) {
        var containerLeaves = document.querySelector('.leavesContainer');
        var left_1 = 0;
        var top_1 = 0;
        var x_1 = 0;
        var y_1 = 0;
        if (containerLeaves) {
            var imgs_1 = containerLeaves.querySelectorAll('img');
            window.onmousemove = function (e) {
                var mouseX = e.pageX;
                var mouseY = e.pageY;
                if (mouseX < left_1) {
                    if (x_1 > -25) {
                        x_1 -= 0.3;
                    }
                }
                else if (mouseX > left_1) {
                    if (x_1 < 25) {
                        x_1 += 0.3;
                    }
                }
                if (mouseY < top_1) {
                    if (y_1 > -25) {
                        y_1 -= 0.3;
                    }
                }
                else if (mouseY > top_1) {
                    if (y_1 < 25) {
                        y_1 += 0.3;
                    }
                }
                left_1 = mouseX;
                top_1 = mouseY;
                imgs_1.forEach(function (e) {
                    e.style.transform = "translateX(".concat(x_1, "px) translateY(").concat(y_1, "px)");
                });
            };
        }
    }
    /*
    const containerLeaves : HTMLElement | null = document.querySelector('.recetas-container .leaves')

    if(containerLeaves){

        // Obtenemos las url de las imagenes
        const imgLeaveTransparent : string | null = containerLeaves.getAttribute('transparent');
        const imgLeaveGreen : string | null= containerLeaves.getAttribute('green');

        if(imgLeaveTransparent && imgLeaveGreen){

            insertLeaves(containerLeaves, imgLeaveTransparent, imgLeaveGreen);

            setInterval(()=>{

                insertLeaves(containerLeaves, imgLeaveTransparent, imgLeaveGreen);

            }, 4000)

        }

    }*/
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
