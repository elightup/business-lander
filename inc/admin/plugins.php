<?php
/**
 * Add required and recommended plugins.
 *
 * @package business-lander
 */

add_action( 'tgmpa_register', 'business_lander_register_required_plugins' );
add_filter( 'ocdi/register_plugins', 'business_lander_register_ocdi_plugins' );

function business_lander_register_required_plugins() {
	tgmpa( business_lander_required_plugins(), [
		'id'          => 'business-lander',
		'has_notices' => true,
	] );
}

function business_lander_register_ocdi_plugins( $plugins ) {
	return array_merge( $plugins, business_lander_required_plugins() );
}

/**
 * List of required plugins
 */
function business_lander_required_plugins() {
	return [
		[
			'name'     =>  'Jetpack',
			'slug'     => 'jetpack',
		],
		[
			'name' =>  'Slim SEO',
			'slug' => 'slim-seo',
		],
		[
			'name' =>  'Falcon',
			'slug' => 'falcon',
		],
		[
			'name' =>  'One Click Demo Import',
			'slug' => 'one-click-demo-import',
		],
	];
}