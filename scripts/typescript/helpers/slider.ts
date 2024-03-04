
let htmlElementContent : HTMLCollection | null = null;
let number : number = 3;
let newHTMLElementContent : string | null = '';
let getContentSlider : NodeListOf<HTMLElement> | null = null ;
let getContent : HTMLElement | null = null;
let getControls : HTMLElement | null = null;

const setItems  = () => {

    // Obtenemos los items del array

    getContentSlider = document.querySelectorAll('.slider');

    if(getContentSlider){

        getContentSlider.forEach(( e : HTMLElement ) => {

            getContent = e.querySelector('.content') as HTMLElement;
            getControls = e.querySelector('.controls');

            const firstChild : HTMLElement = getContent.children[0] as HTMLElement;

            if(firstChild){

                const heightItems = firstChild.offsetHeight + 80;

                getContent.style.height =  `${heightItems}px`

            }

            if(getContent && getControls){

                htmlElementContent = getContent.children;

            }
        });

    }
}

const slider = () => {

    if(window.innerWidth >= 1025){
        number  = 4
    }else{
        number  = 3
    }


    if(getContentSlider && getContent){

        if(htmlElementContent?.length){

            const convertHTMLElement : Element[] = Array.from(htmlElementContent);

            do{

                const encapsulateElement = convertHTMLElement.slice(0, number);
                const convertHTML = encapsulateElement.map(element => element.outerHTML);
                let htmlString : string = '';

                // // Agregamos la nueva clase
                convertHTML.unshift(`<section class="items show ${!newHTMLElementContent?.length ? 'active' : 'right'}">`);
                convertHTML.push('</section>');

                convertHTML.forEach( e => {
                    htmlString += e;
                });

                if(htmlString.length){
                    newHTMLElementContent += htmlString;
                }


                // Removemos los items del Array
                convertHTMLElement.splice(0, number);

            }while(convertHTMLElement.length);

            if(newHTMLElementContent){
                getContent.innerHTML = newHTMLElementContent;
            }

        }
    

    }
}


const initSlider = () => {


    if(getControls && getContent){

        const prev : HTMLButtonElement | null = getControls.querySelector('.prev');
        const next : HTMLButtonElement | null = getControls.querySelector('.next');

        if(prev && next){

            prev.onclick = () => {

                next.disabled = false;

                if(runSlider('prev')){
                    prev.disabled = true;
                }

            }

            next.onclick = () => {

                prev.disabled = false;

                if(runSlider('next')){
                    next.disabled = true;
                }

            }

        }

    }

}


const runSlider  = (type : string) => {

    let disabled = false;

    if(getContentSlider){

        getContentSlider.forEach(( e : HTMLElement, key : number ) => {


            const allItems : NodeListOf<HTMLElement> = e.querySelectorAll('.items');
            const allItemsArray : HTMLElement[] = Array.from(allItems);
            let itemBrother : Element | null = null

            if(allItems.length > 1){

                allItemsArray.some( (item : HTMLElement, key : number) => {

                    if(item.classList.contains('active')){
    
                        if(type == 'next'){
    
                            itemBrother = item.nextElementSibling;
    
                            if(key == (allItemsArray.length - 2)){
                                disabled = true;
                            }
    
                            if(itemBrother){
    
                                item.classList.add('left');
                                item.classList.remove('active');
    
                                itemBrother?.classList.add('active');
                                itemBrother?.classList.remove('right');
    
                                return true;
    
                            }
    
                        }else if(type == 'prev'){
    
                            itemBrother = item.previousElementSibling;
    
                            if(key == 1){
                                disabled = true;
                            }
    
                            if(itemBrother){
    
                                item.classList.add('right');
                                item.classList.remove('active');
    
                                itemBrother?.classList.add('active');
                                itemBrother?.classList.remove('left');
    
                                return true;
    
                            }
    
                        }
    
                    }
    
                })
            }else {

                disabled = true;

            }

        });
    }

    return disabled;

}


export {
    slider,
    setItems,
    initSlider
};