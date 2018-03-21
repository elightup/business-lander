<?php
/**
 * bussiness-lander Theme Customizer
 *
 * @package bussiness-lander
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bussiness_lander_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add theme options panel.
	$wp_customize->add_panel( 'bussiness-lander', array(
		'title'           => esc_html__( 'Theme Options', 'bussiness-lander' ),
		'active_callback' => 'is_front_page',
	) );

	/**
	 * Contact section.
	 */
	$wp_customize->add_section( 'contact_section', array(
		'title' => esc_html__( 'Contact Section', 'bussiness-lander' ),
		'panel' => 'bussiness-lander',
	) );

	// Default Setting Services Section.
	$contact_bg_default = get_template_directory_uri() . '/images/contact-bg.png';

	$wp_customize->add_setting( 'front_page_contact', array(
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'front_page_contact', array(
		'label'           => esc_html__( 'Contact Page ', 'bussiness-lander' ),
		'section'         => 'contact_section',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->selective_refresh->add_partial(
		'front_page_services_',
		array(
			'selector'            => '.section--contact',
			'container_inclusive' => true,
			'render_callback'     => 'bussiness-lander_refresh_services_section',
		)
	);

		// Upload image to add background image.
	$wp_customize->add_setting( 'contact_section_img', array(
		'sanitize_callback' => 'bussiness-lander_sanitize_image',
		'default'           => $contact_bg_default,
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'services_section',
		array(
			'label'           => esc_html__( 'Centered Image', 'bussiness-lander' ),
			'section'         => 'contact_section',
			'description'     => esc_html__( 'Choose the contact section background', 'bussiness-lander' ),
			'settings'        => 'contact_section_img',
			'active_callback' => 'is_front_page',
		)
	) );


	/**
	 * Services section.
	 */
	$wp_customize->add_section( 'service_section', array(
		'title' => esc_html__( 'Service Section', 'bussiness-lander' ),
		'panel' => 'bussiness-lander',
	) );

	$wp_customize->add_setting( 'services_section_title', array(
		'default'           => esc_html__( 'Services', 'bussiness-lander' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'services_section_title', array(
		'label'           => esc_html__( 'Services Section Title', 'bussiness-lander' ),
		'section'         => 'service_section',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	for ( $i = 1; $i <= 3; $i ++ ) {
		$wp_customize->add_setting( 'front_page_services_' . $i, array(
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'front_page_services_' . $i, array(
			'label'           => esc_html__( 'Service Page ', 'bussiness-lander' ) . $i,
			'section'         => 'service_section',
			'type'            => 'dropdown-pages',
			'active_callback' => 'is_front_page',
		) );

		$wp_customize->selective_refresh->add_partial(
			'front_page_services_' . $i,
			array(
				'selector'            => '.section--services',
				'container_inclusive' => true,
				'render_callback'     => 'bussiness-lander_refresh_services_section',
			)
		);
	}

	/**
	 * Feature page 1 section.
	 */
	$wp_customize->add_section( 'feature_page_1_section', array(
		'title' => esc_html__( 'Feature page 1 Section', 'bussiness-lander' ),
		'panel' => 'bussiness-lander',
	) );

	$wp_customize->add_setting( 'feature_page_1', array(
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'feature_page_1', array(
		'label'           => esc_html__( 'Feature page 1 ', 'bussiness-lander' ),
		'section'         => 'feature_page_1_section',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->selective_refresh->add_partial(
		'feature_page_1',
		array(
			'selector'            => '.features-page-1',
			'container_inclusive' => true,
			'render_callback'     => 'bussiness-lander_refresh_services_section',
		)
	);


	/**
	 * Feature page 2 section.
	 */
	$wp_customize->add_section( 'feature_page_2_section', array(
		'title' => esc_html__( 'Feature page 2 Section', 'bussiness-lander' ),
		'panel' => 'bussiness-lander',
	) );

	$wp_customize->add_setting( 'feature_page_2', array(
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'feature_page_2', array(
		'label'           => esc_html__( 'Feature page 2 ', 'bussiness-lander' ),
		'section'         => 'feature_page_2_section',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->selective_refresh->add_partial(
		'feature_page_2',
		array(
			'selector'            => '.features-page-2',
			'container_inclusive' => true,
			'render_callback'     => 'bussiness-lander_refresh_services_section',
		)
	);

	/**
	 * Testimonial section.
	 */
	$testimonial_bg_default = get_template_directory_uri() . '/images/bg-tess.png';

	$wp_customize->add_section( 'testimonial_section', array(
		'title' => esc_html__( 'Testimonial Section', 'bussiness-lander' ),
		'panel' => 'bussiness-lander',
	) );

	$wp_customize->add_setting( 'testimonial_section_img', array(
		'sanitize_callback' => 'bussiness_lander_sanitize_image',
		'default'           => $testimonial_bg_default,
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'testimonial_section',
		array(
			'label'           => esc_html__( 'Background Image', 'bussiness-lander' ),
			'section'         => 'testimonial_section',
			'description'     => esc_html__( 'Choose the testimonial section background', 'bussiness-lander' ),
			'settings'        => 'testimonial_section_img',
			'active_callback' => 'is_front_page',
		)
	) );

	/**
	 * Feature page 3 section.
	 */
	$wp_customize->add_section( 'feature_page_3_section', array(
		'title' => esc_html__( 'Feature page 3 Section', 'bussiness-lander' ),
		'panel' => 'bussiness-lander',
	) );

	$wp_customize->add_setting( 'feature_page_3', array(
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'feature_page_3', array(
		'label'           => esc_html__( 'Feature page 3 ', 'bussiness-lander' ),
		'section'         => 'feature_page_3_section',
		'type'            => 'dropdown-pages',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->selective_refresh->add_partial(
		'feature_page_3',
		array(
			'selector'            => '.features-page-3',
			'container_inclusive' => true,
			'render_callback'     => 'bussiness-lander_refresh_services_section',
		)
	);

	/**
	 * CTA section.
	 */
	$wp_customize->add_section( 'cta_section', array(
		'title' => esc_html__( 'Call To Action Section', 'bussiness-lander' ),
		'panel' => 'bussiness-lander',
	) );

	// Call to action title.
	$wp_customize->add_setting( 'cta_title', array(
		'default'           => wp_kses_post( __( 'Expect the extraordinary', 'bussiness-lander' ) ),
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'cta_title', array(
		'label'           => esc_html__( 'Call To Action Title', 'bussiness-lander' ),
		'section'         => 'cta_section',
		'type'            => 'textarea',
		'active_callback' => 'is_front_page',
	) );

	// Call to action text.
	$wp_customize->add_setting( 'cta_text', array(
		'default'           => wp_kses_post( __( 'We are A Team of Experts', 'bussiness-lander' ) ),
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'cta_text', array(
		'label'           => esc_html__( 'Call To Action Text', 'bussiness-lander' ),
		'section'         => 'cta_section',
		'type'            => 'textarea',
		'active_callback' => 'is_front_page',
	) );

	// Call to action links.
	$wp_customize->add_setting( 'cta_button_text', array(
		'default'           => esc_html__( 'contact us', 'bussiness-lander' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'cta_button_text', array(
		'label'           => esc_html__( 'Call To Action Link Text', 'bussiness-lander' ),
		'section'         => 'cta_section',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customize->add_setting( 'cta_button_url', array(
		'default'           => esc_url( 'https://gretathemes.com/' ),
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'cta_button_url', array(
		'label'           => esc_html__( 'Call To Action Link URL', 'bussiness-lander' ),
		'section'         => 'cta_section',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	// Call to action background.
	$wp_customize->add_setting( 'cta_background', array(
		'sanitize_callback' => 'bussiness-lander_sanitize_image',
		'default'           => get_template_directory_uri() . '/images/cta-bg.png',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'cta_section',
		array(
			'label'           => esc_html__( 'Call To Action Backround Image', 'bussiness-lander' ),
			'section'         => 'cta_section',
			'settings'        => 'cta_background',
			'active_callback' => 'is_front_page',
		)
	) );

	/**
	 * Blog.
	 */
	$wp_customize->add_section( 'blog', array(
		'title' => esc_html__( 'Blog', 'bussiness-lander' ),
		'panel' => 'bussiness-lander',
	) );

	$wp_customize->add_setting( 'blog_style', array(
		'capability'        => 'edit_theme_options',
		'default'           => '0',
	) );

	$wp_customize->add_control( 'blog_style', array(
		'type'        => 'radio',
		'section'     => 'blog', // Add a default or your own section
		'label'       => __( 'Blog style' ),
		'description' => __( 'This is a custom radio input.' ),
		'choices'     => array(
			'0' => __( 'Blog' ),
			'1' => __( 'Blog full' ),
	  		),
	) );

	$wp_customize->add_setting( 'sidebar', array(
		'capability'        => 'edit_theme_options',
		'default'           => '0',
	) );

	$wp_customize->add_control( 'sidebar', array(
		'type'        => 'radio',
		'section'     => 'blog', // Add a default or your own section
		'label'       => __( 'Sidebar style' ),
		'description' => __( 'This is a custom radio input.' ),
		'choices'     => array(
			'0' => __( 'No Sidebar' ),
			'1' => __( 'Sidebar' ),
	  		),
	) );

}
add_action( 'customize_register', 'bussiness_lander_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bussiness_lander_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bussiness_lander_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bussiness_lander_customize_preview_js() {
	wp_enqueue_script( 'bussiness-lander-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bussiness_lander_customize_preview_js' );

/**
 * Sanitizes Image Upload.
 *
 * @param string $input potentially dangerous data.
 *
 * @return string
 */
function bussiness_lander_sanitize_image( $input ) {
	$filetype = wp_check_filetype( $input );
	if ( $filetype['ext'] && wp_ext2type( $filetype['ext'] ) === 'image' ) {
		return esc_url( $input );
	}
	return '';
}