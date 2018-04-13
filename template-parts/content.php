<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content post-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'business-lander' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		?>
		<div class="pagelink"><?php wp_link_pages( 'pagelink=<span>%</span>' ); ?></div>
	</div>

	<div class="author_bio_section">
		<div class="container">

				<?php
				if ( function_exists( 'jetpack_author_bio' ) ) {
					jetpack_author_bio();
				}
				?>

			<div class="category-tag">
				<?php
					business_lander_category_tag();
				?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
