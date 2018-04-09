<?php
/**
 * Template part for displaying blog content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>
<article class="archive-post">
	<a href="<?php the_permalink(); ?>">
		<div class="image">
			<?php
			the_post_thumbnail();
			if ( is_sticky() ) :
			?>
				<i class="fa fa-star"></i>
			<?php endif; ?>
		</div>
	</a>
	<div class="post-info">
		<?php the_title( '<h3 class="post-info-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>' ); ?>
		<?php
		business_lander_posted_on();
		the_excerpt();
		?>
		<a class="post-continue" href="<?php the_permalink(); ?>"><?php echo esc_html( 'Continue Reading' ); ?></a>
	</div>
</article>
