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

/**
 * Add custom link documentation
 */
if ( class_exists( 'WP_Customize_Section' ) ) {
	class Businessld_Customize_Link_Control extends WP_Customize_Section {
		/**
		 * Control's type.
		 *
		 * @var string
		 */
		public $type  = 'businessld-link';
		public $url   = '';
		public $label = '';

		public function json() {
			$json          = parent::json();
			$json['label'] = $this->label;
			$json['url']   = esc_url( $this->url );

			return $json;

		}

		/**
		 * Render the control's content.
		 */
		public function render_template() {
			?>
			<li id="accordion-section-link" class="gt-link-accordion-section control-section-default link-doc accordion-section">
				<h3 class="accordion-section-title"><a href="{{{ data.url }}}" target="_blank">{{ data.label }}</a></h3>
			</li>
			<?php
		}
	}
}