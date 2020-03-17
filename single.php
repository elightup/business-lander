<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business-lander
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<div class="post-nav">
			<div class="container">
				<?php
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav">' . esc_html__( 'Next Post', 'business-lander' ) . '</span> <span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav">' . esc_html__( 'Previous Post', 'business-lander' ) . '</span> <span class="post-title">%title</span>',
				) );
				?>
			</div>
		</div><!-- .post-nav -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
