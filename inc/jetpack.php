<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package business-lander
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function business_lander_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'business_lander_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support social menu.
	add_theme_support( 'jetpack-social-menu' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'author-bio'         => true, // display or not the author bio: true or false.

		'blog-display'       => 'content',
		// the default setting of the theme: 'content', 'excerpt' or array( 'content', 'excerpt' ) for themes mixing both display.

		'post-details'    => array(
			'stylesheet' => 'business-lander-style',
			'date'       => '.posted-on',
			'categories' => '.post-category',
			'tags'       => '.post-tag',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'after_setup_theme', 'business_lander_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function business_lander_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}

/**
 * Show/Hide Featured Image outside of the loop.
 */
function business_lander_jetpack_featured_image_display() {
	if ( ! function_exists( 'jetpack_featured_images_remove_post_thumbnail' ) ) {
		return true;
	}

	$options         = get_theme_support( 'jetpack-content-options' );
	$featured_images = ( ! empty( $options[0]['featured-images'] ) ) ? $options[0]['featured-images'] : null;

	$settings = array(
		'post-default' => ( isset( $featured_images['post-default'] ) && false === $featured_images['post-default'] ) ? '' : 1,
		'page-default' => ( isset( $featured_images['page-default'] ) && false === $featured_images['page-default'] ) ? '' : 1,
	);

	$settings = array_merge( $settings, array(
		'post-option' => get_option( 'jetpack_content_featured_images_post', $settings['post-default'] ),
		'page-option' => get_option( 'jetpack_content_featured_images_page', $settings['page-default'] ),
	) );

	if ( ( ! $settings['post-option'] && is_single() ) || ( ! $settings['page-option'] && is_page() ) ) {
		return false;
	}

	return true;
}


/**
 * Display a Featured Image on archive pages if option is ticked.
 */
function business_lander_jetpack_featured_image_archive_display() {
	if ( ! function_exists( 'jetpack_featured_images_remove_post_thumbnail' ) ) {
		return false;
	}

	$options         = get_theme_support( 'jetpack-content-options' );
	$featured_images = ( ! empty( $options[0]['featured-images'] ) ) ? $options[0]['featured-images'] : null;

	$settings = array(
		'archive-default' => ( isset( $featured_images['archive-default'] ) && false === $featured_images['archive-default'] ) ? '' : 1,
	);

	$settings = array_merge( $settings, array(
		'archive-option' => get_option( 'jetpack_content_featured_images_archive', $settings['archive-default'] ),
	) );

	return $settings['archive-option'];
}