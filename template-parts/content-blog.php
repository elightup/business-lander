<?php
/**
 * Template part for displaying blog content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bussiness-lander
 */

?>
<h2 class="blog-title">Archive</h2>
<p class="blog-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
	<?php if ( $sidebar == 1 ) : ?>
		<div class="section--archive-posts sidebar">
			<div id="main" class="row col-2">
	<?php else : ?>
		<div class="section--archive-posts">
			<div id="main" class="row col-3">
	<?php endif; ?>

				<?php if ( have_posts() ) :
				 	while ( have_posts() ) : the_post(); ?>
					<div class="archive-post">
						<a href="<?php the_permalink(); ?>">
							<div class="image"><?php the_post_thumbnail(); ?></div>
						</a>
						<div class="post-info">
							<?php the_title( '<h3 class="post-info-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>' );?>
							<?php
							bussiness_lander_posted_on();
							the_excerpt();
							?>
							<a class="post-continue" href="<?php the_permalink();?>">Continue Reading</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php
			the_posts_pagination( array(
				'prev_text' => __('older posts'),
				'next_text' => __('newer posts'),
			) );
			?>
		<?php else :
		get_template_part( 'template-parts/content', 'none' );
		endif; ?>
	</div>