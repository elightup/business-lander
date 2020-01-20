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

$char = '';
$get_title = get_the_title( $featured_page_1 );
if ( $get_title ) {
	$char = $get_title[0];
}

$image = get_the_post_thumbnail_url( $featured_page_1, 'full' );
if ( $image ) {
	$image = ' style="background-image: url(' . esc_url( $image ) . ')"';
}
?>
<section class="featured-page-1" <?php echo $image; // WPCS: XSS OK. ?>>
	<div class="container">
		<div class="featured-page" data-line="<?php echo esc_attr( $char );?>">
			<div class="featured-page__title">
				<h3><?php echo esc_html( $get_title ); ?></h3>
			</div>
			<?php echo wp_kses_post( get_the_excerpt( $featured_page_1 ) ); ?>
			<a href="<?php echo esc_url( get_the_permalink( $featured_page_1 ) ); ?>" class="featured-page__continue"><?php esc_html_e( 'Learn more', 'business-lander' ); ?></a>
		</div>
	</div>
</section>
