
const scrollAnimation = () => {

    const contentRecetas : HTMLElement | null = document.querySelector('.content_mobile .content');
    const contactFom : HTMLElement | null = document.querySelector('.recetas-container .contact-home .all .information');
    const containerWidgetForm : HTMLElement | null = document.querySelector('.recetas-container .contact-home .all .widget');
    const imageReceta : HTMLElement | null = document.querySelector('.recetas-container .header_recetas .thumbnail');
    const titleReceta = document.querySelector('.ingredients_recetas .content_header h1');
    const tituloInstrucciones = document.querySelector('.ingredients_recetas .content_instructions');
    const historyImage = document.querySelectorAll('.history_section img');
    const informationImage = document.querySelectorAll('.information_section img');
    const bienestarImage = document.querySelector('.bienestar img');

    if(contentRecetas){
        const allRecetas : NodeListOf<HTMLElement> = contentRecetas.querySelectorAll('a');
        allRecetas.forEach( (itemRecetas : HTMLElement) => {
            observer.observe(itemRecetas);
        });
    }

    if(contactFom){
        observer.observe(contactFom);
    }

    if(containerWidgetForm){
        observer.observe(containerWidgetForm);
    }

    if(imageReceta){
        observer.observe(imageReceta);
    }

    if(titleReceta){
        observer.observe(titleReceta);
    }

    if(tituloInstrucciones){
        observer.observe(tituloInstrucciones);
    }

    if(historyImage.length){
       
        historyImage.forEach(e=>{
            observer.observe(e);
        })

    }

    if(informationImage.length){
        informationImage.forEach(e=>{
            observer.observe(e);
        })
    }

    if(bienestarImage){
        observer.observe(bienestarImage);
    }

}

const observer = new IntersectionObserver(( entries : IntersectionObserverEntry[], observer : IntersectionObserver) => {

    entries.forEach( (entry : IntersectionObserverEntry) => {

        if(entry.isIntersecting){

            const element : Element = entry.target;
            element.classList.add('show');


        }

    })

}, { threshold: 0.5 });


export default scrollAnimation;