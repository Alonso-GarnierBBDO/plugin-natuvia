<?php
    
    // Configuramos los argumentos de la consulta
    $args = array(
        'post_type' => 'portafolio_recetas',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    // Realizamos la consulta
    $home_recetas = new WP_Query($args);
    
    // Iniciamizamos las variables
    $title; // Esta variable contiene el titulo del post
    $content; // Almacenamos el contenido del post

    if ($home_recetas->have_posts()) {
        while ($home_recetas->have_posts()) {
            $home_recetas->the_post();
            $title = get_the_title();
            $content = get_the_content();
            // $excert = get_the_excerpt();
            // $title_first = get_post_meta(get_the_ID(), 'title_first', true);
            // $content_first = get_post_meta(get_the_ID(), 'first_content', true);
            // $galery_first = get_post_meta(get_the_ID(), 'first_galery', true);
            // $array_galery = json_decode($galery_first, true);
            // $image_two = get_the_post_thumbnail();
            // $title_second = get_post_meta(get_the_ID(), 'title_second', true);
            // $content_second = get_post_meta(get_the_ID(), 'second_content', true);
            // $titlebutton = get_post_meta(get_the_ID(), 'titlebutton_secont', true);
            // $linkbutton = get_post_meta(get_the_ID(), 'buttonaction_secont', true);
            // $externalbutton = get_post_meta(get_the_ID(), 'buttonexternal_secont', true);

        }
    }

    /** Header */
    include plugin_dir_path(__DIR__) . 'templates/components/header.php'; 

    /** Este es el archivo de la animacion de las hojas */
    include plugin_dir_path(__DIR__) . 'templates/components/leaves.php';

    /** En este archivo contien todo el header de recetas */
    include plugin_dir_path(__DIR__) . 'templates/home/recetas.php';


    //Footer
    include plugin_dir_path(__DIR__) . 'templates/components/footer.php';

?>

