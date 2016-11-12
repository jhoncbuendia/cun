<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Genesis
 * @since Genesis 1.0
 */
?><!DOCTYPE html>
<html lang="es">
<head>
    <title>Génesis Córdoba</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel='stylesheet' id='wise_chat_core-css'  href='<?php echo get_template_directory_uri(); ?>/js/wise-chat/css/wise_chat.css?ver=4.6.1' type='text/css' media='all' />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
</head>
<body>
    <header class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Génesis Córdoba" class="logo"></a>
            </div>
            <div class="col-md-5 col-md-offset-4">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-cun.png" alt="CUN" class="logo-cun">
                <img src="<?php echo get_template_directory_uri(); ?>/images/g+.png" alt="" class="social-icons">
                <a href="https://www.facebook.com/Proyecto-G%C3%A9nesis-C%C3%B3rdoba-1410228575956082/"><img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" alt="" class="social-icons"></a>
                <a href="https://twitter.com/GenesisCordoba"><img src="<?php echo get_template_directory_uri(); ?>/images/tw.png" alt="" class="social-icons"></a>
                <img src="<?php echo get_template_directory_uri(); ?>/images/in.png" alt="" class="social-icons">
            </div>
        </div>
    </header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#principal-menu" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="principal-menu">
                <div class="row">
                    <div class="col-md-9">
                        <?php wp_nav_menu( array( 'theme_location' => 'menu-principal', 'menu_class' =>  'nav navbar-nav', 'container' => 'ul') ); ?>
                    </div>
                    <div class="col-md-3">
                        <?php get_search_form( ); ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
