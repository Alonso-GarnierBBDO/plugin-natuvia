<?php

    // Add settings to plugin
    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'home-recipes'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' =>  array('title', 'editor'),
        'menu_icon' => 'dashicons-admin-home',
        'show_in_rest' => false,
        'rest_base' => 'home-recipes',
        'rest_namespace' => 'home-recipes',
        'register_meta_box_cb' => function () {
            // All arguments
            include plugin_dir_path(__FILE__) . 'boxs/formulario.php';
            // include plugin_dir_path(__FILE__) . 'boxs/second_section.php';
        }
    );