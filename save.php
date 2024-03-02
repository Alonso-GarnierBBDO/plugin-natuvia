<?php

    // En este apartado guardamos el home de recetas

    add_action('save_post', 'save_application_home_recibes');

    function save_application_home_recibes($post_id){

        if (!isset($_POST['post_type']) || $_POST['post_type'] !== 'recetas_home_page') return $post_id;

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    
        if (!current_user_can('edit_post', $post_id))  return $post_id;


        // First Box

        update_post_meta($post_id, 'title', $_POST['title']);
        update_post_meta($post_id, 'content-formulario', $_POST['content-formulario']);

    }

    // En estas recetas guardamos todas las recetas

    add_action('save_post', 'save_applications_all_recibes');

    function save_applications_all_recibes($post_id){
        
        if (!isset($_POST['post_type']) || $_POST['post_type'] !== 'all_recetas') return $post_id;

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    
        if (!current_user_can('edit_post', $post_id))  return $post_id;

        update_post_meta($post_id, 'porciones', $_POST['porciones']);
        update_post_meta($post_id, 'ingredients', $_POST['ingredients']);
        update_post_meta($post_id, 'instrucciones', $_POST['instrucciones']);
        update_post_meta($post_id, 'dish', $_POST['dish']);

        // History

        update_post_meta($post_id, 'history-title', $_POST['history-title']);
        update_post_meta($post_id, 'history-image', $_POST['history-image']);
        update_post_meta($post_id, 'history-image-mobile', $_POST['history-image-mobile']);

        // Information

        update_post_meta($post_id, 'information-title', $_POST['information-title']);
        update_post_meta($post_id, 'information-image', $_POST['information-image']);
        update_post_meta($post_id, 'information-image-mobile', $_POST['information-image-mobile']);

        // Bienestar
        update_post_meta($post_id, 'bienestar-title', $_POST['bienestar-title']);
        update_post_meta($post_id, 'bienestar-sub-title', $_POST['bienestar-sub-title']);
        update_post_meta($post_id, 'beneficio_content', $_POST['beneficio_content']);
        update_post_meta($post_id, 'bienestar-image', $_POST['bienestar-image']);
        
    }