<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

get_header();

	if ( is_home() && !is_front_page() || is_archive()) :
		$blog_style_option = get_theme_mod( 'blog_style', 'list' );
		if ( 'grid-no-sidebar' === $blog_style_option || 'grid-sidebar' === $blog_style_option ) :
			$blog_style_option = 'grid-sidebar';
		endif;
		if ( 'list-sidebar' === $blog_style_option || 'list-no-sidebar' === $blog_style_option ) :
			$blog_style_option = 'list-sidebar';
		endif;
		get_template_part( 'template-parts/blog/' . $blog_style_option );

	else :
		get_template_part( 'template-parts/blog/list-sidebar' );
	endif;

get_footer();
