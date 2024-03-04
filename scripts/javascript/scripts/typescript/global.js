import LeavesAnimation from './helpers/leaves.js';
import { slider, setItems, initSlider } from './helpers/slider.js';
import review from './helpers/reviews.js';
import forms from './helpers/form.js';
import animationLetter from './helpers/javascript/letter.js';
import scrollAnimation from './helpers/scroll.js';
import scrollLetterAnimation from './helpers/javascript/scrollLetterAnimation.js';
var finalizarLoading = false;
document.body.style.overflowY = 'hidden';
// Ejecutamos todos los scrips
window.addEventListener('DOMContentLoaded', function () {
    var loading = document.querySelector('.loading');
    if (loading) {
        var text_loading_1 = loading.querySelector('h4');
        var capas = loading.querySelector('.capas');
        if (text_loading_1 && capas) {
            var span_loading_1 = text_loading_1.querySelector('span');
            if (span_loading_1) {
                var puntos_1 = 0;
                var text_1 = '';
                var intervalLoading_1 = setInterval(function () {
                    if (finalizarLoading) {
                        text_loading_1.innerHTML = 'Bienvenido Natucocinero';
                        loading.classList.add('capa_remove');
                        setTimeout(function () {
                            loading.classList.add('remove');
                            setTimeout(function () {
                                loading.remove();
                                document.body.style.overflowY = 'initial';
                            }, 700);
                            iniciarElement();
                        }, 600);
                        clearInterval(intervalLoading_1);
                    }
                    if (puntos_1 == 0) {
                        text_1 = '';
                    }
                    else if (puntos_1 == 1) {
                        text_1 = '.';
                    }
                    else if (puntos_1 == 2) {
                        text_1 = '..';
                    }
                    else if (puntos_1 == 3) {
                        text_1 = '...';
                    }
                    span_loading_1.textContent = text_1;
                    if (puntos_1 == 3) {
                        puntos_1 = 0;
                    }
                    else {
                        puntos_1 += 1;
                    }
                }, 400);
            }
        }
    }
});
var iniciarElement = function () {
    // Animacion de las hojas
    LeavesAnimation();
    // Obtenemos todos los items del slider
    setItems();
    // Reajustamos el slider
    slider();
    // Inicializamos los controles del slider
    initSlider();
    // Inicializamos las review
    review();
    // Establecemos los valores
    forms();
    // Agregamos la animacion
    animationLetter();
    // Animacion de entrada
    scrollAnimation();
    // Animatoin de scroll
    scrollLetterAnimation();
};
window.addEventListener('load', function () {
    finalizarLoading = true;
});
window.addEventListener('scroll', function () {
    scrollAnimation();
    scrollLetterAnimation();
});
