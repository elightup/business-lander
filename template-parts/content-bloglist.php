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
if ( ! business_lander_jetpack_featured_image_archive_display() || ! has_post_thumbnail() ) {
?>
	<span class="line"></span>
<?php
}
else {
	business_lander_post_thumbnail();
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta-blog">
				<?php business_lander_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-lander' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

		<?php echo business_lander_category_tag(); ?>

</article><!-- #post-## -->
