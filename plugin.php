<?php

/*
* Plugin Name:       Recetas Natuvia By Garnier BBDO
* Plugin URI:        https://natuvia.co.cr/
* Description:       Administrador de recetas
* Version:           1.0.0
* Author:            Alonso Artavia
* Author URI:        https://garnierbbdo.com
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       Conocer más del plugin
*/

/** Inializamos el plugin*/
add_action('init', function(){

    /**
     * Esta es la seccion del home
     */

    // Principal settings
    include plugin_dir_path(__FILE__) . 'settings/home/labels.php';

    // All arguments
    include plugin_dir_path(__FILE__) . 'settings/home/arguments.php';

    register_post_type('recetas_home_page', $args);

    /**
     * Esta es la seccion de resetas
     */

    // All labels posts
    include plugin_dir_path(__FILE__) . 'settings/recetas-post/labels.php';

    // All arguments posts
    include plugin_dir_path(__FILE__) . 'settings/recetas-post/arguments.php';

    register_post_type('all_recetas', $args_posts);

});

// Asegurarse de que haya solo un único post de este tipo recetas_home_page
add_action('wp_loaded', 'ensure_single_custom_slider');

function ensure_single_custom_slider() {

    $existing_sliders = get_posts(array('post_type' => 'recetas_home_page', 'posts_per_page' => 1));

    if (empty($existing_sliders)) {
        $slider = array(
            'post_type' => 'recetas_home_page',
            'post_title' => 'Home Recipes',
            'post_status' => 'publish',
        );

        wp_insert_post($slider);


    }
}

// Ocultar la opción "Añadir Nuevo"
add_action('admin_menu', 'remove_add_new_menu_item');

function remove_add_new_menu_item() {
    
    global $menu;

    remove_submenu_page('edit.php?post_type=recetas_home_page', 'post-new.php?post_type=home');

    // Obtener el primer post del tipo 'recetas_home_page'
    $first_home_post = get_posts(array(
        'post_type'      => 'recetas_home_page',
        'posts_per_page' => 1,
    ));

    $first_post_id = 0;

    // Verificar si hay posts
    if ($first_home_post) {
        // Acceder al ID del primer post
        $first_post_id = $first_home_post[0]->ID;

    }

    // Encuentra el índice del menú que deseas cambiar
    foreach ($menu as $key => $item) {
        if ($item[2] == 'edit.php?post_type=recetas_home_page') {
            // Cambia el enlace del menú
            $menu[$key][2] = 'post.php?post=' . $first_post_id . '&action=edit';
            $menu[$key][4] = 'home-item wp-has-submenu wp-not-current-submenu menu-top menu-icon-slider';
            break;
        }
    }

}



/** Agregamos los estilos */
include plugin_dir_path(__FILE__) . 'functions.php';

/** Guardamos los items de los post */
include plugin_dir_path(__FILE__) . 'save.php';

/** Ejecutamos las paginas del plugin */
include plugin_dir_path(__FILE__) . 'settings/home/pages.php';

/** Guardamos variables */
include plugin_dir_path(__FILE__) . 'settings/home/query_vars.php';

/** Agregamos un query var para personalizar el HTML */
add_filter('query_vars', 'page_recetas_register_query_var');

/** Creamos la pagina al momento de activar el plugin*/
register_activation_hook(__FILE__, 'active_page_recetas');

/**  Esta funcion se ejecuta al desactivar el plugin */
register_deactivation_hook(__FILE__, 'deactivate_page_recetas');

/** Desactivamos al edicion de la pagina */
add_action('admin_init', 'disable_edit_page_recetas');

