<?php
/**
 * Template part for displaying testimonials.
 *
 * @package business-lander
 */

if ( ! post_type_exists( 'jetpack-testimonial' ) ) {
	return;
}

$query = new WP_Query( array(
	'post_type'      => 'jetpack-testimonial',
	'posts_per_page' => 3,
) );
if ( ! $query->have_posts() ) {
	return;
}

$image = get_theme_mod( 'testimonial_section_img' );
if ( $image ) {
	$image = ' style="background-image: url(' . esc_url( $image ) . ')"';
}
?>
<section class="section--testimonial"<?php echo $image; // WPCS: XSS OK. ?>>
	<div class="container">
		<h3 class="section--testimonial__title"><?php esc_html_e( 'Testimonials', 'business-lander' ); ?></h3>
		<div class="testimonial">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<div class="testimonial-item">
					<div class="content"><?php the_content(); ?></div>
					<div class="image"><?php the_post_thumbnail(); ?></div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
