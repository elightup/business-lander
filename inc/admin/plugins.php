<?php
/**
 * Add required and recommended plugins.
 *
 * @package business-lander
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
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'business-lander',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',
		// Menu slug.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'business-lander' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'business-lander' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'business-lander' ),
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'business-lander' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'business-lander' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'business-lander'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'business-lander'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'business-lander'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'business-lander'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'business-lander'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'business-lander'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'business-lander'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'business-lander'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'business-lander'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'business-lander' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'business-lander' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'business-lander' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'business-lander' ),
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'business-lander' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'business-lander' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'business-lander' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'business-lander' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'business-lander' ),
			'nag_type'                        => '',
			// Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);

	tgmpa( $plugins, $config );
}
