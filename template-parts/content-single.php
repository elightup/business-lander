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
		the_content();
		wp_link_pages( array(
			'before'   => '<div class="page-links">' . esc_html__( 'Pages:', 'business-lander' ),
			'after'    => '</div>',
			'pagelink' => '<span>%</span>',
		) );
		?>
	</div>

	<div class="author_bio_section">
		<div class="container">

			<?php
			if ( function_exists( 'jetpack_author_bio' ) ) {
				jetpack_author_bio();
			}
			?>

			<div class="category-tag">
				<?php business_lander_entry_footer(); ?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
