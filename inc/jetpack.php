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
	add_theme_support(
		'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'business_lander_infinite_scroll_render',
			'footer'    => 'site-content',
		)
	);

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support social menu.
	add_theme_support( 'jetpack-social-menu' );

	// Add theme support for Content Options.
	add_theme_support(
		'jetpack-content-options', array(
			'author-bio'      => true, // display or not the author bio: true or false.

			'blog-display'    => 'content',
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
				'archive' => true,
				'post'    => true,
				'page'    => true,
			),
		)
	);
}
add_action( 'after_setup_theme', 'business_lander_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function business_lander_infinite_scroll_render() {
	$style = get_theme_mod( 'blog_style', 'grid' );
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', $style );
	}
}

