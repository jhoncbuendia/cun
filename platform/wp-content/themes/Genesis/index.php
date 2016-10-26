<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Genesis
 * @since Genesis 1.0
 */
    get_header();
?>
    <section class="container">
        <?php 
            echo do_shortcode("[metaslider id=147]"); 
        ?>
    </section>
    <section class="container" id="knowledges-lines">
        <div class="row">
            <?php wp_nav_menu( array( 'theme_location' => 'menu-knowlege', 'menu_class' =>  'nav navbar-nav', 'container' => 'ul') ); ?>
        </div>
    </section>
    <section class="container three-cols">
        <div class="row">
            <div class="col-md-6 left-col">
                <h3 class="title news">NOTICIAS</h3>
                <div class="row">
                <?php
                    $args = array( 'posts_per_page' => 3, 'offset'=> 0, 'category' => 'Noticias' );

                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                ?>
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
                            <?php the_excerpt(); ?>
                        </content>
                        <a href="<?php the_permalink() ?>" class="know-more">CONOCER MÁS</a>
                    </div>
                <?php endforeach; 
                    wp_reset_postdata();
                ?>
                </div>
            </div>
            <div class="col-md-3 middle-col">
                <?php dynamic_sidebar( 'home_events' ); ?>
            </div>
            <div class="col-md-3 right-col">
                <?php dynamic_sidebar( 'social_networks' ); ?>
            </div>
        </div>
    </section>
    <section class="container three-cols">
        <div class="row">
            <div class="col-md-6 left-col">
            <?php dynamic_sidebar( 'forum_blog' ); ?>
            </div>
            <div class="col-md-3 middle-col">
                <?php dynamic_sidebar( 'last_comments' ); ?>
            </div>
            <div class="col-md-3 right-col">
                <?php dynamic_sidebar( 'login_home' ); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>