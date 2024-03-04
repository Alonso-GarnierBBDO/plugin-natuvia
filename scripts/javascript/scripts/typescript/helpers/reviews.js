var review = function () {
    var cucharasContainer = document.querySelector('.cucharas');
    var inputReview = document.querySelector('.comment-form-review input');
    var cucharasItems = [];
    var formComments = document.querySelector('.comment-form');
    var buttonSubmit = null;
    if (cucharasContainer && inputReview && formComments) {
        cucharasItems = cucharasContainer.querySelectorAll('div');
        buttonSubmit = formComments.querySelector('.submit');
        formComments.onsubmit = function () {
            setTimeout(function () {
                if (buttonSubmit) {
                    buttonSubmit.disabled = true;
                    buttonSubmit.value = 'Enviando';
                }
            }, 100);
        };
        /** Aqui validamos los enventos del fomulario */
        if (cucharasItems) {
            cucharasItems.forEach(function (e, key) {
                e.onmouseover = function () {
                    for (var i = key; i >= 0; i--) {
                        cucharasItems[i].classList.add('hover');
                    }
                };
                e.onmouseout = function () {
                    for (var i = key; i >= 0; i--) {
                        cucharasItems[i].classList.remove('hover');
                    }
                };
                e.onclick = function () {
                    for (var i = (cucharasItems.length - 1); i >= 0; i--) {
                        cucharasItems[i].classList.remove('active');
                    }
                    for (var i = key; i >= 0; i--) {
                        cucharasItems[i].classList.add('active');
                    }
                    inputReview.value = "".concat(key + 1);
                };
            });
        }
    }
};
export default review;
