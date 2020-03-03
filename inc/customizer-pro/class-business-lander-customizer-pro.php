<?php
/**
 * Handles the "Go Pro" section in the Customizer.
 *
 * @package Business_Lander
 */

/**
 * The customizer pro class.
 */
final class Business_Lander_Customizer_Pro {

	/**
	 * Theme slug.
	 *
	 * @var string Theme slug.
	 */
	private $slug;

	/**
	 * UTM link.
	 *
	 * @var string UTM link.
	 */
	private $utm;

	/**
	 * Sets up initial actions.
	 */
	public function init() {

		$theme      = wp_get_theme();
		$this->slug = $theme->template;
		$this->utm  = '?utm_source=WordPress&utm_medium=link&utm_campaign=' . $this->slug;

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @param  WP_Customize_Manager $manager WP_Customize_Manager instance.
	 */
	public function sections( $manager ) {
		// Load custom sections.
		require get_template_directory() . '/inc/customizer-pro/class-business-lander-customizer-section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Business_Lander_Customizer_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Business_Lander_Customizer_Section_Pro(
				$manager,
				'business-lander-pro',
				array(
					'doc_title' => esc_html__( 'Need Some Help?', 'business-lander' ),
					'doc_text'  => esc_html__( 'Need help setting up your site?', 'business-lander' ),
					'doc_url'   => esc_url( "https://gretathemes.com/docs/{$this->slug}" ),
					'priority'  => 0,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'business-lander-customize-pro-script', get_template_directory_uri() . '/inc/customizer-pro/customize-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'business-lander-customize-pro-style', get_template_directory_uri() . '/inc/customizer-pro/customize-controls.css' );
	}
}
