<?php
/* Template Name: single proyecto */
get_header();
?>
<?php while ( have_posts() ) : the_post();
// Include the single post content template.
?>
<section class="container project">
  <div class="col-md-9 content-proyect">
    <div class="row first-part">
      <div class="row divided-content">
        <div class="col-md-6 left-content">
          <div class="row">
            <div class="col-md-12">
              <h5>Título de la investigación</h5>
              <div class="item-project title-project">
                <?php the_title(); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h5>Red del conocimiento:</h5>
              <div class="item-project">
                <?php echo get_post(get_post_meta(get_the_ID(), 'post', true ))->post_title; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h5>Municipio:</h5>
              <div class="item-project">
                <?php echo get_post_meta(get_the_ID(), 'municipio', true ); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 right-content">
          <div class="row">
            <div class="col-md-12">
              <div class="logo-project">
                <?php
                $obji = get_post_meta(get_the_ID(), 'img_grupo', false);

                if (count($obji)> 0)
                {
                  echo wp_get_attachment_image($obji[0], array('120', '120'), "", array( "class" => "img-responsive" ) );

                }

                ?>


              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 institution-project">
              <h5>Institución educativa:</h5>
              <div class="item-project">
                <?php echo get_post_meta(get_the_ID(), 'iEducativa', true ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="problem-project">
        <h3 class="title-sections">1. Planteamiento del problema</h3>
        <article class="item-project">
          <?php echo get_post_meta(get_the_ID(), 'pproblema', true ); ?>
        </article>
      </div>
    </div>
    <div class="row second-part">
      <div class="problem-project">
        <h3 class="title-sections">2. Objetivos</h3>
        <article class="item-project">
          <ul>
            <?php
            $obj = get_post_meta(get_the_ID(), 'objetivos', true );
            if(is_array($obj)){
              if (count($obj)> 0)
              {
                foreach($obj as $o){?>
                  <li style="padding-bottom:15px;">
                    <?php echo $o; ?>
                  </li>
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
          </ul>
        </article>
      </div>
      <div class="problem-project">
        <h3 class="title-sections">3. Metodología</h3>
        <article class="item-project">
          <ul>
            <?php
            $met = get_post_meta(get_the_ID(), 'metodologia', true);
            if(is_array($met)){
              if (count($met)> 0)
              {
                foreach($met as $m){?>
                  <li style="padding-bottom:15px;">
                    <?php echo $m; ?>
                  </li>
                  <?php
                }
              }
            }else
            {
              ?>
              <li style="padding-bottom:15px;">
                <?php echo $met; ?>
              </li>
              <?php
            }
            ?>
          </ul>
        </article>
      </div>
      <div class="problem-project">
        <h3 class="title-sections">4. Resultados</h3>
        <article class="item-project">
          <?php
          $res = get_post_meta(get_the_ID(), 'resultados', true );
          if(is_array($res))
          {
            if (count($res)> 0)
            {
              foreach($res as $r){?>
                <li style="padding-bottom:15px;">
                  <?php echo $r; ?>
                </li>
                <?php
              }
            }
          }
          else{
            ?>
            <li style="padding-bottom:15px;">
              <?php echo $res; ?>
            </li>
            <?php
          }
          ?>

        </article>
      </div>
    </div>
    <div class="row third-part">
      <div class="problem-project">
        <h3 class="title-sections">2. Bibliografía</h3>
        <article class="item-project">
          <?php
          $bb = get_post_meta(get_the_ID(), 'bibliografia', true );
          if(is_array($bb)){
            if (count($bb)> 0)
            {
              foreach($bb as $b){?>
                <li style="padding-bottom:15px;">
                  <?php echo $b; ?>
                </li>
                <?php
              }
            }
          }else{
            ?>
            <li style="padding-bottom:15px;">
              <?php echo $bb; ?>
            </li>
            <?php
          }
          ?>

        </article>
      </div>
    </div>
    <div class="row third-part">
      <div class="problem-project">
        <h3 class="title-sections">3. Galeria</h3>
        <article class="item-project">
          <a href="<?php echo get_home_url(); ?>/galeria?idpost=<?php echo get_the_ID() ?>">Ver Galeria</a>
        </article>
      </div>
    </div>
    <div class="row third-part">
      <div class="problem-project">
        <h3 class="title-sections">4. Video del Proyecto</h3>
        <article class="item-project">
          <?php
          $objc = get_post_meta(get_the_ID(), 'oembed', false);
          if (count($objc)> 0)
          {
            echo wp_oembed_get($objc[0]);
          }?>
        </article>
      </div>
    </div>
  </div>
  <div class="col-md-3 inline-users">
    <div class="row">
      <h3 class="title online gruop-title"><?php echo get_post_meta(get_the_ID(), 'nmgrupo', true ); ?></h3>
      <div class="row the-users">
        <div class="col-md-2 image-profile">
          <?php
          echo wp_get_attachment_image(get_post_meta(get_the_ID(), 'foto_docente', true ), array('120', '120'), "", array( "class" => "img-responsive" ) ); ?>
        </div>
        <div class="col-md-8 name-user">
          <h6 class="rol-user">Docente</h6>
          <h6 class="user-project">
            <?php


            $doce = get_post_meta(get_the_ID(), 'docente', true );
            if(is_array($doce)){
              if (count($doce)> 0)
              {
                foreach($doce as $code){?>
                  <li style="padding-bottom:15px;">
                    <?php echo $code; ?>
                  </li>
                  <?php
                }
              }
            }
            else{
              ?>
              <li style="padding-bottom:15px;">
                <?php echo $doce; ?>
              </li>
              <?php
            }
            ?></h6>
          </div>
          <div class="col-md-8 name-user">
            <h6 class="rol-user">Alumnos</h6>
            <h6 class="user-project">
              <?php


              $alu = get_post_meta(get_the_ID(), 'alumnos', true );

              if (count($alu)> 0)
              {
                foreach($alu as $alum){?>
                  <li style="padding-bottom:15px;">
                    <?php echo $alum; ?>
                  </li>
                  <?php
                }
              }
              ?></h6>
            </div>

          </div>
        </div>
      </div>
    </section>
  <?php endwhile; ?>
  <?php get_footer(); ?>
