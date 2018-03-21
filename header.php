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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bussiness-lander' ); ?></a>

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

				<nav class="mobile-navigation" role="navigation">
					<?php
					wp_nav_menu( array(
						'container_class' => 'mobile-menu container',
						'menu_class'      => 'mobile-menu clearfix',
						'theme_location'  => 'menu-1',
					) );
					?>
				</nav>

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
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'bussiness-lander' ); ?></button>
			<div class="site-address">
				<div class="header-info">
					<i aria-hidden="true" class="fa fa-map-marker"></i>
					<p class="address">1234 internet street virtual city, statename 54321</p>
				</div>
			</div>
			<div class="site-info">
				<div class="site-phone">
					<div class="header-info">
						<i aria-hidden="true" class="fa fa-phone"></i>
						<p class="address">+84 987-248-558</p>
					</div>
				</div>
				<div class="site-email">
					<div class="header-info">
						<i aria-hidden="true" class="fa fa-envelope"></i>
						<p class="address">info@elightup.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</header><!-- #masthead -->

<?php if ( ! is_front_page() && !is_home() && !is_archive() && !is_404() && !is_search() ) : ?>
	<div class="page-header">
		<?php bussiness_lander_breadcrumb();?>
		<?php if ( is_single() && 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php bussiness_lander_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</div>

<?php endif; ?>

<?php if ( ! is_home() && is_front_page() ) : ?>
	<div id="content" class="site-content">
	<?php else : ?>
		<div id="content" class="site-content container">
		<?php endif; ?>
