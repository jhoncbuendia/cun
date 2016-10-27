<?php
/* Template Name: Todos los proyectos */
    get_header();
?>
<section class="container navigation-options">
    <div class="row">
        <div class="col-md-6"><?php dynamic_sidebar( 'Breadcrumb' ); ?></div>
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
<?php

  //while ( have_posts() ) : the_post();
    // Include the single post content template.
    //get_template_part( 'template-parts/content', 'single' );

    $proyectos = get_posts(array('post_type' => 'proyecto'));

    foreach ( $proyectos as $p ) {

    }



?>
<section class="container proyects">
    <div class="col-md-9 search-proyects">
        <h3 class="title">PROYECTOS</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <?php
                    $args = array('post_type' => 'proyecto');

                    $myposts = get_posts($args);
                    foreach ( $myposts as $post ){
                ?>
                    <div class="col-md-6 all-projects">
                        <div class="col-md-4 image-article">
                            <?php
                              $img = wp_get_attachment_image( get_post_meta($post->ID, 'img_proyecto', true ), array('150', '153'), "", array( "class" => "img-responsive" ) ));
                            ?>
                        </div>
                        <div class="col-md-8 content-article">
                            <h5 class="title-article"><a href="<?php the_permalink(); ?>"><?php $post->post_title ?></a></h5>
                            <content>
                                <?php /*echo excerpt(20);*/ ?>
                            </content>
                            <a href="<?php $post->gui ?>" class="know-more">CONOCER MÁS</a>
                        </div>
                    </div>
                <?php }
                                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 inline-users">
        <?php dynamic_sidebar( 'online_users' ); ?>
        <div class="row">
            <?php dynamic_sidebar( 'last_comments' ); ?>
        </div>
    </div>
</section>
<?php
    get_footer();
?>
