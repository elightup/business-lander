<?php
/**
 * Add theme dashboard page
 *
 * @package Business Lander
 */

/**
 * Dashboard class.
 */
class Business_Lander_Dashboard {

	/**
	 * Store the theme data.
	 *
	 * @var WP_Theme Theme data.
	 */
	private $theme;

	/**
	 * Theme slug.
	 *
	 * @var string Theme slug.
	 */
	private $slug;

	/**
	 * Lite version slug.
	 *
	 * @var string Lite version slug.
	 */
	private $lite_slug;

	/**
	 * UTM link.
	 *
	 * @var string UTM link.
	 */
	private $utm;

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->theme     = wp_get_theme();
		$this->slug      = $this->theme->template;
		$this->lite_slug = $this->slug . '-lite';
		$this->utm      = '?utm_source=WordPress&utm_medium=link&utm_campaign=' . $this->slug;

		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_notices', array( $this, 'notice' ) );
	}

	/**
	 * Add theme dashboard page.
	 */
	public function add_menu() {
		$page = add_theme_page(
			$this->theme->name,
			$this->theme->name,
			'edit_theme_options',
			$this->slug,
			array( $this, 'render' )
		);
		add_action( "admin_print_styles-$page", array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Show dashboard page.
	 */
	public function render() {
		?>
		<div class="wrap">
			<div id="poststuff">
				<div id="post-body" class="columns-2">
					<div id="post-body-content">
						<div class="about-wrap">
							<?php include get_template_directory() . '/inc/dashboard/sections/welcome.php'; ?>
							<?php include get_template_directory() . '/inc/dashboard/sections/tabs.php'; ?>
							<?php include get_template_directory() . '/inc/dashboard/sections/getting-started.php'; ?>
							<?php include get_template_directory() . '/inc/dashboard/sections/actions.php'; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Enqueue scripts for dashboard page.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/inc/dashboard/css/slick.css' );
		wp_enqueue_style( "{$this->slug}-dashboard-style", get_template_directory_uri() . '/inc/dashboard/css/dashboard-style.css' );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/inc/dashboard/js/slick.js', array( 'jquery' ), '1.8.0', true );
		wp_enqueue_script( "{$this->slug}-dashboard-script", get_template_directory_uri() . '/inc/dashboard/js/script.js', array( 'slick' ), '', true );
	}

	/**
	 * Recommended Plugin Action.
	 */
	public function recommended_plugins_action() {
		$plugins        = business_lander_required_plugins();
		$plugins_number = count( $plugins );
		$installer      = TGM_Plugin_Activation::get_instance();
		$action         = array();

		if ( $plugins_number > 1 ) {
			$action['title'] = esc_html__( 'Install Recommended Plugins', 'business-lander' );
			/* translators: theme name. */
			$action['body']  = sprintf( esc_html__( '%s needs some plugins to working properly. Please install and activate our required plugins.', 'business-lander' ), $this->theme->name );
			$action['button_text'] = esc_html__( 'Install Plugins', 'business-lander' );
		} else {
			$plugin_name = $plugins[0]['name'];
			/* translators: theme name. */
			$action['body']        = sprintf( __( '%1$s needs %2$s to working properly. Please install and activate it.', 'business-lander' ), $this->theme->name, $plugin_name );
			/* translators: plugin name. */
			$action['button_text'] = sprintf( esc_html__( 'Install %s', 'business-lander' ), $plugin_name );
			$action['title']       = $action['button_text'];

		}

		if ( $installer->is_tgmpa_complete() ) {
			if ( $plugins_number > 1 ) {
				$action['body'] = '<strong>' . esc_html__( 'You have installed and active all required plugins', 'business-lander' ) . '</strong>';
			} else {
				/* translators: plugin name. */
				$action['body'] = sprintf( __( '<strong>%s has been installed and activated</strong>', 'business-lander' ), $plugin_name );
			}
			$action['button_text'] = '';
		}
		return $action;
	}

	/**
	 * Check if Jetpack is recommended
	 */
	public function jetpack_is_recommended() {
		$plugins = business_lander_required_plugins();
		foreach ( $plugins as $plugin ) {
			if ( 'jetpack' === $plugin['slug'] ) {
				return true;
			}
		}
	}

	/**
	 * Add a notice after theme activation.
	 */
	public function notice() {
		global $pagenow;
		if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
			?>
			<div class="updated notice notice-success is-dismissible">
				<p>
					<?php
					// Translators: theme name and welcome page.
					echo wp_kses_post( sprintf( __( 'Welcome! Thank you for choosing %1$s. To get started, visit our <a href="%2$s">welcome page</a>.', 'business-lander' ), $this->theme->name, esc_url( admin_url( 'themes.php?page=' . $this->slug ) ) ) );
					?>
				</p>
				<p>
					<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=' . $this->slug ) ); ?>">
						<?php
						// Translators: theme name.
						echo esc_html( sprintf( __( 'Get started with %s', 'business-lander' ), $this->theme->name ) );
						?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}
