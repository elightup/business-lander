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
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="site-address">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<div class="site-info">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div>
			<?php endif; ?>
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
