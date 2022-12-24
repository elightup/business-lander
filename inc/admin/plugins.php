<?php
/**
 * Add required and recommended plugins.
 *
 * @package business-lander
 */

add_action( 'tgmpa_register', 'business_lander_register_required_plugins' );
add_filter( 'ocdi/register_plugins', 'business_lander_register_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function business_lander_register_required_plugins() {
	$plugins = business_lander_required_plugins();

	$config = [
		'id'          => 'business-lander',
		'has_notices' => true,
	];

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function business_lander_required_plugins() {
	return [
		[
			'name'     => esc_html__( 'Jetpack', 'business-lander' ),
			'slug'     => 'jetpack',
		],
		[
			'name' => esc_html__( 'Slim SEO', 'business-lander' ),
			'slug' => 'slim-seo',
		],
		[
			'name' => esc_html__( 'Falcon', 'business-lander' ),
			'slug' => 'falcon',
		],
		[
			'name' => esc_html__( 'One Click Demo Import', 'business-lander' ),
			'slug' => 'one-click-demo-import',
		],
	];
}

/**
 * List of recommended plugins in ocdi plugin
 */
function business_lander_register_plugins( $plugins ) {
	$theme_plugins = [
		[
			'name'     => esc_html__( 'Jetpack', 'business-lander' ),
			'slug'     => 'jetpack',
		],
		[
			'name' => esc_html__( 'Slim SEO', 'business-lander' ),
			'slug' => 'slim-seo',
		],
		[
			'name' => esc_html__( 'Falcon', 'business-lander' ),
			'slug' => 'falcon',
		],
	];

	return array_merge( $plugins, $theme_plugins );
}