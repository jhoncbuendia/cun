<?php
/* Template Name: Proyecto */
    get_header();
?>
<section class="container navigation-options">
        <div class="row">
            <div class="col-md-6">Home > Redes del conocimiento > Proyectos > Ciencias Socioculturales </div>
            <div class="col-md-6">
                <div class="dropdown change-line">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        CAMBIAR RED <img src="<?php echo get_template_directory_uri(); ?>/images/little-cow.png" alt="">
                        <span class="caret"></span>
                    </button>
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-knowlege-all', 'menu_class' =>  'dropdown-menu', 'container' => 'ul') ); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="container project">
        <div class="col-md-9">
            <?php while ( have_posts() ) : the_post();
                // Include the single post content template.
                get_template_part( 'template-parts/content', 'single' );
            ?>
            <h1 class="title"><?php the_title(); ?></h1>
            <h4 class="date-project">Octubre 10 de 2016</h4>
            <h3>Asesora en línea:</h3>
            <h3 class="name-adviser">Karina Bravo:</h3>
            <article>
                <?php the_content(); ?> 
            </article>
            <?php endwhile; ?>
        </div>
        <div class="col-md-3 inline-users">
            <div class="row">
                <h3 class="title online">USUARIOS EN LÍNEA</h3>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
            </div>
            <div class="row">
                <h3 class="title comments">COMENTARIOS RECIENTES</h3>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>