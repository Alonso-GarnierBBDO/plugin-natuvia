<?php

    // Add settings to plugin
    $args_posts = array(
        'labels' => $labels_posts,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portafolio-recetas'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' =>  array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-post-status',
        'show_in_rest' => false,
        'rest_base' => 'home-recipes-page',
        'rest_namespace' => 'home-recipes-page',
        'register_meta_box_cb' => function () {
            // All arguments
            include plugin_dir_path(__FILE__) . 'boxs/descriptions.php';
            include plugin_dir_path(__FILE__) . 'boxs/instructions.php';
            include plugin_dir_path(__FILE__) . 'boxs/dish.php';
            include plugin_dir_path(__FILE__) . 'boxs/history.php';
            include plugin_dir_path(__FILE__) . 'boxs/information.php';
            include plugin_dir_path(__FILE__) . 'boxs/bienestar.php';
        }
    );