<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package business-lander
 */

/**
 * Filter the except length to 20 words.
 *
 * @return int Modified excerpt length.
 */
function business_lander_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 24;
}

add_filter( 'excerpt_length', 'business_lander_custom_excerpt_length' );

/**
 * Filter the excerpt "read more" string.
 *
 * @return string Modified "read more" excerpt string.
 */
function business_lander_excerpt_more() {
	return '&hellip;';
}

add_filter( 'excerpt_more', 'business_lander_excerpt_more' );

/**
 * Change the title of the archive page.
 *
 * @param string $title Archive page title.
 *
 * @return string
 */
function business_lander_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'business_lander_archive_title' );
