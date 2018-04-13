<?php
/**
 * Getting started section.
 *
 * @package business-lander
 */

?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Step 1 - Install The Required Plugins', 'business-lander' ); ?></h3>
			<p><?php esc_html_e( 'Business Lander needs some plugins to working properly. Please install and activate our required plugins.', 'business-lander' ); ?></p>
			<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins&plugin_status=install' ) ); ?>">Install Plugins</a>

			<h3><?php esc_html_e( 'Step 2 - Connect Your Site To Jetpack', 'business-lander' ); ?></h3>
			<p><?php esc_html_e( 'Business Lander uses Jetpack to support testimonial. Connect to Jetpack to use these two features as well as variety of other tools.', 'business-lander' ); ?></p>
			<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=jetpack#/dashboard' ) ); ?>">Connect To Jetpack </a>

			<h3><?php esc_html_e( 'Step 3 - Import Demo Data (Optional)', 'business-lander' ); ?></h3>
			<p><?php esc_html_e( 'Import demo data if you want your website exactly the same as our demo.', 'business-lander' ); ?></p>
			<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ); ?>">Import Demo Now</a>
		</div>
		<div class="col">
			<h3><?php esc_html_e( 'Customize The Theme', 'business-lander' ); ?></h3>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'business-lander' ); ?></p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'business-lander' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Read Full Documentation', 'business-lander' ); ?></h3>
			<p class="about"><?php esc_html_e( 'Need any helps to setup and configure the theme? Please check our full documentation for detailed information on how to use it.', 'business-lander' ); ?></p>
			<p>
				<a href="<?php echo esc_url( "https://gretathemes.com/docs/business-lander/?utm_source=theme_dashboard&utm_medium=docs_link&utm_campaign={$this->slug}_dashboard" ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Read Documentation', 'business-lander' ); ?></a>
			</p>
		</div>
	</div>
</div>
