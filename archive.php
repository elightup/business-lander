<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

get_header(); ?>

	<main class="site-main" role="main">
		<div class="section--archive-posts">
			<div id="main" class="row col-1">
				<h2 class="blog-title"><?php the_archive_title(); ?></h2>

				<?php
				if ( have_posts() ) :
				?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'archive' );

					endwhile;
					?>


					<?php
					the_posts_pagination(
						array(
							'prev_text' => __( 'newer posts' ),
							'next_text' => __( 'older posts' ),
						)
					);

				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div><!-- #main -->
		</div><!-- .section-archive-posts -->
	</main><!-- .site-main -->
<?php
get_sidebar();
get_footer();
