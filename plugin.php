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



// Inializamos el plugin

add_action('init', function(){
    // Principal settings
    include plugin_dir_path(__FILE__) . 'settings/labels.php';

    // All arguments
    include plugin_dir_path(__FILE__) . 'settings/arguments.php';

    register_post_type('resource_experience', $args);

});