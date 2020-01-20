<?php
/**
 * Template part for displaying featured page 2.
 *
 * @package business-lander
 */

$featured_page_2 = get_theme_mod( 'featured_page_2' );
if ( ! $featured_page_2 ) {
	return;
}

$char = '';
$get_title = get_the_title( $featured_page_2 );
if ( $get_title ) {
	$char = $get_title[0];
}

$thumbnail = get_the_post_thumbnail( $featured_page_2, 'full' );
?>
	<section class="featured-page-2">
		<div class="container">
			<div class="featured-page" data-line="<?php echo esc_attr( $char );?>">
				<div class="featured-page__title">
					<h3><?php echo esc_html( $get_title ); ?></h3>
				</div>
				<?php echo wp_kses_post( get_the_excerpt( $featured_page_2 ) ); ?>
				<a href="<?php echo esc_url( get_the_permalink( $featured_page_2 ) ); ?>" class="featured-page__continue"><?php esc_html_e( 'Learn more', 'business-lander' ); ?></a>
			</div>
			<?php echo wp_kses_post( $thumbnail ); ?>
		</div>
	</section>

