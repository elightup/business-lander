<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package business-lander
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function business_lander_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_home() || is_archive() || is_search() ) {
		$classes[] = get_theme_mod( 'blog_style' );
	}

	return $classes;
}
add_filter( 'body_class', 'business_lander_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function business_lander_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'business_lander_pingback_header' );
