function animationLeaves(){

    if(window.innerWidth >= 1200){
        
        const containerLeaves : HTMLElement | null = document.querySelector('.leavesContainer');
        let left : number = 0;
        let top : number = 0;
        let x = 0;
        let y = 0;

        if(containerLeaves){

            const imgs : NodeListOf<HTMLImageElement> = containerLeaves.querySelectorAll('img');

            window.onmousemove = (e : MouseEvent) => {

                const mouseX = e.pageX;
                const mouseY = e.pageY;
    
                if(mouseX < left){
    
                    if(x > -25){
                        x-=0.3;
                    }
    
                }else if(mouseX > left){
                    
                    if(x < 25){
                        x+=0.3;
                    }
    
                }

                if(mouseY < top){
    
                    if(y > -25){
                        y-=0.3;
                    }
    
                }else if(mouseY > top){
                    
                    if(y < 25){
                        y+=0.3;
                    }
    
                }
    
                left = mouseX;
                top = mouseY;

                imgs.forEach( ( e : HTMLElement ) => {

                    e.style.transform = `translateX(${x}px) translateY(${y}px)`;

                });
    
    
            }


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

function ramdonImage(transparent : string, green : string) : { type: number, img: string }{

    const typeLeave = Math.floor(Math.random() * 2);  // Aqui ejecutamos un ramdon del 0 al 1 para ver que imagen se inserta, si las transparent o la verde

    // Si el ramdom es 1 mostramos la hoja verde
    if(typeLeave){
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

function insertLeaves(containerLeaves : HTMLElement, transparent : string, green : string) : void{

    const leftPosition = Math.floor(Math.random() * 101); // Ejecutamos la posicion del left del 0 al 100 porciento
    const getAllLeaves : NodeListOf<HTMLElement> = containerLeaves.querySelectorAll('.leave'); // Obtenemos todos las hojas para ejecutar el codigo de caida

    containerLeaves.insertAdjacentHTML(
        'beforeend', 
        htmlLeaves(
            leftPosition, 
            ramdonImage(transparent, green)
        )
    );

    getAllLeaves.forEach( (element : HTMLElement) => {
        element.style.top = '105%';
    });

}

/**
 * Creamos el tipo de hoja
 * @param leftPosition 
 * @returns 
 */

function htmlLeaves(leftPosition : number, object : { type: number, img : string }) : string{

    const html = `<span class="leave" style="left: ${leftPosition}%;"> <img src="${object.img}" class="${ object.type ? 'reverse' : 'normal' }" width="30" height="30" alt="img"/> </span>`;

    return html;

}

export default animationLeaves;