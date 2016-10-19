<?php
    add_theme_support( 'post-thumbnails' );

    // Register Menu
    function register_my_menu() {
    register_nav_menu('menu-principal',__( 'Menu principal' ));
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
            'before_title'  => '<h3 class="rounded">',
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
            'before_title'  => '<h3 class="rounded">',
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
            'before_title'  => '<h3 class="comments">',
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
            'before_title'  => '<h3 class="login">',
            'after_title'   => '</h3>',
        ) );

    }
    add_action( 'widgets_init', 'loginHome' );

    function onlineUsers() {

        register_sidebar( array(
            'name'          => 'Online Users',
            'id'            => 'online_users',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title online">',
            'after_title'   => '</h3>',
        ) );

    }
    add_action( 'widgets_init', 'onlineUsers' );

    function wForums() {

        register_sidebar( array(
            'name'          => 'Forums',
            'id'            => 'wforums',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="wforums">',
            'after_title'   => '</h3>',
        ) );

    }
    add_action( 'widgets_init', 'wForums' );

    //create vertical list subforum layout
    function custom_bbp_sub_forum_list() {
          $args['separator'] = '';
          return $args;
    }
   add_filter('bbp_after_list_forums_parse_args', 'custom_bbp_sub_forum_list' );
?>
