let target = '';


const scrollLetterAnimation = () => {

    const subTitleHome = document.querySelector('.contact-home h2');
    const historyTitle = document.querySelector('.history_section h2');
    const informationTitle = document.querySelector('.information_section h2');
    const bienestarTitle = document.querySelector('.bienestar_content h2');
    const bienestarSubTitle = document.querySelector('.bienestar_content h3');
    const commentTitle = document.querySelector('.comments h2');

    if(subTitleHome){
        viewConserver('.contact-home h2').observe(subTitleHome)
    }

    if(historyTitle){
        viewConserver('.history_section h2').observe(historyTitle)
    }

    if(informationTitle){
        viewConserver('.information_section h2').observe(informationTitle)
    }

    if(bienestarTitle){
        viewConserver('.bienestar_content h2').observe(bienestarTitle)
    }

    if(bienestarSubTitle){
        viewConserver('.bienestar_content h3').observe(bienestarSubTitle)
    }

    if(commentTitle){
        viewConserver('.comments h2').observe(commentTitle)
    }

}

const viewConserver = (target) => {

    const observer = new IntersectionObserver(( entries, observer ) => {

        entries.forEach( (entry) => {
    
            if(entry.isIntersecting){
    
                const element = entry.target;
    
                if(!element.classList.contains('show')){
    
                    //element.innerHTML = element.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
    
                    element.classList.add('show')
    
                    /*anime.timeline({loop: false})
                    .add({
                        targets: target + ' .letter',
                        translateY: [120,0],
                        easing: "easeOutExpo",
                        duration: 1400,
                        delay: (el, i) => 30 * i
                    })*/
    
                }
    
            }
    
        })
    
    }, { threshold: 0.5 });

    return observer;

}

export default scrollLetterAnimation;