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


/**
 * Demo files for importing.
 *
 * @return array List of demos configuration.
 */
function business_lander_import_files() {

	$business_lander_demo_url = trailingslashit( get_template_directory_uri() ) . 'demo/';

	return array(
		array(
			'import_file_name'                 => esc_html__( 'Demo 1', 'business-lander' ),
			'local_import_file'                => $business_lander_demo_url . 'content.xml',
			'local_import_widget_file_url'     => $business_lander_demo_url . 'widgets.wie',
			'local_import_customizer_file_url' => $business_lander_demo_url . 'theme-options.dat',
			'import_preview_image_url'         => $business_lander_demo_url . 'preview_image.jpg',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'business_lander_import_files' );

/**
 * Setup the theme after importing demo.
 */
function business_lander_after_import_setup() {
	// Assign menus to their locations.
	$header = get_term_by( 'slug', 'main-menu', 'nav_menu' );
	$social = get_term_by( 'slug', 'social-menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations', array(
			'menu-1'              => $header->term_id,
			'jetpack-social-menu' => $social->term_id,
		)
	);

	// Setup static front page.
	$front_page = get_page_by_title( 'Home' );
	$blog       = get_page_by_title( 'Blog' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page->ID );
	update_option( 'page_for_posts', $blog->ID );
	update_option( 'permalink_structure', '/%postname%/' );
}
add_action( 'pt-ocdi/after_import', 'business_lander_after_import_setup' );
