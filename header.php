<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business-lander
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-lander' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="header-content">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="container">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</div>
				</nav><!-- #site-navigation -->

				<div class="container">
					<div class="site-branding">
						<div class="site-logo">
							<?php
							if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								the_custom_logo();
							}
							?>
							<div class="site-identify">
								<?php
								if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;

							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div><!-- .site-branding -->
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" ><?php esc_html_e( 'Menu', 'business-lander' ); ?></button>

			<!-- header-address -->
			<?php if ( get_theme_mod( 'header_address' ) ) : ?>
				<div class="site-address">
					<i class="fa fa-map-marker"></i>
					<p class="address"><?php echo esc_html( get_theme_mod( 'header_address', __( '1234 internet street virtual city, statename 54321', 'business-lander' ) ) ); ?></p>
				</div>
			<?php endif; ?>

			<!-- header-phone & header-email -->
			<?php if ( get_theme_mod( 'header_phone' ) || get_theme_mod( 'header_email' ) ) : ?>

				<div class="site-info">
					<?php if ( get_theme_mod( 'header_phone' ) ) : ?>
						<div class="site-phone">
							<div class="header-info">
								<i class="fa fa-phone"></i>
								<p class="address"><?php echo esc_html( get_theme_mod( 'header_phone', __( '+84 987-248-558', 'business-lander' ) ) ); ?></p>
							</div>
						</div>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'header_email' ) ) : ?>
						<div class="site-email">
							<div class="header-info">
								<i class="fa fa-envelope"></i>
								<p class="address"><?php echo esc_html( get_theme_mod( 'header_email', __( 'info@elightup.com', 'business-lander' ) ) ); ?></p>
							</div>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header><!-- #masthead -->
<?php
if ( is_singular() && ! is_front_page() ) :
?>
	<div class="page-header">
		<?php business_lander_breadcrumb(); ?>
		<?php if ( is_single() ) : ?>
			<div class="entry-meta">
				<?php business_lander_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if ( ! is_home() && is_front_page() ) : ?>
	<div id="content" class="site-content">
<?php else : ?>
	<div id="content" class="site-content container">
<?php endif; ?>
