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
                                <div class="logo-project"></div>
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
                        <?php

			$obj = get_post_meta(get_the_ID(), 'objetivos', true ); 
			foreach($obj as $o){
				echo $o. "<br/><br/>";
			}

			?>
                    </article>
                </div>
                <div class="problem-project">
                    <h3 class="title-sections">3. Metodología</h3>
                    <article class="item-project">
			<?php echo get_post_meta(get_the_ID(), 'metodologia', true ); ?>
                    </article>
                </div>
                <div class="problem-project">
                    <h3 class="title-sections">4. Resultados</h3>
                    <article class="item-project">
				<?php echo get_post_meta(get_the_ID(), 'resultados', true ); ?>
                    </article>
                </div>
            </div>
            <div class="row third-part">
                <div class="problem-project">
                    <h3 class="title-sections">2. Bibliografía</h3>
                    <article class="item-project">
			<?php echo get_post_meta(get_the_ID(), 'bibliografia', true ); ?>
                    </article>
                </div>
            </div>
        </div>
        <div class="col-md-3 inline-users">
            <div class="row">
                <h3 class="title online gruop-title"><?php echo get_post_meta(get_the_ID(), 'nmgrupo', true ); ?></h3>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <?php wp_get_attachment_image( get_post_meta($p->ID, 'img_proyecto', true ), array('700', '600'), "", array( "class" => "img-responsive" ) ); ?>
                    </div>
                    <div class="col-md-8 name-user">
                        <h6 class="rol-user">Docente</h6>
                        <h6 class="user-project"><?php echo get_post_meta(get_the_ID(), 'docente', true ); ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>
