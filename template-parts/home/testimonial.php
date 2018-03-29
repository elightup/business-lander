<?php
/**
 * Template part for displaying testimonials.
 *
 * @package business-lander
 */

$testimonial_bg_default = get_template_directory_uri() . '/images/bg-tess.png';
if ( ! post_type_exists( 'jetpack-testimonial' ) ) {
	return;
}

$args = array(
	'post_type'      => 'jetpack-testimonial',
	'posts_per_page' => 3,
);

$image = get_theme_mod( 'testimonial_section_img', $testimonial_bg_default );

$query = new WP_Query( $args );
if ( ! $query->have_posts() ) {
	return;
}
?>
<section class="section--testimonial" style="background-image: url( <?php echo esc_url( $image ) ?> )">
	<div class="container">
		<h3 class="section--testimonial__title"><?php echo esc_html('testimonials');?></h3>
		<div class="testimonial">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="testimonial-item">
					<div class="content"><?php the_content(); ?></div>
					<div class="image"><?php the_post_thumbnail(); ?></div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
