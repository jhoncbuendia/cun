<?php
/* Template Name: galeria custom */
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
<section class="container proyects">
  <div class="col-md-9 search-proyects">
    <?php $gllr_post = get_post( $_GET['idpost'] ); ?>
    <h3 class="title">Galeria</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="row">



          <?php
          $obj = get_post_meta($gllr_post->ID, 'img_proyecto', false);
          if(is_array($obj)){
            if (count($obj)> 0)
            {
              ?>
              <div style="width:700px!important" id="micapa">
                <?php
                echo wp_get_attachment_image($obj[0], array('800', '600'), "", array( "class" => "img-thumbnail" ) );
                ?>
              </div>
              <?php
              foreach($obj as $o){
                ?>
                <a id="miboton" onclick='verImg("<?php echo wp_get_attachment_url( $o ); ?>")'>
                  <?php echo wp_get_attachment_image($o, array('120', '120'), "", array( "class" => "img-thumbnail" ) );?>
                </a>
                <?php
              }
            }
          }
          else
          {
            ?>
            <li style="padding-bottom:15px;">
              <?php echo $obj; ?>
            </li>
            <?php
          }
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
<script>
function verImg(id)
{

  $("#micapa").html("<img width='640' height='360' src='"+ id +"' class='img-thumbnail'/>");
}

</script>
