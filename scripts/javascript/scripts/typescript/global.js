import LeavesAnimation from './helpers/leaves.js';
import SliderAnimation from './helpers/slider.js';
// Ejecutamos todos los scrips
window.addEventListener('DOMContentLoaded', function () {
    // Animacion de las hojas
    LeavesAnimation();
    // Armamos el slider
    SliderAnimation();
});
window.addEventListener('resize', function () {
    SliderAnimation();
});
