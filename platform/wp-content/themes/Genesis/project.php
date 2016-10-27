<?php
/* Template Name: General */
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
    <section class="container project">
        <div class="col-md-9">
            <?php while ( have_posts() ) : the_post();
                // Include the single post content template.
                get_template_part( 'template-parts/content', 'single' );
            ?>
            <h1 class="title"><?php the_title(); ?></h1>
            <h4 class="date-project">the_date();</h4>
            <h3>Asesora en línea:</h3>
            <h3 class="name-adviser">Karina Bravo:</h3>
            <article>
                <?php the_content(); ?>
            </article>
            <?php endwhile; ?>
        </div>
        <div class="col-md-3 inline-users">
            <?php dynamic_sidebar( 'online_users' ); ?>
            <div class="row">
                <?php dynamic_sidebar( 'last_comments' ); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
