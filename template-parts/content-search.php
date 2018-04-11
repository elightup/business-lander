<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>

<!-- <span class="line"></span> -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta-blog">
				<?php business_lander_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	$main_content = apply_filters( 'the_content', get_the_content() );
	?>

	<?php
			get_template_part( 'template-parts/content', 'media' );
			echo $main_content; /* WPCS: xss ok. */
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-lander' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<?php echo business_lander_category_tag(); ?>
	</article><!-- #post-## -->
