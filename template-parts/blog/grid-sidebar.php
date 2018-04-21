<?php
/**
 * Custom CSS for blog grid.
 *
 * @package business-lander
 */

?>
<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) :
	$no_sidebar = 'no-sidebar';
endif;
$blog_id = get_cat_ID( 'Blog' );
?>

<main class="site-main <?php echo esc_html( $no_sidebar ); ?>" role="main">
	<div class="section--archive-posts ">
		<div class="grid-title">
			<?php
			if ( is_home() && ! is_front_page() ) :

			?>
			<h2 class="blog-title"><?php single_post_title(); ?></h2>
			<?php
				echo category_description( $blog_id );
			else :
			?>
			<h2 class="blog-title"><?php the_archive_title(); ?></h2>
			<?php
			the_archive_description( '<div class="archive-description">', '</div>' );
			endif;
			?>

		</div>
		<div id="main" class="row col-2">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'bloggrid' );
				endwhile;
				?>
			</div>
			<?php
			the_posts_pagination(
				array(
					'prev_text' => __( 'newer posts', 'business-lander' ),
					'next_text' => __( 'older posts', 'business-lander' ),
				)
			);
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>
</main><!-- .site-main -->
<?php
get_sidebar();
?>
