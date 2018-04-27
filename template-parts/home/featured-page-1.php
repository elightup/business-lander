<?php
/**
 * Template part for displaying featured page 1.
 *
 * @package business-lander
 */

$featured_page_1 = get_theme_mod( 'featured_page_1' );
if ( ! $featured_page_1 ) {
	return;
}
$post = get_post( $featured_page_1 );
setup_postdata( $post );

$char = '';
$title = get_the_title();
if ( $title ) {
	$char = $title[0];
}
?>
<section class="featured-page-1" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>)">
	<div class="container">
		<div class="featured-page" data-line="<?php echo esc_attr( $char );?>">
			<div class="featured-page__title">
				<h3><?php the_title(); ?></h3>
			</div>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="featured-page__continue"><?php esc_html_e( 'Learn more', 'business-lander' ); ?></a>

		</div>
	</div>
</section>
