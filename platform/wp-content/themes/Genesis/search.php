<?php
/**
* The template for displaying search results pages.
*
* @package WordPress
* @subpackage Twenty_Fifteen
* @since Twenty Fifteen 1.0
*/

get_header(); ?>
<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Resultados de la busqueda: %s', 'Genesis' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

			//if(get_post_type() == "proyecto" || get_post_type() == "linea_investigacion" ) {?>

				<?php
				/*
				* Run the loop for the search to output the results.
				* If you want to overload this in a child theme then include a file
				* called content-search.php and that will be used instead.
				*/


				?>
				<div class="container-fluid" style="padding-bottom:20px;">
					<div class="row">
						<div class="col-md-12">
							<h3>
								<?php the_title(); ?>
							</h3>
							<p>
								<?php
								if(get_post_type() == "proyecto")
								{
									echo wp_trim_words(get_post_meta(get_the_ID(), 'pproblema', true ), 40, '...' );
								}else{
									echo wp_trim_words( get_the_content(), 40, '...' );
								}
								?>
							</p>
							<p>
								<a class="btn" href="<?php the_permalink(); ?>">Ver detalle »</a>
							</p>
						</div>
						<!-- <div class="col-md-4">
							<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" />
						</div> -->
					</div>
				</div>
				<hr/>

				<?php

		//	}
			// End the loop.
		endwhile;

		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => __( 'Previous page', 'Genesis' ),
			'next_text'          => __( 'Next page', 'Genesis' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'Genesis' ) . ' </span>',
			) );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );
				echo "no se encontraron resultados";
			endif;
			?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

	<?php get_footer(); ?>
