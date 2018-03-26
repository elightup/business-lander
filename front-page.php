<?php
/**
 * Template Name: Home page
 *
 * @package bussiness-lander
 */


get_header();

	get_template_part( 'template-parts/home/contact' );
	get_template_part( 'template-parts/home/services' );
	get_template_part( 'template-parts/home/features-page-1' );
	get_template_part( 'template-parts/home/features-page-2' );
	get_template_part( 'template-parts/home/testimonial' );
	get_template_part( 'template-parts/home/features-page-3');
	get_template_part( 'template-parts/home/cta');

get_footer();
