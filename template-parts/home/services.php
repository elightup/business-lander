<?php
/**
 * Template part for displaying services.
 *
 * @package business-lander
 */

$service_pages = array();
for ( $i = 1; $i <= 3; $i ++ ) {
	$mod             = get_theme_mod( 'service_page_' . $i );
	$service_pages[] = $mod;
}
$service_pages = array_filter( $service_pages );
if ( empty( $service_pages ) ) {
	return;
}

$query = new WP_Query( array(
	'post_type'      => 'page',
	'posts_per_page' => 3,
	'post__in'       => $service_pages,
	'orderby'        => 'post__in',
) );
if ( ! $query->have_posts() ) {
	return;
}
?>
<section class="section--services">
	<div class="container">
		<h2 class="services--title">
			<?php echo esc_html( get_theme_mod( 'services_section_title', __( 'Services', 'business-lander' ) ) ); ?>
		</h2>
		<div class="row col-3">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<div class="section-service__item">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="section-service__thumbnails">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
					<?php endif; ?>
					<div class="section-service__info">
						<h3 class="section-service__title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
						<a class="section-service__continue" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Learn more', 'business-lander' ); ?></a>
					</div>
				</div>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
