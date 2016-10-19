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
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner.png" alt="...">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner.png" alt="...">
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
    </section>
    <?php 
    // if ( have_posts() ) :
    //     while ( have_posts() ) : the_post();
    //     endwhile;
    //   endif;
    ?>
    <section class="container" id="knowledges-lines">
        <div class="row">
            <?php
                $knowledgesLines = get_post( 87 );
                $contentPost = $knowledgesLines->post_content;
                echo $contentPost;
            ?>
        </div>
    </section>
    <section class="container three-cols">
        <div class="row">
            <div class="col-md-6 left-col">
                <h3 class="news">NOTICIAS</h3>
                <div class="row">
                <?php
                    $args = array( 'posts_per_page' => 3, 'offset'=> 0, 'category' => 20 );

                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                        <div class="col-md-4 image-article">
                        <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail(array(150, 153));
                        } ?>
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
                <!--<h3 class="calendar">CALENDARIO</h3>-->
                <?php dynamic_sidebar( 'home_events' ); ?>
            </div>
            <div class="col-md-3 right-col">
                <h3 class="twitter">TWITTER</h3>
                <?php dynamic_sidebar( 'social_networks' ); ?>
            </div>
        </div>
    </section>
  <?php bbp_list_forums(custom_bbp_sub_forum_list);  ?>
    <section class="container three-cols">
        <div class="row">
            <div class="col-md-6 left-col">
                <h3 class="blog">BLOG</h3>
                <div class="row">

                   

                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 middle-col">
                <?php dynamic_sidebar( 'last_comments' ); ?>
                <!--<div class="row last-comments">
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
                </div>-->
            </div>
            <div class="col-md-3 right-col">
                <?php dynamic_sidebar( 'login_home' ); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>