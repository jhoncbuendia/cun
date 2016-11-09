<?php
/* Template Name: Macrolineas de investigación */
get_header();
$search = new WP_Advanced_Search('bform');
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

$idGeneral = get_the_ID();

get_template_part( 'template-parts/content', 'single' );
?>
<?php if ( has_post_thumbnail() ) { ?>
  <section class="container-fluid line-banner" style="background: url('<?php the_post_thumbnail_url() ?>">
    <?php } ?>
    <h1 class="title"><?php the_title(); ?></h1>
  </section>
  <section class="container line-description">

    <h2>Asesora en línea: <span><?php echo get_user_by('id', get_post_meta(get_the_ID(), 'asesor', true ))->display_name ?> </span></h2>
    <p>
      <?php the_content(); ?>
    </p>
    <!--<a href="#nogo" class="more-info">Ampliar información</a>-->
  </section>
<?php endwhile; ?>
<section class="container proyects">
  <div class="col-md-9 search-proyects">
    <h3 class="title">PROYECTOS</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12" style="padding-bottom: 20px;">
            <?php $search->the_form(); ?>
          </div>
          <?php

          $temp = $wp_query;
          $wp_query = $search->query();

          if ( have_posts() ) :

            while ( have_posts() ) : the_post();
            $linea = get_post_meta(get_the_ID(), 'post', true );
            if($linea == $idGeneral){
              ?>
              <div class="col-md-6">
                <div class="col-md-4 image-article">
                  <?php
                  $obji = get_post_meta(get_the_ID(), 'img_proyecto', false);
                  if(is_array($obji)){
                    echo wp_get_attachment_image($obji[0], array('120', '120'), "", array( "class" => "img-responsive" ) );
                  }
                  else {
                    echo wp_get_attachment_image($obji, array('120', '120'), "", array( "class" => "img-responsive" ) );
                  }
                  ?>
                </div>
                <div class="col-md-8 content-article">
                  <h5 class="title-article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <content>
                    <?php echo wp_trim_words(get_post_meta(get_the_ID(), 'pproblema', true ), 10, '...' ); ?>
                  </content>
                  <a href="<?php the_permalink() ?>" class="know-more">CONOCER MÁS</a>
                </div>
              </div>
              <?php
            }
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
