

const review = () => {

    const cucharasContainer : HTMLElement | null = document.querySelector('.cucharas');
    const inputReview : HTMLInputElement | null = document.querySelector('.comment-form-review input');
    let cucharasItems : NodeListOf<HTMLElement> | never[] = [];
    let formComments : HTMLFormElement | null = document.querySelector('.comment-form');
    let  buttonSubmit : HTMLInputElement | null = null;

    if(cucharasContainer && inputReview && formComments){

        cucharasItems = cucharasContainer.querySelectorAll('div');
        buttonSubmit = formComments.querySelector('.submit');

        formComments.onsubmit = () => {
            setTimeout(()=>{
                if(buttonSubmit){
                    buttonSubmit.disabled = true;
                    buttonSubmit.value = 'Enviando';
                }
            }, 100);
        }

        /** Aqui validamos los enventos del fomulario */

        if(cucharasItems){

            cucharasItems.forEach(( e: HTMLElement, key: number )=>{

                e.onmouseover = () => {

                    for(let i = key; i >= 0; i--){
                        cucharasItems[i].classList.add('hover');
                    }

                }

                e.onmouseout = () => {
                    for(let i = key; i >= 0; i--){
                        cucharasItems[i].classList.remove('hover');
                    }
                }

                e.onclick = () => {

                    for(let i = (cucharasItems.length - 1); i >= 0; i--){
                        cucharasItems[i].classList.remove('active');
                    }

                    for(let i = key; i >= 0; i--){
                        cucharasItems[i].classList.add('active');
                    }

                    inputReview.value = `${key + 1}`;

                }

            });

        }

    }

}

export default review;