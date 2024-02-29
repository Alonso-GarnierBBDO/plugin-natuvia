<?php

// Cargamos los estilos

function recetas_style() {

    global $wp_query;
    
    $pageName = $wp_query->query_vars['pagename'];

    if (isset($pageName) && $pageName == "portafolio-recetas") {
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

function custom_recetas( $page_template )
{
    if ( is_page( 'portafolio-recetas' ) ) {
        $page_recetas_template = dirname( __FILE__ ) . '/templates/custom-recetas.php';
    }
    return $page_recetas_template;
}

add_filter( 'page_template', 'custom_recetas' );


// Adjuntamos las configuraciones de imagenes

add_action('admin_enqueue_scripts', function () {

    $screen = get_current_screen();

    if ($screen->id === 'all_recetas') {
        wp_enqueue_media();
        wp_enqueue_script('image-slider-uploader', plugins_url('assets/js/preview_dish.js', __FILE__), []);
    }

    error_log(print_r(get_current_screen(), true));
});