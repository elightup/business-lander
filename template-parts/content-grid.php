<?php
/**
 * Template part for displaying blog content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>
<div class="blog-article">
	<article class="archive-post">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>">
				<div class="image">
					<?php the_post_thumbnail(); ?>
					<?php if ( is_sticky() ) : ?>
						<i class="fas fa-star"></i>
					<?php endif; ?>
				</div>
			</a>
		<?php endif; ?>
		<div class="post-info">
			<?php the_title( '<h3 class="post-info-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			<?php
			business_lander_posted_on();
			the_excerpt();
			?>
			<a class="post-continue" href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Continue Reading', 'business-lander' ); ?></a>
		</div>
	</article>
</div>
