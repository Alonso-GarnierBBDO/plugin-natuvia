
const animationLetter = () => {

    const headerRecetas_h1 = document.querySelector('.recetas-header h1');
    const titleReceta = document.querySelector('.ingredients_recetas .content_header h1');

    if(headerRecetas_h1){

        headerRecetas_h1.classList.add('show');

        //headerRecetas_h1.innerHTML = headerRecetas_h1.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        /*anime.timeline({loop: false})
        .add({
            targets: '.recetas-header h1 .letter',
            translateY: [120,0],
            easing: "easeOutExpo",
            duration: 1400,
            delay: (el, i) => 30 * i
        })*/

    }

    if(titleReceta){

        titleReceta.classList.add('show');


        /*titleReceta.innerHTML = titleReceta.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: false})
        .add({
            targets: '.ingredients_recetas .content_header h1 .letter',
            translateY: [120,0],
            easing: "easeOutExpo",
            duration: 1400,
            delay: (el, i) => 30 * i
        })*/

    }

}

export default animationLetter;