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

$query = new WP_Query(
	array(
		'post_type'      => 'page',
		'posts_per_page' => 1,
		'post__in'       => [$featured_page_2]
	)
);

if ( ! $query->have_posts() ) {
	return;
}
$thumbnail = get_the_post_thumbnail( $featured_page_2, 'full' );
while ( $query->have_posts() ) : $query->the_post();
?>
<section class="featured-page-2">
	<div class="container">
		<div class="featured-page" data-line="<?php the_title(); ?>">
			<div class="featured-page__title">
				<h3><?php the_title(); ?></h3>
			</div>
			<?php echo wp_kses_post( get_the_excerpt() ); ?>
			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="featured-page__continue"><?php esc_html_e( 'Learn more', 'business-lander' ); ?></a>
		</div>
		<?php echo wp_kses_post( $thumbnail ); ?>
	</div>
</section>
<?php endwhile; wp_reset_postdata(); ?>

