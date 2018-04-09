<?php
/**
 * Template Name: Home page
 *
 * @package business-lander
 */

if ( 'posts' === get_option( 'show_on_front' ) ) {
	get_template_part( 'index' );
	return;
}

get_header();

	get_template_part( 'template-parts/home/contact' );
	get_template_part( 'template-parts/home/services' );
	get_template_part( 'template-parts/home/featured-page-1' );
	get_template_part( 'template-parts/home/featured-page-2' );
	get_template_part( 'template-parts/home/testimonial' );
	get_template_part( 'template-parts/home/featured-page-3' );
	get_template_part( 'template-parts/home/cta' );

get_footer();
