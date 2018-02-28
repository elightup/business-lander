<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bussiness-lander
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
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bussiness-lander' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="header-content">

				<nav id="site-navigation" class="main-navigation">
					<div class="container">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bussiness-lander' ); ?></button>
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
							if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
						</div>
					</div>

				</div><!-- .site-branding -->
			</div>

	</div>
</header><!-- #masthead -->

<div id="content" class="site-content">
