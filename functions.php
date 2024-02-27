<?php

function recetas_style() {

    global $wp_query;
    
    $pageName = $wp_query->query_vars['pagename'];

    if (isset($pageName) && $pageName == "nuevas-recetas") {
        wp_enqueue_style('plugin-recetas-style', plugin_dir_url(__FILE__) . 'style/css/global.css');
    }
}

add_action('wp_enqueue_scripts', 'recetas_style');