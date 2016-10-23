<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Genesis
 * @since Genesis 1.0
 */

get_header(); ?>
<section class="container navigation-options">
    <div class="row">
        <div class="col-md-6">Home > Redes del conocimiento > Proyectos > Ciencias Socioculturales </div>
        <div class="col-md-6">
            <div class="dropdown change-line">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    CAMBIAR RED <img src="<?php echo get_template_directory_uri(); ?>/images/little-cow.png" alt="">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/red1.png" alt="" width="38">
                            <span>CIENCIEAS EXACTAS<br>SOCIOCULTURALES</span>12
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/red2.png" alt="" width="38">
                            <span>CIENCIAS EXACTAS<br>Y ESPECÍFICAS Y <br>EDUCACIÓN AMBIENTAL</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/red3.png" alt="" width="38">
                            <span>TECNOLOGÍAS<br>E INNOVACCIÓN</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/red4.png" alt="" width="38">
                            <span>LENGUAJE, EDUCACIÓN<br>Y ARTÍSTICA</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/red5.png" alt="" width="38">
                            <span>EDUCACIÓN<br>Y PEDAGOGÍA</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/red6.png" alt="" width="38">
                            <span>EMPRENDIMIENTO</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="container project">
    <div class="row">
        <?php while ( have_posts() ) : the_post();
            // Include the single post content template.
            get_template_part( 'template-parts/content', 'single' );
        ?>
        <div class="col-md-9">
            <h1 class="title"><?php the_title(); ?></h1>
            <h4 class="date-project"><?php the_date(); ?></h4>
            <h3>Asesora en línea:</h3>
            <h3 class="name-adviser">Karina Bravo</h3>
            <article>
                <?php the_content(); ?> 
            </article>
            <div class="comments">
            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }

                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation( array(
                        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
                    ) );
                } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation( array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ) );
                }
                ?>
            </div>
        </div>
    <?php endwhile; ?>
        <div class="col-md-3 inline-users">
            <?php dynamic_sidebar( 'online_users' ); ?>
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
                <?php dynamic_sidebar( 'last_comments' ); ?>
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
    </div>
</section>
<?php get_footer(); ?>