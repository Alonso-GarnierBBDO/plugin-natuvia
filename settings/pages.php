<?php

/**
 * En esta seccion ejecutamos la paginas segun el comportamimento del plugin
 * - Si el plugin esta activo agregamos la pagina principal de recetas
 * - Si el plugin esta desactivaddo eliminamos la pagina principal de recetas
 */


/** Agregamos la pagina principal de recetas */
function active_page_recetas() {
    
    $post_data = [
        'post_title'   => 'My Page Title',
        'post_content' => '<p>Page content</p>',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_name'    => 'nuevas-recetas', // URL de la pagina
    ];

    // Verificar si la página ya existe
    $page = get_page_by_path('nuevas-recetas', OBJECT, 'page');

    if (!$page) {
        // La página no existe, insertarla
        wp_insert_post($post_data);
    }

}


/** Esta funcion elimina la pagina principal al momento de desactivar el plugin */
function deactivate_page_recetas() {

    // Obtemos la pagina por medio de la url
    $page = get_page_by_path('nuevas-recetas', OBJECT, 'page');

    if ($page) {
        // Elimina la página
        wp_delete_post($page->ID, true);
    }
}


/** Desactivamos la edicion de la pagina */

function disable_edit_page_recetas(){

    global $pagenow;

    // Verifica si estamos en la página de edición de posts y obtén el ID actual
    if ('post.php' === $pagenow && isset($_GET['post'])) {
        $post_id = $_GET['post'];
        $slug = 'nuevas-recetas'; // El slug de tu página

        $post = get_post($post_id);
        if ($post && $post->post_name === $slug) {
            // Desactiva el editor
            remove_post_type_support('page', 'editor');

            // Opcional: redirige si alguien intenta acceder directamente a la página de edición
            wp_redirect(admin_url());
            
            exit;
        }
    }
}


/** Insertamos el contenido personalizado en la pagina web */

function page_recetas_template_redirect() {

    global $wp_query;
    
    $pageName = $wp_query->query_vars['pagename'];

    if (isset($pageName) && $pageName == "nuevas-recetas") {

        $template_path = plugin_dir_path(__FILE__) . '../templates/custom-recetas.php';

        if (file_exists($template_path)) {

            include $template_path;
            exit; 
        }

    }
}
