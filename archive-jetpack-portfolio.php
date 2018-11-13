<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business-lander
 */

get_header(); ?>

	<div class="page-header">
		<?php
		post_type_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</div><!-- .page-header -->

	<div class="container">
		
		<main id="main" class="site-main grid grid--3">
			<div class="row col-2">
				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-grid' );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
		</main><!-- #main -->
		<?php the_posts_pagination(); ?>
		
	</div>

<?php

get_footer();
