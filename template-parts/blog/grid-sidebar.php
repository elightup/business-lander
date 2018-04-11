<?php
/**
 * Custom CSS for blog grid.
 *
 * @package business-lander
 */

?>

<main class="site-main sidebar" role="main">
	<div class="section--archive-posts ">
		<h2 class="blog-title"><?php single_post_title(); ?></h2>
		<div id="main" class="row col-2">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'bloggrid' );
				endwhile;
			?>
		</div>
			<?php
			the_posts_pagination( array(
				'prev_text' => __( 'newer posts' ),
				'next_text' => __( 'older posts' ),
			) );
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
	</div>
</main><!-- .site-main -->
<?php get_sidebar(); ?>
</div>