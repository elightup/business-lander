<?php
/**
 * Template part for displaying services.
 *
 * @package business-lander
 */

?>

<?php
$service_pages = array();

for ( $i = 1; $i <= 3; $i ++ ) {
	$mod             = get_theme_mod( 'service_page_' . $i );
	$service_pages[] = $mod;
}

if ( empty( $service_pages ) ) {
	return;
}

$query = new WP_Query(
	array(
		'post_type'      => 'page',
		'posts_per_page' => 3,
		'post__in'       => $service_pages,
		'orderby'        => 'post__in',
	)
);

if ( ! $query->have_posts() ) {
	return;
}

$services_image = get_the_post_thumbnail( get_the_ID() );
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
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( '' ); ?></a>
						</div>
						<div class="section-service__info">
							<h3 class="section-service__title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
							<a class="section-service__continue" href="<?php the_permalink(); ?>"><?php echo esc_html__( 'learn more', 'business-lander' ); ?></a>
						</div>
					<?php else : ?>
						<h3 class="section-blog__title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
					<?php endif; ?>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
