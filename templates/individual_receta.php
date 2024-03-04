<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 

            $title = get_the_title();
            $thumbnail = get_the_post_thumbnail();
            $og_image = get_the_post_thumbnail_url();
            $excerpt = get_the_excerpt();
            $porciones = get_post_meta( get_the_ID(), 'porciones', true);
            $ingredientes = get_post_meta( get_the_ID(), 'ingredients', true);
            $instrucciones = get_post_meta( get_the_ID(), 'instrucciones', true);
            $title_history = get_post_meta( get_the_ID(), 'history-title', true);
            $img_history_mobile = get_post_meta( get_the_ID(), 'history-image-mobile', true);
            $images_mobile_history = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $img_history_mobile)));

            $img_history_escritorio = get_post_meta( get_the_ID(), 'history-image', true);
            $images_escritorio_history = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $img_history_escritorio)));


            $title_information = get_post_meta( get_the_ID(), 'information-title', true);
            $img_information_mobile = get_post_meta( get_the_ID(), 'information-image-mobile', true);
            $images_mobile_information = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $img_information_mobile)));

            $img_information_escritorio = get_post_meta( get_the_ID(), 'information-image', true);
            $images_escritorio_information = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $img_information_escritorio)));


            /** Bienestar variables */

            $img_bienestar = get_post_meta( get_the_ID(), 'bienestar-image', true);
            $images_bienestar = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $img_bienestar)));
            $title_bienestar = get_post_meta( get_the_ID(), 'bienestar-title', true);
            $sub_title_bienestar = get_post_meta( get_the_ID(), 'bienestar-sub-title', true);
            $content_bienestar = get_post_meta( get_the_ID(), 'beneficio_content', true);


            /** Header */
            include plugin_dir_path(__DIR__) . 'templates/components/header.php'; 

            /** Este es el archivo de la animacion de las hojas */
            include plugin_dir_path(__DIR__) . 'templates/components/leaves.php';

            /** Insertamos los ingredientes */
            include plugin_dir_path(__DIR__) . 'templates/recetas/ingredients.php';

            /** Agregamos la seccion de historia */
            include plugin_dir_path(__DIR__) . 'templates/recetas/historia.php';

            /** Agregamos la seccion de informacion */
            include plugin_dir_path(__DIR__) . 'templates/recetas/information.php';

            /** Agregamos la seccion de bienestar */
            include plugin_dir_path(__DIR__) . 'templates/recetas/bienestar.php';

            /** Agregamos la seccion de bienestar */
            include plugin_dir_path(__DIR__) . 'templates/recetas/comentarios.php';

            /** Footer */
            include plugin_dir_path(__DIR__) . 'templates/components/footer.php';

        }
    }

?>
