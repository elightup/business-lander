<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

get_header(); ?>
<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$sidebar = 1;
	}
	else {
		$sidebar = 0;
	}
	$blog_style = get_theme_mod( 'blog_style',0 );
?>
<?php if ( $sidebar == 0 && $blog_style == 1) : ?>
	<div id="primary" class="content-area">
<?php endif; ?>

	<main class="site-main" role="main">
		<?php
			if ( $blog_style == 1) :
				get_template_part( 'template-parts/content', 'blogfull' );
			else :
				get_template_part( 'template-parts/content', 'blog' );
			endif;
		?>

	<?php if ( $sidebar == 1) :
			get_sidebar();
		endif; ?>
	</main><!-- .site-main -->

<?php if ( $sidebar == 0 && $blog_style == 1) : ?>
	</div><!-- .content-area -->
<?php endif; ?>

<?php
get_footer();
