<?php
/* Template Name: Macrolineas de investigación */
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
<?php while ( have_posts() ) : the_post();
    // Include the single post content template.
    get_template_part( 'template-parts/content', 'single' );
?>
<?php if ( has_post_thumbnail() ) { ?>
<section class="container-fluid line-banner" style="background: url('<?php the_post_thumbnail_url() ?>">
<?php } ?>
    <h1 class="title"><?php the_title(); ?></h1>
</section>
<section class="container line-description">

    <h2><span>Esto es un Evento</span></h2>
    <p>
        <?php the_content(); ?>
    </p>
    <!--<a href="#nogo" class="more-info">Ampliar información</a>-->
</section>
<?php endwhile; ?>
<section class="container proyects">
    <div class="col-md-9 search-proyects">
        <h3 class="title">PROYECTOS</h3>
        <div>ESPACIO PARA BUSQUEDA</div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <?php
                    $args = array( 'posts_per_page' => 4, 'offset'=> 0, 'category' => 'Ciencias Socioculturales' );

                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                ?>
                    <div class="col-md-6">
                        <div class="col-md-4 image-article">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail(array(150, 153));
                                }
                            ?>
                        </div>
                        <div class="col-md-8 content-article">
                            <h5 class="title-article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <content>
                                <?php echo excerpt(20); ?>
                            </content>
                            <a href="<?php the_permalink() ?>" class="know-more">CONOCER MÁS</a>
                        </div>
                    </div>
                <?php endforeach;
                    wp_reset_postdata();
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
