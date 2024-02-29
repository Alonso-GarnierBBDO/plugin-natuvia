

window.addEventListener('DOMContentLoaded', () => {

    const getInputHiddenImage = document.querySelectorAll('.wp_image');

    getInputHiddenImage.forEach( e => {
        
        const viewImage = e.querySelector('.upload_image');
        const previewImage = e.querySelector('.preview');
        const hiddenURLImage = e.querySelector('.image_url');
        const resetImage = e.querySelector('.reset_image');

        const frame = new wp.media({
            title: 'Select images',
            library: {
                type: 'image',
            },
            button: {
                text: 'Select'
            }
        });

        if(viewImage && resetImage){

            viewImage.onclick = () => {
                frame.open();
            }

            previewImage.onclick = () => {
                frame.open();
            }

            resetImage.onclick = () => {
                hiddenURLImage.value = '';
                previewImage.innerHTML = '';
            }

        }

        frame.on('select', function () {

            var attachment = frame.state().get('selection');
    
            const ids = [];
            const images = [];
    
            attachment.toJSON().forEach(image => {
                ids.push(image.id);
                images.push(`<img src="${image.url}">`);
            });
    
            hiddenURLImage.value = ids.join(',');
            previewImage.innerHTML = images.join('');
    
        });


    }); 

})


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