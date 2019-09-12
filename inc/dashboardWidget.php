<?php
/**
 * The dashboard widget that display latest news/tutorials 
 *
 * @package    Bayn
 */

class DashboardWidget {
	public $feed_url = 'https://metabox.io/feed/';

	public function __construct() {
		$option = get_option( 'business-lander' );
		if ( isset( $option['dashboard_widget'] ) && ! $option['dashboard_widget'] ) {
			return;
		}
		add_action( 'wp_dashboard_setup', array( $this, 'register' ) );
	}

	public function register() {
		wp_add_dashboard_widget( 'meta_box_dashboard_widget', esc_html__( 'Meta Box News and Tutorials', 'business-lander' ), array( $this, 'render' ) );
	}

	public function render() {
		echo '<div class="rss-widget">';
		wp_widget_rss_output( $this->feed_url, array( 'items' => 10 ) );
		echo '</div>';
	}
}

new DashboardWidget();