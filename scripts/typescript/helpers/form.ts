

const forms = () => {

    const name : HTMLInputElement | null = document.querySelector('input[name="author"],input[name="name"]');
    const last_name : HTMLInputElement | null = document.querySelector('input[name="last_name"]');
    const email : HTMLInputElement | null = document.querySelector('input[name="email"]');
    const localName : string | null = localStorage.getItem('name');
    const localLastName : string | null = localStorage.getItem('last_name');
    const localEmail : string | null = localStorage.getItem('email');
    const modal : HTMLElement | null = document.querySelector('.successfull_message');
    let contentModal : HTMLElement | null = null;
    let buttonsClose : NodeListOf<HTMLButtonElement> | never[] = [];

    if(name){
        
        if(localName){
            name.value = localName;
        }

        name.oninput = () => {
            localStorage.setItem('name', name.value);
        }

    }

    if(last_name){
        
        if(localLastName){
            last_name.value = localLastName;
        }

        last_name.oninput = () => {
            localStorage.setItem('last_name', last_name.value);
        }

    }

    if(email){

        if(localEmail){
            email.value = localEmail;
        }
        
        email.oninput = () => {
            localStorage.setItem('email', email.value);
        }

    }

    /** Mostramos el mensaje del comentarios enviado */

    const hash = window.location.hash;

    if(hash.startsWith('#comment-')) {
        
        if(modal){

            buttonsClose = modal.querySelectorAll('.close, .button_close');
            contentModal = modal.querySelector('.content');

            modal.classList.add('show');
            hiddenScroll('hidden')

            if(contentModal && buttonsClose.length){

                contentModal.onclick = (e : MouseEvent) => {
                    e.stopPropagation();
                }

                modal.onclick = () => {
                    hiddenModalClass(modal)
                    hiddenScroll('initial')
                }

                buttonsClose.forEach((e : HTMLButtonElement) => {

                    e.onclick = () => {
    
                        hiddenModalClass(modal);
                        hiddenScroll('initial')
    
                    }
    
                })

            }


        }

    }

}

const hiddenScroll = (overflow : string) => {
    document.body.style.overflow = overflow;
}

const hiddenModalClass = (modal : HTMLElement) => {
    modal.classList.add('remove');

    setTimeout(()=>{
        modal.remove();
    }, 400);

}

export default forms;