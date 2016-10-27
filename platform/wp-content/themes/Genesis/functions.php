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
      $prefix = 'rw_';
      // 1st meta box
      $args = array(
        'role'         => 'asesor'
      );

      $blogusers = get_users( $args );
      // Array of WP_User objects.
      $optionsT = array();
      for ($i=0; $i < count($blogusers); $i++) {
        $optionsT[$blogusers[$i]->display_name] =  $blogusers[$i]->display_name;
      }

      $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => __( 'Asesor de la Red', 'textdomain' ),
        'post_types' => array('linea_investigacion'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
          array(
            'name'        => esc_html__( 'Asesor', 'your-prefix' ),
            'id'          => "asesor",
            'type'        => 'select',
            // Array of 'value' => 'Label' pairs for select box
            /*'options'     => array(
              'value1' => esc_html__( 'Label1', 'your-qqprefix' ),
              'value2' => esc_html__( 'Label2', 'your-prefix' ),
            ),*/
            'options' => $optionsT,
            // Select multiple values, optional. Default is false.
            'multiple'    => false,
            'placeholder' => esc_html__( 'Select an Item', 'your-prefix' ),
          ),
          )
        );

        return $meta_boxes;
      }
?>
