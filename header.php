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
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-lander' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="header-content">
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
								<p class="site-description">
									<?php echo esc_html( $description ); ?>
								</p>
								<?php endif; ?>
							</div>
						</div>
					</div><!-- .site-branding -->
					<button class="menu-toggle menu-toggle--open" aria-controls="primary-menu" aria-expanded="false" >
						<?php esc_html_e( 'Menu', 'business-lander' ); ?>
					</button>

					<!-- header-address -->
					<div class="site-address">
						<i class="fas fa-map-marker-alt"></i>
						<p class="address"><?php echo esc_html( get_theme_mod( 'header_address', __( '637 SW. Indian Summer Street West Orange, NJ 07052', 'business-lander' ) ) ); ?></p>
					</div>

					<!-- header-phone & header-email -->
					<div class="site-info">
						<div class="site-phone">
							<div class="header-info">
								<i class="fa fa-phone"></i>
								<p class="address"><?php echo esc_html( get_theme_mod( 'header_phone', __( '+1-317-290-1883', 'business-lander' ) ) ); ?></p>
							</div>
						</div>

						<div class="site-email">
							<div class="header-info">
								<i class="fa fa-envelope"></i>
								<p class="address"><?php echo esc_html( get_theme_mod( 'header_email', __( 'info@company.com', 'business-lander' ) ) ); ?></p>
							</div>
						</div>
					</div>
				</div>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle menu-toggle--close" aria-controls="primary-menu" aria-expanded="false" >
						<?php esc_html_e( 'Close', 'business-lander' ); ?>
					</button>
					<div class="container">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->

<?php
$no_thumbnail = '';
if ( ! has_post_thumbnail() ) {
	$no_thumbnail = 'no-thumbnail';
}
?>
<?php if ( is_singular() && ! is_front_page() ) : ?>
	<div class="page-header <?php echo esc_attr( $no_thumbnail ); ?>">
		<?php
		if ( ! has_post_thumbnail() ) {
			the_title( '<div class="title"><h2 class="page-title title-black">', '</h2></div>' );
		} else {
			the_title( '<div class="title"><h2 class="page-title">', '</h2></div>' );
			echo '<div class="post-thumbnail">';
			the_post_thumbnail( 'full' );
			echo '</div>';
		}
		?>
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
