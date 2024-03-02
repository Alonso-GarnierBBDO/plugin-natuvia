var htmlElementContent = null;
var number = 3;
var newHTMLElementContent = '';
var getContentSlider = null;
var getContent = null;
var getControls = null;
var setItems = function () {
    // Obtenemos los items del array
    getContentSlider = document.querySelectorAll('.slider');
    if (getContentSlider) {
        getContentSlider.forEach(function (e) {
            getContent = e.querySelector('.content');
            getControls = e.querySelector('.controls');
            var firstChild = getContent.children[0];
            if (firstChild) {
                var heightItems = firstChild.offsetHeight + 80;
                getContent.style.height = "".concat(heightItems, "px");
            }
            if (getContent && getControls) {
                htmlElementContent = getContent.children;
            }
        });
    }
};
var slider = function () {
    if (window.innerWidth >= 1025) {
        number = 4;
    }
    else {
        number = 3;
    }
    if (getContentSlider && getContent) {
        if (htmlElementContent === null || htmlElementContent === void 0 ? void 0 : htmlElementContent.length) {
            var convertHTMLElement = Array.from(htmlElementContent);
            var _loop_1 = function () {
                var encapsulateElement = convertHTMLElement.slice(0, number);
                var convertHTML = encapsulateElement.map(function (element) { return element.outerHTML; });
                var htmlString = '';
                // // Agregamos la nueva clase
                convertHTML.unshift("<section class=\"items ".concat(!(newHTMLElementContent === null || newHTMLElementContent === void 0 ? void 0 : newHTMLElementContent.length) ? 'active' : 'right', "\">"));
                convertHTML.push('</section>');
                convertHTML.forEach(function (e) {
                    htmlString += e;
                });
                if (htmlString.length) {
                    newHTMLElementContent += htmlString;
                }
                // Removemos los items del Array
                convertHTMLElement.splice(0, number);
            };
            do {
                _loop_1();
            } while (convertHTMLElement.length);
            if (newHTMLElementContent) {
                getContent.innerHTML = newHTMLElementContent;
            }
        }
    }
};
var initSlider = function () {
    if (getControls && getContent) {
        var prev_1 = getControls.querySelector('.prev');
        var next_1 = getControls.querySelector('.next');
        if (prev_1 && next_1) {
            prev_1.onclick = function () {
                next_1.disabled = false;
                if (runSlider('prev')) {
                    prev_1.disabled = true;
                }
            };
            next_1.onclick = function () {
                prev_1.disabled = false;
                if (runSlider('next')) {
                    next_1.disabled = true;
                }
            };
        }
    }
};
var runSlider = function (type) {
    var disabled = false;
    if (getContentSlider) {
        getContentSlider.forEach(function (e, key) {
            var allItems = e.querySelectorAll('.items');
            var allItemsArray = Array.from(allItems);
            var itemBrother = null;
            if (allItems.length > 1) {
                allItemsArray.some(function (item, key) {
                    if (item.classList.contains('active')) {
                        if (type == 'next') {
                            itemBrother = item.nextElementSibling;
                            if (key == (allItemsArray.length - 2)) {
                                disabled = true;
                            }
                            if (itemBrother) {
                                item.classList.add('left');
                                item.classList.remove('active');
                                itemBrother === null || itemBrother === void 0 ? void 0 : itemBrother.classList.add('active');
                                itemBrother === null || itemBrother === void 0 ? void 0 : itemBrother.classList.remove('right');
                                return true;
                            }
                        }
                        else if (type == 'prev') {
                            itemBrother = item.previousElementSibling;
                            if (key == 1) {
                                disabled = true;
                            }
                            if (itemBrother) {
                                item.classList.add('right');
                                item.classList.remove('active');
                                itemBrother === null || itemBrother === void 0 ? void 0 : itemBrother.classList.add('active');
                                itemBrother === null || itemBrother === void 0 ? void 0 : itemBrother.classList.remove('left');
                                return true;
                            }
                        }
                    }
                });
            }
            else {
                disabled = true;
            }
        });
    }
    return disabled;
};
export { slider, setItems, initSlider };
