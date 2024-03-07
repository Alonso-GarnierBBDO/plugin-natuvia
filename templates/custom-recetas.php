<?php

        
    // Configuramos los argumentos de la consulta
    $args = array(
        'post_type' => 'recetas_home_page',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    // Realizamos la consulta
    $home_recetas = new WP_Query($args);
    
    // Iniciamizamos las variables
    $title; // Esta variable contiene el titulo del post
    $content; // Almacenamos el contenido del post
    $title_contact; // Almacenamos el contenido del title
    $video;
    $text_content;
    $excerpt;

    $baseURL = plugin_dir_url(__DIR__);
    $resetPath = str_replace('templates/', '', $baseURL);
    $og_image =  $resetPath . 'assets/img/natuvia-logo.png';

    if ($home_recetas->have_posts()) {
        while ($home_recetas->have_posts()) {
            $home_recetas->the_post();
            $title = get_the_title();
            $content = get_the_content();
            $title_contact = get_post_meta(get_the_ID(), 'title', true);
            $video = wp_get_attachment_url(get_post_meta(get_the_ID(), 'video', true));
            $text_content = get_post_meta(get_the_ID(), 'content-formulario', true);
            $excerpt = get_the_excerpt();
        }
    }


    /** Header */
    include plugin_dir_path(__DIR__) . 'templates/components/header.php'; 

    /** Este es el archivo de la animacion de las hojas */
    /**include plugin_dir_path(__DIR__) . 'templates/components/leaves.php';/

    /** En este archivo contien todo el header de recetas */
    include plugin_dir_path(__DIR__) . 'templates/home/recetas.php';

    /** Aqui se muestran las secciones del home contacto */
    include plugin_dir_path(__DIR__) . 'templates/home/contact.php';

    comments_template();

    //Footer
    include plugin_dir_path(__DIR__) . 'templates/components/footer.php';

?>

