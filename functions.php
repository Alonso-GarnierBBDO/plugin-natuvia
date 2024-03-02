<?php

// Cargamos los estilos

function recetas_style() {

    global $wp_query;

    $pageName = get_post_type( $post );

    if (isset($pageName) && ($pageName == 'recetas_home_page' || $pageName == 'all_recetas')) {
        wp_enqueue_style('plugin-recetas-style', plugin_dir_url(__FILE__) . 'style/css/global.css');
    }
}

add_action('wp_enqueue_scripts', 'recetas_style');


// Cargamos los scripts de tipo modulo

function recetas_javascript_module($tag, $handle, $src){
    if ("script" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}

wp_register_script('script', plugin_dir_url(__FILE__) . 'scripts/javascript/scripts/typescript/global.js', '1.0');
wp_enqueue_script('script');
add_filter("script_loader_tag", "recetas_javascript_module", 10, 3);


/** Registar una pagina */
// function custom_recetas( $page_template )
// {
//     if ( is_page( 'recetas-portafolio' ) ) {
//         $page_recetas_template = dirname( __FILE__ ) . '/templates/custom-recetas.php';
//     }
//     return $page_recetas_template;
// }

// add_filter( 'page_template', 'custom_recetas' );

/** Registrar una archivo.php para el post type */

function custom_archivo_file($template){

    
    if(is_post_type_archive('all_recetas')){

        $new_template = dirname( __FILE__ ) . '/templates/custom-recetas.php';

        if(file_exists($new_template)){
            return $new_template;
        }

    }

    return $template;

}

add_filter('template_include', 'custom_archivo_file', 99);


// Registramos el single de las recetas

function custom_single_file($template){


    if(is_singular('all_recetas')){

        $new_template = dirname( __FILE__ ) . '/templates/individual_receta.php';

        if(file_exists($new_template)){
            return $new_template;
        }

    }

    return $template;
}

add_filter('template_include', 'custom_single_file', 99);


// Adjuntamos las configuraciones de imagenes

add_action('admin_enqueue_scripts', function () {

    $screen = get_current_screen();

    if ($screen->id === 'all_recetas') {
        wp_enqueue_media();
        wp_enqueue_script('image-slider-uploader', plugins_url('assets/js/preview_dish.js', __FILE__), []);
    }

    error_log(print_r(get_current_screen(), true));
});


// Registramos el widget

function contact_form_widget() {
    register_sidebar( array(
        'name'          => 'Form Area',
        'id'            => 'form_area',
        'before_widget' => '<section class="contact">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="form-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'contact_form_widget' );

