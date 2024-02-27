<?php

/*
* Plugin Name:       Natuvia recetas
* Plugin URI:        https://natuvia.co.cr/
* Description:       Administrador de recetas
* Version:           1.0.0
* Requires at least: 5.2
* Author:            Alonso Artavia
* Author URI:        https://garnierbbdo.com
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       Conocer más del plugin
*/



/** Inializamos el plugin*/
add_action('init', function(){
    // Principal settings
    include plugin_dir_path(__FILE__) . 'settings/labels.php';

    // All arguments
    include plugin_dir_path(__FILE__) . 'settings/arguments.php';

    register_post_type('resource_experience', $args);

});


/** Ejecutamos las paginas del plugin */
include plugin_dir_path(__FILE__) . 'settings/pages.php';
include plugin_dir_path(__FILE__) . 'settings/query_vars.php';

/** Agregamos los estilos */
include plugin_dir_path(__FILE__) . 'functions.php';

/** Agregamos un query var para personalizar el HTML */
add_filter('query_vars', 'page_recetas_register_query_var');

/** Creamos la pagina al momento de activar el plugin*/
register_activation_hook(__FILE__, 'active_page_recetas');

/**  Esta funcion se ejecuta al desactivar el plugin */
register_deactivation_hook(__FILE__, 'deactivate_page_recetas');

/** Desactivamos al edicion de la pagina */
add_action('admin_init', 'disable_edit_page_recetas');

/** Agregamos el nuevo template en recetas */
add_action('template_redirect', 'page_recetas_template_redirect');




