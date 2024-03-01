import LeavesAnimation from './helpers/leaves.js';
import { slider, setItems, initSlider } from './helpers/slider.js';

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

});

/**
 * Esta funcion evita que se ejecuten muchos enventos seguidos, para no sobrecargar el navedador
 * @param fn 
 * @param wait 
 * @returns 
 */

// const throttel = ( fn: Function, wait: number = 300 ) => {

//     let inThrottel : Boolean, lastFn: ReturnType<typeof setTimeout>, lastTime: number;

//     return function (this: any){

//         const context = this, arg = arguments;
        
//         if(!inThrottel){
//             fn.apply(context, arg);
//             lastTime = Date.now();
//             inThrottel = true;
//         }else{
//             clearTimeout(lastFn);

//             lastFn = setTimeout(()=>{

//                 if(Date.now() - lastTime >= wait){

//                     fn.apply(context, arg);
//                     lastTime = Date.now();

//                 }

//             }, Math.max(wait - (Date.now() - lastTime), 0));

//         }

//     }

// }

// window.addEventListener('resize', throttel(function (evt) {

//     // Reajustamos el slider
//     slider();

//     // Inicializamos los controles del slider
//     // initSlider();

// }, 450));
