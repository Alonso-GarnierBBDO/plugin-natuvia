import LeavesAnimation from './helpers/leaves.js';
import { slider, setItems, initSlider } from './helpers/slider.js';
import review from './helpers/reviews.js';
import forms from './helpers/form.js';
import animationLetter from './helpers/javascript/letter.js';
import scrollAnimation from './helpers/scroll.js';
import scrollLetterAnimation from './helpers/javascript/scrollLetterAnimation.js';

let finalizarLoading : boolean | null = false;

document.body.style.overflowY = 'hidden';

// Ejecutamos todos los scrips
window.addEventListener('DOMContentLoaded', () => {

    const loading : HTMLElement | null = document.querySelector('.loading');

    if(loading){

        const text_loading : HTMLElement | null = loading.querySelector('h4');
        const capas : HTMLElement | null = loading.querySelector('.capas');

        if(text_loading && capas){

            const span_loading : HTMLSpanElement | null = text_loading.querySelector('span');

            if(span_loading){

                let puntos = 0;
                let text = '';

                const intervalLoading = setInterval(()=>{

                    if(finalizarLoading){
                        text_loading.innerHTML = 'Bienvenido Natucocinero';
                        loading.classList.add('capa_remove');

                        setTimeout(()=> {

                            loading.classList.add('remove');
                            setTimeout(() => {
                                loading.remove();
                                document.body.style.overflowY = 'initial';
                            }, 700)

                            iniciarElement();

                        }, 600)

                        clearInterval(intervalLoading);
                    }

                    if(puntos == 0){
                        text = '';
                    }else if(puntos == 1){
                        text = '.';
                    }else if(puntos == 2){
                        text = '..';
                    }else if(puntos == 3){
                        text = '...';
                    }
                    
                    span_loading.textContent = text;
                    
                    if(puntos == 3){
                        puntos = 0;
                    }else{
                        puntos += 1;
                    }
                }, 400);

            }

        }

    }

});

const iniciarElement = () => {

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

}

window.addEventListener('load', () => {
    finalizarLoading = true;
})

window.addEventListener('scroll', () => {

    scrollAnimation();
    scrollLetterAnimation()

});



