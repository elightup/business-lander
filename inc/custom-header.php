<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package business-lander
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses business_lander_header_style()
 */
function business_lander_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'business_lander_custom_header_args', array(
		'default-text-color' => '#000000',
		'width'              => 1920,
		'height'             => 500,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'business_lander_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'business_lander_custom_header_setup' );

/**
 * Show the header image and optionally hide the site title, site description.
 */
function business_lander_header_style() {
	$style = '';
	if ( ! display_header_text() ) {
		$style .= '.site-title, .site-description { clip: rect(1px, 1px, 1px, 1px); position: absolute; }';
	}
	if ( $style ) :
		?>
		<style id="business-lander-header-css">
			<?php echo $style; // WPCS: XSS OK.                           ?>
		</style>
		<?php
	endif;
}
