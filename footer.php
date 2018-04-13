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

<footer id="colophon" class="site-footer">
	<div class="footer-widgets">
		<div class="container">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
	</div>
	<div class="bottombar">
		<div class="container">
			<span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'business-lander' ) ); ?>">
					<?php
					/* translators: placeholder replaced with string */
					printf( esc_html__( 'Proudly powered by %s. ', 'business-lander' ), 'WordPress' );
					?>
				</a>
				<?php
				/* translators: placeholder replaced with string */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'business-lander' ), 'Business Lander', '<a href="https://gretathemes.com/" rel="designer">GretaThemes</a>' );
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
