<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

get_header();

	$blog_style_option = get_theme_mod( 'blog_style', 'list' );
	if ( 'grid-no-sidebar' === $blog_style_option || 'grid' === $blog_style_option ) :
		$blog_style_option = 'grid';
	endif;
	if ( 'list' === $blog_style_option || 'list-no-sidebar' === $blog_style_option ) :
		$blog_style_option = 'list';
	endif;
	get_template_part( 'template-parts/blog/' . $blog_style_option );

get_footer();