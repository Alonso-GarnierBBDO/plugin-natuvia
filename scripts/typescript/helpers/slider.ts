
let htmlElementContent : string | null = null;
let number : number = 3;

const slider = () => {

    const getContentSlider : NodeListOf<HTMLElement> = document.querySelectorAll('.slider');

    if(window.innerWidth >= 1025){
        number  = 4
    }

    if(getContentSlider){
        
        getContentSlider.forEach(( e : HTMLElement ) => {

            const getContent : HTMLElement | null = e.querySelector('.content');
            const getControls : HTMLElement | null = e.querySelector('.controls');

            if(getContent && getControls){

                htmlElementContent = getContent.innerHTML;

                const items = htmlElementContent.trim().split('\n').filter(item => item.trim() !== '');
                const groupedItems : string[] = [];


                for (let i = 0; i < items.length; i += number) {
                    // Extraer 4 elementos por iteración
                    const chunk = items.slice(i, i + number);
                  
                    // Si hay elementos en el chunk, agrúpalos
                    if (chunk.length) {

                      const group = `<section class="items">\n ${chunk.join('\n')} \n</section>`;
                      groupedItems.push(group);

                    }
                }

                // Unir todos los grupos en una sola cadena
                const resultString = groupedItems.join('\n');

                getContent.innerHTML = resultString;

                initSlider(getContent, getControls);


            }

        })

    }
}


const initSlider = (getContent : HTMLElement, getControls : HTMLElement) => {

    const allItems : NodeListOf<HTMLElement> = getContent.querySelectorAll('.items');
    const prev : HTMLButtonElement | null = getControls.querySelector('.prev');
    const next : HTMLButtonElement | null = getControls.querySelector('.next');

    setSlider(getContent, allItems, '')

    if(prev && next){

        prev.onclick = () => {
            if(setSlider(getContent, allItems, 'prev')){
                next.disabled = true;
            }
        }

        next.onclick = () => {
            if(setSlider(getContent, allItems, 'next')){
                next.disabled = true;
            }
        }

    }

}

const setSlider  = (getContent : HTMLElement, allItems : NodeListOf<HTMLElement>, next : string) : boolean => {

    let intElement : number = 0;
    let disabledButton : boolean = false;


    allItems.forEach( (e : HTMLElement, key : number) => {


        // Inicializamos el slider
        if(!next.length && key == 0){
            e.classList.add('active');
        }else if(!next.length){
            e.classList.add('right');
        }

        if(next.length){
            
            nextElement(e, key, intElement, next)

            if(e.classList.contains('active')){

                intElement = key;
                e.classList.remove('active');
    
                if(next == 'next'){
                    e.classList.add('left');
                    e.classList.remove('right');
                }else if(next == 'prev'){
                    // e.classList.add('right');
                    // e.classList.remove('left');
                }
    
            }

            // if(nextElement(e, key, intElement, next) == (allItems.length - 1)){
            //     disabledButton = true;
            // }
        }

    });

    return disabledButton;

}

const nextElement = (e : HTMLElement, key : number, intElement : number, type : string) => {


    if(type == 'next'){

        if(key == (intElement + 1)){

            e.classList.add('active');
            e.classList.remove('right');
            e.classList.remove('left');
    
            return key
            
        }

    }else if(type == 'prev'){

        if(key == (intElement)){

            e.classList.add('active');
            e.classList.remove('left');
            e.classList.remove('right');
    
            return key
            
        }

    }

}

export default slider;