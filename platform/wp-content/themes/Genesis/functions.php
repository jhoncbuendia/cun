<?php
add_theme_support( 'post-thumbnails' );

/**
* Register Menu
*/
function register_my_menu() {
  register_nav_menus(
  array(
    'menu-principal' => __( 'Menu principal' ),
    'menu-knowlege' => __( 'Líneas de conocimiento Home' ),
    'menu-knowlege-all' => __( 'Líneas de conocimiento' )
    )
  );
}
add_action( 'init', 'register_my_menu' );

/**
* Register our sidebars and widgetized areas.
*
*/
function widgetHome() {

  register_sidebar( array(
    'name'          => 'Home events',
    'id'            => 'home_events',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="title calendar">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'widgetHome' );

function widgetSocialNetwork() {

  register_sidebar( array(
    'name'          => 'Social Networks',
    'id'            => 'social_networks',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="title twitter">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'widgetSocialNetwork' );

function lastComments() {

  register_sidebar( array(
    'name'          => 'Last Comments',
    'id'            => 'last_comments',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="title comments">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'lastComments' );

function loginHome() {

  register_sidebar( array(
    'name'          => 'Login Home',
    'id'            => 'login_home',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="title login">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'loginHome' );

function onlineUsers() {

  register_sidebar( array(
    'name'          => 'Online Users',
    'id'            => 'online_users',
    'before_widget' => '<div class="row">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="title online">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'onlineUsers' );

function forumOrBlog() {

  register_sidebar( array(
    'name'          => 'Foro o Blog',
    'id'            => 'forum_blog',
    'before_widget' => '<div class="widget-forum">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="title blog">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'forumOrBlog' );

// Add styles to login page
function my_login_stylesheet() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

// Length Excerpt
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}


add_filter( 'rwmb_meta_boxes', 'linea_investigacion_register_meta_boxes' );
function linea_investigacion_register_meta_boxes( $meta_boxes ) {

  $meta_boxes[] = array(
    'id'         => 'personal',
    'title'      => __( 'Asesor de la Red', 'textdomain' ),
    'post_types' => array('linea_investigacion'),
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(
      array(
        'name'        => __( 'Asesor(a)', 'your-prefix' ),
        'id'          => 'asesor',
        'type'        => 'user',
        // 'clone'       => true,
        // 'multiple'    => true,
        // Field type, either 'select' or 'select_advanced' (default)
        'field_type'  => 'select_advanced',
        // Placeholder
        'placeholder' => __( 'Selecciona un Asesor', 'your-prefix' ),
        // Query arguments (optional). No settings means get all published users
        // @see https://codex.wordpress.org/Function_Reference/get_users
        'query_args'  => array(
          'role'         => 'asesor'
        ),
      ),
      )
    );

  return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'proyecto_register_meta_boxes' );
function proyecto_register_meta_boxes( $meta_boxes ) {

  $meta_boxes[] = array(
    'id'         => 'proyecto',
    'title'      => __( 'Contenido del Proyecto', 'textdomain' ),
    'post_types' => array('proyecto'),
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(
      array(
				'name'        => __( 'Post', 'your-prefix' ),
				'id'          => 'post',
				'type'        => 'post',
				// 'clone'       => true,
				// 'multiple'    => true,
				// Post type: string (for single post type) or array (for multiple post types)
				'post_type'   => array( 'linea_investigacion' ),
				// Default selected value (post ID)
				'std'         => 1,
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				// Placeholder
				'placeholder' => __( 'Select an Item', 'your-prefix' ),
				// Query arguments (optional). No settings means get all published posts
				// @see https://codex.wordpress.org/Class_Reference/WP_Query
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				),
			),
      array(
        'id'               => 'img_grupo',
        'name'             => __( 'Imágen grupo', 'your-prefix' ),
        'type'             => 'image_advanced',
        // Delete image from Media Library when remove it from post meta?
        // Note: it might affect other posts if you use same image for multiple posts
        'force_delete'     => true,
        // Maximum image uploads
        'max_file_uploads' => 1,
      ),
      array(
        'name'        => __( 'Municipio', 'your-prefix' ),
        'id'          => 'municipio',
        'type'        => 'text',
        // CLONES: Add to make the field cloneable (i.e. have multiple value)
        'clone'       => false,
        // Placeholder
        'placeholder' => __( 'Ingrese un Municipio', 'your-prefix' ),
        // Input size
        'size'        => 30,
        // Datalist
        'datalist'    => array(
          // Unique ID for datalist
          'id'      => 'text_datalist',
          // List of predefined options
        ),
      ),
      array(
        'name'        => __( 'Planteamiento del Problema', 'your-prefix' ),
        'id'          => 'pproblema',
        'type'        => 'textarea',
        // Default value (optional)
        // CLONES: Add to make the field cloneable (i.e. have multiple value)
        'clone'       => false,
        // Placeholder
        'placeholder' => __( 'Planteamiento del Problema', 'your-prefix' ),
        // Number of rows
        'rows'        => 5,
        // Number of columns
        'cols'        => 5,
      ),
      array(
				'name'        => __( 'Objetivos', 'your-prefix' ),
				'id'          => 'objetivos',
        'type'        => 'textarea',
        // Default value (optional)
        // CLONES: Add to make the field cloneable (i.e. have multiple value)
        'clone'       => true,
        // Number of rows
        'rows'        => 3,
        // Number of columns
        'cols'        => 5,
      ),
      array(
        'name'        => __( 'Metodologia', 'your-prefix' ),
        'id'          => 'metodologia',
        'type'        => 'textarea',
        // Default value (optional)
        // CLONES: Add to make the field cloneable (i.e. have multiple value)
        'clone'       => false,
        // Placeholder
        'placeholder' => __( 'Metodologia', 'your-prefix' ),
        // Number of rows
        'rows'        => 5,
        // Number of columns
        'cols'        => 5,
      ),
      array(
        'name'        => __( 'Resultados', 'your-prefix' ),
        'id'          => 'resultados',
        'type'        => 'textarea',
        // Default value (optional)
        // CLONES: Add to make the field cloneable (i.e. have multiple value)
        'clone'       => false,
        // Placeholder
        'placeholder' => __( 'Resultados', 'your-prefix' ),
        // Number of rows
        'rows'        => 5,
        // Number of columns
        'cols'        => 5,
      ),
      array(
        'name'        => __( 'Bibliografía', 'your-prefix' ),
        'id'          => 'bibliografia',
        'type'        => 'textarea',
        // Default value (optional)
        // CLONES: Add to make the field cloneable (i.e. have multiple value)
        'clone'       => false,
        // Placeholder
        'placeholder' => __( 'Bibliografía', 'your-prefix' ),
        // Number of rows
        'rows'        => 3,
        // Number of columns
        'cols'        => 5,
      ),
      array(
        'id'               => 'img_proyecto',
        'name'             => __( 'Imagenes del Proyecto', 'your-prefix' ),
        'type'             => 'image_advanced',
        // Delete image from Media Library when remove it from post meta?
        // Note: it might affect other posts if you use same image for multiple posts
        'force_delete'     => true,
        // Maximum image uploads
        'max_file_uploads' => 3,
      ),
      )
    );

    return $meta_boxes;
  }
  ?>
