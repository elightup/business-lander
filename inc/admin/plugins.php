<?php
/**
 * Add required and recommended plugins.
 *
 * @package Business Lander
 */

add_action( 'tgmpa_register', 'business_lander_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function business_lander_register_required_plugins() {
	$plugins = array(
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
	);

	$config = array(
		'id' => 'business-lander',
	);

	tgmpa( $plugins, $config );
}
