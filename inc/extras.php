<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
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
			'import_file_name'           => esc_html__( 'Demo 1', 'business_lander' ),
			'import_file_url'            => $business_lander_demo_url . 'content.xml',
			'import_widget_file_url'     => $business_lander_demo_url . 'widgets.wie',
			'local_import_customizer_file' => $business_lander_demo_url . 'theme-options.dat',
			'import_preview_image_url'   => $business_lander_demo_url . 'preview_image.jpg',
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
	$front_page = get_page_by_title( 'We care about your business success' );
	$blog       = get_page_by_title( 'Blog' );
	$contact    = get_page_by_title( 'Contact' );

	$front_page_services1 = get_page_by_title( 'Birthday Gifts' );
	$front_page_services2 = get_page_by_title( 'Corporate Gifts' );
	$front_page_services3 = get_page_by_title( 'Flowers Arrangements' );
	$featured_page_1      = get_page_by_title( 'Difference Is Clear' );
	$featured_page_2      = get_page_by_title( "We're Proud of Our Work" );
	$featured_page_3      = get_page_by_title( 'Our Happy Customers' );

	/**/

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page->ID );
	update_option( 'page_for_posts', $blog->ID );

	set_theme_mod( 'contact_form', $contact->ID );
	set_theme_mod( 'front_page_services_1', $front_page_services1->ID );
	set_theme_mod( 'front_page_services_2', $front_page_services2->ID );
	set_theme_mod( 'front_page_services_3', $front_page_services3->ID );
	set_theme_mod( 'featured_page_1', $featured_page_1->ID );
	set_theme_mod( 'featured_page_2', $featured_page_2->ID );
	set_theme_mod( 'featured_page_3', $featured_page_3->ID );

	update_option( 'permalink_structure', '/%postname%/' );
}
add_action( 'pt-ocdi/after_import', 'business_lander_after_import_setup' );
