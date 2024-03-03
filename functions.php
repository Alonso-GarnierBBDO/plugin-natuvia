<?php

/** Retornamos todos los items de comments */
include plugin_dir_path(__FILE__) . 'settings/admin/comments.php';

// Cargamos los estilos

function recetas_style() {

    global $wp_query;

    $pageName = get_post_type( $post );

    if (isset($pageName) && ($pageName == 'recetas_home_page' || $pageName == 'all_recetas')) {
        wp_enqueue_style('plugin-recetas-style', plugin_dir_url(__FILE__) . 'style/css/global.css');
    }
}

add_action('wp_enqueue_scripts', 'recetas_style');


// Cargamos los scripts de tipo modulo

function recetas_javascript_module($tag, $handle, $src){
    if ("script" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}

wp_register_script('script', plugin_dir_url(__FILE__) . 'scripts/javascript/scripts/typescript/global.js', '1.0');
wp_enqueue_script('script');
add_filter("script_loader_tag", "recetas_javascript_module", 10, 3);


function custom_archivo_file($template){

    
    if(is_post_type_archive('all_recetas')){

        $new_template = dirname( __FILE__ ) . '/templates/custom-recetas.php';

        if(file_exists($new_template)){
            return $new_template;
        }

    }

    return $template;

}

add_filter('template_include', 'custom_archivo_file', 99);


// Registramos el single de las recetas

function custom_single_file($template){


    if(is_singular('all_recetas')){

        $new_template = dirname( __FILE__ ) . '/templates/individual_receta.php';

        if(file_exists($new_template)){
            return $new_template;
        }

    }

    return $template;
}

add_filter('template_include', 'custom_single_file', 99);


// Adjuntamos las configuraciones de imagenes

add_action('admin_enqueue_scripts', function () {

    $screen = get_current_screen();

    if ($screen->id === 'all_recetas') {
        wp_enqueue_media();
        wp_enqueue_script('image-slider-uploader', plugins_url('assets/js/preview_dish.js', __FILE__), []);
    }

    error_log(print_r(get_current_screen(), true));
});


// Registramos el widget

function contact_form_widget() {
    register_sidebar( array(
        'name'          => 'Form Area',
        'id'            => 'form_area',
        'before_widget' => '<section class="contact">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="form-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'contact_form_widget' );



add_filter( 'manage_edit-comments_columns', 'rudr_add_comments_columns' );

function rudr_add_comments_columns( $my_cols ){
	
	$misha_columns = array(
		'm_comment_id' => 'ID',
		'm_parent_id' => 'Parent ID'
	);
	$my_cols = array_slice( $my_cols, 0, 3, true ) + $misha_columns + array_slice( $my_cols, 3, NULL, true );

	return $my_cols;
}

add_action( 'manage_comments_custom_column', 'rudr_add_comment_columns_content', 10, 2 );

function rudr_add_comment_columns_content( $column, $comment_ID ) {
	global $comment;
	switch ( $column ) :
		case 'm_comment_id' : {
			echo $comment_ID; // or echo $comment->comment_ID;
			break;
		}
		case 'm_parent_id' : {
			// try to print_r( $comment ); to see more comment information
			echo $comment->comment_parent; // this will be printed inside the column
			break;
		}
	endswitch;
}

/** Agregamos los metaboxs en el adminitrador de los comentarios */

function custom_comments_meta_box(){
    add_meta_box('my-custom-comment', 'Otra información', 'custom_comment_meta_box_cb', 'comment', 'normal', 'high');
}


add_filter( 'add_meta_boxes_comment', 'custom_comments_meta_box');

function custom_comment_meta_box_cb($comment) {
    $last_name = get_comment_meta($comment->comment_ID, 'last_name', true);
    $review = get_comment_meta($comment->comment_ID, 'review', true);
    echo commentsItems($last_name, $review);
}

/** Guardamos los items del nuevo comentarios */

function save_comment($comment_id){

    $name = $_POST['author'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $review = $_POST['review'];


    if(isset($name) && isset($last_name) && isset($email) && isset($comment) && isset($review)){
        add_comment_meta( $comment_id, 'last_name', $last_name);
        add_comment_meta( $comment_id, 'review', $review);
    } 
}

add_action('comment_post', 'save_comment');