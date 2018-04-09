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

/*$blog_style_option = get_theme_mod( 'blog_style','grid' );*/
$blog_style_show = $_GET['blog_style'];

switch ( $blog_style_show ) {
	case 'grid':
		get_template_part( 'template-parts/blog/grid' );
		break;
	case 'grid-sidebar':
		get_template_part( 'template-parts/blog/grid-sidebar' );
		break;
	case 'list':
		get_template_part( 'template-parts/blog/list' );
		break;
	default:
		get_template_part( 'template-parts/blog/list-sidebar' );
		break;
}

get_footer();

