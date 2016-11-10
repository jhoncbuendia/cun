<?php
add_theme_support( 'post-thumbnails' );

//require_once('wp-content/plugins/wp-advanced-search-master/wpas.php');

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

function Breadcrumb() {

  register_sidebar( array(
    'name'          => 'Breadcrumb',
    'id'            => 'breadcrumb',
    'before_widget' => '<div class="widget-readcrumb">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="title readcrumb">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'Breadcrumb' );

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
          'role'         => 'asesor_de_linea'
        ),
      ),
      )
    );

    return $meta_boxes;
  }

  add_filter( 'rwmb_meta_boxes', 'proyecto_register_meta_boxes' );
  function proyecto_register_meta_boxes( $meta_boxes ) {

    $meta_boxes[] =
    array(
      'id'         => 'proyecto',
      'title'      => __( 'Contenido del Proyecto', 'textdomain' ),
      'post_types' => array('proyecto'),
      'context'    => 'normal',
      'priority'   => 'high',
      'fields' =>
      array(
        array(
          'name'        => __( 'Linea Investigacion', 'your-prefix' ),
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
          'name'        => __( 'Institución Educativa', 'your-prefix' ),
          'id'          => 'iEducativa',
          'type'        => 'text',
          // CLONES: Add to make the field cloneable (i.e. have multiple value)
          'clone'       => false,
          // Placeholder
          'size'        => 30,
          // Datalist
          'datalist'    => array(
            // Unique ID for datalist
            'id'      => 'text_datalist',
            // List of predefined options
          ),
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
          'clone'       => true,
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
          'clone'       => true,
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
          'clone'       => true,
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
          'max_file_uploads' => 5,
        ),
        array(
          'id'    => 'oembed',
          'name'  => __( 'URL Video del Proyecto', 'your-prefix' ),
          'type'  => 'oembed',
          // Allow to clone? Default is false
          'clone' => false,
          // Input size
          'size'  => 30,
        ),
        )
      );

      return $meta_boxes;
    }

    add_filter( 'rwmb_meta_boxes', 'sproyecto_register_meta_boxes' );
    function sproyecto_register_meta_boxes( $meta_boxes ) {

      $meta_boxes[] =
      array(
        'id'         => 'sproyecto',
        'title'      => __( 'Contenido del Proyecto', 'textdomain' ),
        'post_types' => array('proyecto'),
        'context'    => 'side',
        'priority'   => 'low',
        'fields' =>
        array(
          array(
            'name'        => __( 'Nombre del Grupo', 'your-prefix' ),
            'id'          => 'nmgrupo',
            'type'        => 'text',
            // CLONES: Add to make the field cloneable (i.e. have multiple value)
            'clone'       => false,
            // Placeholder
            'placeholder' => __( 'Ingrese el Nombre del Grupo', 'your-prefix' ),
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
            'name'        => __( 'Docente', 'your-prefix' ),
            'id'          => 'docente',
            'type'        => 'text',
            // CLONES: Add to make the field cloneable (i.e. have multiple value)
            'clone'       => true,
            // Placeholder
            'placeholder' => __( 'Ingrese el Nombre del Docente', 'your-prefix' ),
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
            'id'               => 'foto_docente',
            'name'             => __( 'Foto del Docente', 'your-prefix' ),
            'type'             => 'image_advanced',
            // Delete image from Media Library when remove it from post meta?
            // Note: it might affect other posts if you use same image for multiple posts
            'force_delete'     => true,
            // Maximum image uploads
            'max_file_uploads' => 1,
          ),
          array(
            'name'        => __( 'Alumnos', 'your-prefix' ),
            'id'          => 'alumnos',
            'type'        => 'text',
            // CLONES: Add to make the field cloneable (i.e. have multiple value)
            'clone'       => true,
            // Placeholder
            'placeholder' => __( 'Alumno', 'your-prefix' ),
            // Input size
            'size'        => 30,
            // Datalist
            'datalist'    => array(
              // Unique ID for datalist
              'id'      => 'text_datalist',
              // List of predefined options
            ),
          ),
          )
        );

        return $meta_boxes;
      }

      add_shortcode('wpbsearch', 'get_search_form');

      function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

      function my_search_form() {
        $args = array();
        // Set default WP_Query
        $args['wp_query'] = array( 'post_type' => array('proyecto'),
        'orderby' => 'title',
        'order' => 'ASC' );

        $argsC = array(
          'post_type'   => 'linea_investigacion',
          'numberposts' => -1
        );

        $categorias = get_posts( $argsC );
        foreach ($categorias as $key => $value) {
          $tempid = $value->ID;
          $temptitle = $value->post_title;
          //array_push($arrayName, array( $tempid => $temptitle));
          $offerArray[$tempid] = $temptitle;
        }



        $args['fields'][] = array( 'type' => 'meta_key',
        'label' => 'Categoria',
        'format' => 'select', 'meta_key' => 'post',
        'values' => $offerArray
      );


      $args['fields'][] = array( 'type' => 'date',
      'label' => 'Fecha de Publicación', 'date_type' => 'day', 'format' => 'date');

      // Configure form fields
      $args['fields'][] = array( 'type' => 'search',
      'label' => 'Titulo Proyecto', 'compare' => 'LIKE');

      $args['fields'][] = array( 'type' => 'meta_key',
      'label' => 'Participantes',
      'format' => 'text', 'meta_key' => 'alumnos',
      'values' => array(), 'compare' => 'LIKE');

      $args['fields'][] = array( 'type' => 'submit',
      'class' => 'button',
      'value' => 'Search' );

      register_wpas_form('myform', $args);
    }
    add_action('init','my_search_form');

    function basicSearch() {
      $args = array();
      // Set default WP_Query
      $args['wp_query'] = array( 'post_type' => array('proyecto'),
      'orderby' => 'title',
      'order' => 'ASC' );

      $args['meta_key_relation'] = array(
        'relation' => 'OR', // Optional, defaults to "AND"
        array(
          'key'     => '_my_custom_key',
          'value'   => 'Value I am looking for',
          'compare' => '='
        ));

        // Configure form fields
        $args['fields'][] = array( 'type' => 'search',
        'label' => 'Titulo Proyecto', 'compare' => 'LIKE');


        $args['fields'][] = array( 'type' => 'submit',
        'class' => 'button',
        'value' => 'Search' );

        register_wpas_form('bform', $args);
      }
      add_action('init','basicSearch');

      ?>
