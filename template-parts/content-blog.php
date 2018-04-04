<?php
/**
 * Template part for displaying blog content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="section--archive-posts sidebar">
			<h2 class="blog-title"><?php single_post_title(); ?></h2>
			<div id="main" class="row col-2">
	<?php else : ?>
		<h2 class="blog-title"><?php single_post_title(); ?></h2>
		<p class="blog-description"><?php echo esc_html( get_theme_mod( 'blog_grid_text', __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', 'business-lander' ) ) ); ?></p>
		<div class="section--archive-posts">
			<div id="main" class="row col-3">
	<?php endif; ?>

				<?php if ( have_posts() ) :
				 	while ( have_posts() ) : the_post(); ?>
					<div class="archive-post">
						<a href="<?php the_permalink(); ?>">
							<div class="image">
								<?php the_post_thumbnail();
								if ( is_sticky() ) : ?>
									<i class="fa fa-star"></i>
								<?php endif;?>
							</div>
						</a>
						<div class="post-info">
							<?php the_title( '<h3 class="post-info-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>' );?>
							<?php
							business_lander_posted_on();
							the_excerpt();
							?>
							<a class="post-continue" href="<?php the_permalink();?>"><?php echo esc_html('Continue Reading');?></a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php
			the_posts_pagination( array(
				'prev_text' => __('newer posts'),
				'next_text' => __('older posts'),
			) );
			?>
		<?php else :
		get_template_part( 'template-parts/content', 'none' );
		endif; ?>
	</div>