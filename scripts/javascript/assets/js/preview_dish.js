"use strict";
window.addEventListener('DOMContentLoaded', function () {
    var getInputHiddenImage = document.querySelectorAll('.wp_image');
    getInputHiddenImage.forEach(function (e) {
        var viewImage = e.querySelector('.upload_image');
        var previewImage = e.querySelector('.preview');
        var hiddenURLImage = e.querySelector('.image_url');
        var resetImage = e.querySelector('.reset_image');
        var frame = new wp.media({
            title: 'Select images',
            library: {
                type: 'image',
            },
            button: {
                text: 'Select'
            }
        });
        if (viewImage && resetImage) {
            viewImage.onclick = function () {
                frame.open();
            };
            previewImage.onclick = function () {
                frame.open();
            };
            resetImage.onclick = function () {
                hiddenURLImage.value = '';
                previewImage.innerHTML = '';
            };
        }
        frame.on('select', function () {
            var attachment = frame.state().get('selection');
            var ids = [];
            var images = [];
            attachment.toJSON().forEach(function (image) {
                ids.push(image.id);
                images.push("<img src=\"".concat(image.url, "\">"));
            });
            hiddenURLImage.value = ids.join(',');
            previewImage.innerHTML = images.join('');
        });
    });
});
// jQuery(document).ready(function ($) {
//     // Image dish
//     const $field = $('[data-target=field]');
//     const $preview = $('[data-target=preview]');
//     //History image
//     const $history_field = $('[data-target=history_field]');
//     const $history_preview = $('[data-target=history_preview]');
//     const frame = new wp.media({
//         title: 'Select images',
//         library: {
//             type: 'image',
//         },
//         button: {
//             text: 'Select'
//         }
//     });
//     $(document)
//         .on('click', '[data-target=upload]', function () {
//             frame.open();
//         })
//         .on('click', '[data-target=reset]', function () {
//             $field.val('');
//             $preview.html('');
//         });
//     $(document)
//         .on('click', '[data-target=history_upload]', function () {
//             frame.open();
//         })
//         .on('click', '[data-target=history_reset]', function () {
//             $field.val('');
//             $preview.html('');
//         });
//     frame.on('select', function () {
//         var attachment = frame.state().get('selection');
//         const ids = [];
//         const images = [];
//         attachment.toJSON().forEach(image => {
//             ids.push(image.id);
//             images.push(`<img src="${image.url}">`);
//         });
//         $field.val(ids.join(','));
//         $preview.html(images.join(''));
//         $history_field.val(ids.join(','));
//         $history_preview.html(images.join(''));
//     });
// });
