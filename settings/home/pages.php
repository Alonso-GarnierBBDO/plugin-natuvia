<?php

/**
 * En esta seccion ejecutamos la paginas segun el comportamimento del plugin
 * - Si el plugin esta activo agregamos la pagina principal de recetas
 * - Si el plugin esta desactivaddo eliminamos la pagina principal de recetas
 */


/** Agregamos la pagina principal de recetas */
function active_page_recetas() {
    
    $post_data = [
        'post_title'   => 'Portafolio de Resetas',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_name'    => 'natu-facts', // URL de la pagina
        'page_template'  => 'template-blog.php'
    ];

    // Verificar si la página ya existe
    $page = get_page_by_path('natu-facts', OBJECT, 'page');

    if (!$page) {
        // La página no existe, insertarla
        wp_insert_post($post_data);
    }

}


/** Esta funcion elimina la pagina principal al momento de desactivar el plugin */
function deactivate_page_recetas() {

    // Obtemos la pagina por medio de la url
    $page = get_page_by_path('natu-facts', OBJECT, 'page');

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
        $slug = 'natu-facts'; // El slug de tu página

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
