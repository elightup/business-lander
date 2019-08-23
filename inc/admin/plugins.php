<?php
/**
 * Add required and recommended plugins.
 *
 * @package Digimag
 */

add_action( 'tgmpa_register', 'business_lander_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function business_lander_register_required_plugins() {
	$plugins = business_lander_required_plugins();

	$config = array(
		'id'          => 'business-lander',
		'has_notices' => false,
	);

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function business_lander_required_plugins() {
	return array(
		array(
			'name'     => esc_html__( 'Jetpack', 'business-lander' ),
			'slug'     => 'jetpack',
			'required' => true,
		),
		array(
			'name' => esc_html__( 'One click demo import', 'business-lander' ),
			'slug' => 'one-click-demo-import',
		),
		array(
			'name' => esc_html__( 'Ultimate Fonts', 'business-lander' ),
			'slug' => 'ultimate-fonts',
		),
		array(
			'name' => esc_html__( 'Ultimate Colors', 'business-lander' ),
			'slug' => 'ultimate-colors',
		),
		array(
			'name' => esc_html__( 'Slim SEO', 'greentech' ),
			'slug' => 'slim-seo',
		),
	);
}
