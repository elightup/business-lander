<?php
/**
 * Template part for displaying blogfull content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>

<?php
if ( function_exists( 'business_lander_jetpack_featured_image_archive_display' ) ) :
	if ( business_lander_jetpack_featured_image_archive_display() || has_post_thumbnail() ) :
		business_lander_post_thumbnail();
	endif;
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta-blog">
				<?php business_lander_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();
		?>
		<div class="pagelink"><?php wp_link_pages( 'pagelink=<span>%</span>' ); ?></div>
	</div><!-- .entry-content -->

		<?php echo esc_html( business_lander_category_tag() ); ?>

</article><!-- #post-## -->
