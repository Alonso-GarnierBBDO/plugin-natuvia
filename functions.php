<?php

function recetas_style() {

    global $wp_query;
    
    $pageName = $wp_query->query_vars['pagename'];

    if (isset($pageName) && $pageName == "portafolio-recetas") {
        wp_enqueue_style('plugin-recetas-style', plugin_dir_url(__FILE__) . 'style/css/global.css');
        wp_enqueue_script('plugin-recetas-scripts', plugin_dir_url(__FILE__) . 'scripts/javascript/scripts/typescript/global.js', array(), false, true);
    }
}

add_action('wp_enqueue_scripts', 'recetas_style');

function custom_recetas( $page_template )
{
    if ( is_page( 'portafolio-recetas' ) ) {
        $page_recetas_template = dirname( __FILE__ ) . '/templates/custom-recetas.php';
    }
    return $page_recetas_template;
}

add_filter( 'page_template', 'custom_recetas' );