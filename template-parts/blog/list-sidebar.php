<?php
/**
 * Custom CSS for blog list.
 *
 * @package business-lander
 */

?>
<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) :
	$no_sidebar = 'no-sidebar';
	endif;
?>
<main class="site-main <?php echo esc_html( $no_sidebar ); ?>" role="main">
	<div class="section--archive-posts">
		<div id="main" class="row col-1">
			<h2 class="blog-title"><?php single_post_title(); ?></h2>
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'bloglist' );
				endwhile;
			?>
		</div>
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => __( 'newer posts', 'business-lander' ),
					'next_text' => __( 'older posts', 'business-lander' ),
				)
			);
			?>
			<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
	</div>
</main><!-- .site-main -->
<?php get_sidebar(); ?>

