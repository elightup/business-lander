<?php
/**
 * Template part for displaying featured page 3.
 *
 * @package business-lander
 */

$featured_page_3 = get_theme_mod( 'featured_page_3' );
if ( $featured_page_3 ) {
	$post = get_post( $featured_page_3 );
	setup_postdata( $post );
}
$before_title = get_the_title();
?>
	<section class="featured-page-3">
		<div class="container">
			<?php the_post_thumbnail( 'full' ); ?>
			<div class="featured-page" data-line="<?php echo $before_title[0];?>">
				<div class="featured-page__title">
					<h3><?php the_title(); ?></h3>
				</div>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>"
				   class="featured-page__continue"><?php esc_html_e( 'Learn more', 'business-lander' ); ?></a>
				<?php wp_reset_postdata(); ?>

			</div>
		</div>
	</section>

