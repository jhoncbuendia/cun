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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
</head>
<body>
    <header class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Génesis Córdoba" class="logo">
            </div>
            <div class="col-md-5 col-md-offset-4">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-cun.png" alt="CUN" class="logo-cun">
                <img src="<?php echo get_template_directory_uri(); ?>/images/g+.png" alt="" class="social-icons">
                <img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" alt="" class="social-icons">
                <img src="<?php echo get_template_directory_uri(); ?>/images/tw.png" alt="" class="social-icons">
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
                <?php wp_nav_menu( array( 'theme_location' => 'menu-principal', 'menu_class' => 'nav navbar-nav') ); ?>
            </div>
        </div>
    </nav>