<?php
/**
 * Template part for displaying featured page 3.
 *
 * @package business-lander
 */

$featured_page_3 = get_theme_mod( 'featured_page_3' );
if ( ! $featured_page_3 ) {
	return;
}

$char = '';
$get_title = get_the_title( $featured_page_3 );
if ( $get_title ) {
	$char = $get_title[0];
}

$query = new WP_Query(
	array(
		'post_type'      => 'page',
		'posts_per_page' => 1,
		'post__in'       => [$featured_page_3]
	)
);

if ( ! $query->have_posts() ) {
	return;
}
$thumbnail = get_the_post_thumbnail( $featured_page_3, 'full' );
?>
<section class="featured-page-3">
	<div class="container">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php echo wp_kses_post( $thumbnail ); ?>
			<div class="featured-page" data-line="<?php echo esc_attr( $char ); ?>">
				<div class="featured-page__title">
					<h3><?php the_title(); ?></h3>
				</div>
				<?php echo wp_kses_post( get_the_excerpt() ); ?>
				<a href="<?php echo esc_url( get_the_permalink() ); ?>"
				   class="featured-page__continue"><?php esc_html_e( 'Learn more', 'business-lander' ); ?></a>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
