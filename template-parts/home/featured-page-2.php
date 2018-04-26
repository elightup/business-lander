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

$query = new WP_Query( array(
	'post_type' => 'page',
	'page_id'   => $featured_page_2,
) );
if ( ! $query->have_posts() ) {
	return;
}

while ( $query->have_posts() ) :
	$query->the_post();
	?>
	<section class="featured-page-2">
		<div class="container">
			<div class="featured-page">
				<div class="featured-page__title">
					<h3><?php the_title(); ?></h3>
				</div>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="featured-page__continue"><?php esc_html_e( 'Learn more', 'business-lander' ); ?></a>
			</div>
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	</section>
<?php endwhile; ?>
