<?php
/**
 * Custom CSS for blog grid.
 *
 * @package business-lander
 */

?>
	<main class="site-main" role="main">
		<h2 class="blog-title"><?php single_post_title(); ?></h2>
		<p class="blog-description"><?php echo esc_html( get_theme_mod( 'blog_grid_text', __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', 'business-lander' ) ) ); ?></p>
		<div class="section--archive-posts">
			<div id="main" class="row col-3">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'bloggrid' );
					endwhile;
				?>
			</div>
			<?php
			the_posts_pagination( array(
				'prev_text' => __( 'newer posts' ),
				'next_text' => __( 'older posts' ),
			) );
			?>
		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>
</main><!-- .site-main -->
</div>