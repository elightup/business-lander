<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business-lander
 */

?>
</div>
<footer id="colophon" class="site-footer">
	<div class="footer-widgets">
		<div class="container">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
	</div>
	<div class="bottombar">
		<div class="container">
			<span>
				<?php
					$copyright_default = __( '<a href="https://wordpress.org/">Proudly powered by WordPress.</a> Theme: Business Lander by <a href="https://gretathemes.com/" rel="designer">GretaThemes</a>.', 'business-lander' );
					$copyright = get_theme_mod( 'footer_copyright', $copyright_default );
					echo wp_kses_post( $copyright );
				?>
			</span>

				<?php
				if ( function_exists( 'jetpack_social_menu' ) ) {
					jetpack_social_menu();
				}
				?>

		</div>
	</div>

</footer><!-- #colophon -->
</div><!-- #page -->
<a href="" class="scroll-to-top hidden"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>
