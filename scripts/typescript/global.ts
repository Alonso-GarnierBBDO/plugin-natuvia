import LeavesAnimation from './helpers/leaves.js';
import { slider, setItems, initSlider } from './helpers/slider.js';
import review from './helpers/reviews.js';
import forms from './helpers/form.js';
import animationLetter from './helpers/javascript/letter.js';
import scrollAnimation from './helpers/scroll.js';
import scrollLetterAnimation from './helpers/javascript/scrollLetterAnimation.js';

// Ejecutamos todos los scrips
window.addEventListener('DOMContentLoaded', () => {

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
    scrollLetterAnimation()

});

window.addEventListener('scroll', () => {

    scrollAnimation();
    scrollLetterAnimation()

});



