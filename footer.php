<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bussiness-lander
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</div>
		</div>
		<div class="bottombar">
			<div class="container">
				<span>greta business pro. designed by tung do</span>
				<div class="share">
					<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
					<a href="https://www.facebook.com/"><i class="fa fa-twitter"></i></a>
					<a href="https://www.facebook.com/"><i class="fa fa-google-plus"></i></a>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->
<a href="" class="scroll-to-top hidden"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>
