var forms = function () {
    var name = document.querySelector('input[name="author"],input[name="name"]');
    var last_name = document.querySelector('input[name="last_name"]');
    var email = document.querySelector('input[name="email"]');
    var localName = localStorage.getItem('name');
    var localLastName = localStorage.getItem('last_name');
    var localEmail = localStorage.getItem('email');
    var modal = document.querySelector('.successfull_message');
    var contentModal = null;
    var buttonsClose = [];
    if (name) {
        if (localName) {
            name.value = localName;
        }
        name.oninput = function () {
            localStorage.setItem('name', name.value);
        };
    }
    if (last_name) {
        if (localLastName) {
            last_name.value = localLastName;
        }
        last_name.oninput = function () {
            localStorage.setItem('last_name', last_name.value);
        };
    }
    if (email) {
        if (localEmail) {
            email.value = localEmail;
        }
        email.oninput = function () {
            localStorage.setItem('email', email.value);
        };
    }
    /** Mostramos el mensaje del comentarios enviado */
    var hash = window.location.hash;
    if (hash.startsWith('#comment-')) {
        if (modal) {
            buttonsClose = modal.querySelectorAll('.close, .button_close');
            contentModal = modal.querySelector('.content');
            modal.classList.add('show');
            hiddenScroll('hidden');
            if (contentModal && buttonsClose.length) {
                contentModal.onclick = function (e) {
                    e.stopPropagation();
                };
                modal.onclick = function () {
                    hiddenModalClass(modal);
                    hiddenScroll('initial');
                };
                buttonsClose.forEach(function (e) {
                    e.onclick = function () {
                        hiddenModalClass(modal);
                        hiddenScroll('initial');
                    };
                });
            }
        }
    }
};
var hiddenScroll = function (overflow) {
    document.body.style.overflow = overflow;
};
var hiddenModalClass = function (modal) {
    modal.classList.add('remove');
    setTimeout(function () {
        modal.remove();
    }, 400);
};
export default forms;
