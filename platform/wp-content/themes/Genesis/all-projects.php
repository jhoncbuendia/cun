<?php
/* Template Name: Todos los proyectos */
get_header();

$search = new WP_Advanced_Search('myform');
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
<section class="container proyects">
  <div class="col-md-9 search-proyects">

    <h3 class="title">PROYECTOS</h3>
    <div class="row">




      <div class="col-md-12" style="padding-bottom: 20px;">
        <?php $search->the_form(); ?>
      </div>






      <div class="col-md-12">
        <div class="row">
          <?php
          $temp = $wp_query;
          $wp_query = $search->query();

          if ( have_posts() ) :

            while ( have_posts() ) : the_post(); ?>
            <?php $post_type = get_post_type_object($post->post_type); ?>
            <div class="col-md-6">
              <div class="col-md-4 image-article">
                <?php
                $obji = get_post_meta(get_the_ID(), 'img_proyecto', false);

                if (count($obji)> 0)
                {

                  echo wp_get_attachment_image($obji[0], array('120', '120'), "", array( "class" => "img-responsive" ) );
                }

                ?>




              </div>
              <div class="col-md-8 content-article">
                <h5 class="title-article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <content>
                  <?php echo wp_trim_words(get_post_meta(get_the_ID(), 'pproblema', true ), 10, '...' ); ?>
                </content>
                <a href="<?php the_permalink(); ?>" class="know-more">CONOCER MÁS</a>
              </div>
            </div>

            <?php
          endwhile;

          else :
            echo '<p>Sorry, no results matched your search.</p>';
          endif;

          $search->pagination();

          $wp_query = $temp;
          wp_reset_query();
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
