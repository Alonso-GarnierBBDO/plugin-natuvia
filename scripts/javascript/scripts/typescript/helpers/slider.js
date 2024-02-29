var htmlElementContent = null;
var number = 3;
var slider = function () {
    var getContentSlider = document.querySelectorAll('.slider');
    if (window.innerWidth >= 1025) {
        number = 4;
    }
    if (getContentSlider) {
        getContentSlider.forEach(function (e) {
            var getContent = e.querySelector('.content');
            var getControls = e.querySelector('.controls');
            if (getContent && getControls) {
                htmlElementContent = getContent.innerHTML;
                var items = htmlElementContent.trim().split('\n').filter(function (item) { return item.trim() !== ''; });
                var groupedItems = [];
                for (var i = 0; i < items.length; i += number) {
                    // Extraer 4 elementos por iteración
                    var chunk = items.slice(i, i + number);
                    // Si hay elementos en el chunk, agrúpalos
                    if (chunk.length) {
                        var group = "<section class=\"items\">\n ".concat(chunk.join('\n'), " \n</section>");
                        groupedItems.push(group);
                    }
                }
                // Unir todos los grupos en una sola cadena
                var resultString = groupedItems.join('\n');
                getContent.innerHTML = resultString;
                initSlider(getContent, getControls);
            }
        });
    }
};
var initSlider = function (getContent, getControls) {
    var allItems = getContent.querySelectorAll('.items');
    var prev = getControls.querySelector('.prev');
    var next = getControls.querySelector('.next');
    setSlider(getContent, allItems, '');
    if (prev && next) {
        prev.onclick = function () {
            if (setSlider(getContent, allItems, 'prev')) {
                next.disabled = true;
            }
        };
        next.onclick = function () {
            if (setSlider(getContent, allItems, 'next')) {
                next.disabled = true;
            }
        };
    }
};
var setSlider = function (getContent, allItems, next) {
    var intElement = 0;
    var disabledButton = false;
    allItems.forEach(function (e, key) {
        // Inicializamos el slider
        if (!next.length && key == 0) {
            e.classList.add('active');
        }
        else if (!next.length) {
            e.classList.add('right');
        }
        if (next.length) {
            nextElement(e, key, intElement, next);
            if (e.classList.contains('active')) {
                intElement = key;
                e.classList.remove('active');
                if (next == 'next') {
                    e.classList.add('left');
                    e.classList.remove('right');
                }
                else if (next == 'prev') {
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
};
var nextElement = function (e, key, intElement, type) {
    if (type == 'next') {
        if (key == (intElement + 1)) {
            e.classList.add('active');
            e.classList.remove('right');
            e.classList.remove('left');
            return key;
        }
    }
    else if (type == 'prev') {
        if (key == (intElement)) {
            e.classList.add('active');
            e.classList.remove('left');
            e.classList.remove('right');
            return key;
        }
    }
};
export default slider;
