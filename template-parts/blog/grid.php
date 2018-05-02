<?php
/**
 * Custom CSS for blog grid.
 *
 * @package business-lander
 */

$no_sidebar = is_active_sidebar( 'sidebar-1' ) ? '' : 'no-sidebar';
?>

<main class="site-main <?php echo esc_attr( $no_sidebar ); ?>" role="main">
	<div class="blog-grid">
		<div class="grid-title">
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<h2 class="page-title"><?php single_post_title(); ?></h2>
			<?php elseif ( is_search() ) : ?>
				<h2 class="page-title">
					<?php
					/* translators: search query */
					printf( esc_html__( 'Search Results for: %s', 'business-lander' ), esc_html( get_search_query() ) );
					?>
				</h2>
			<?php else : ?>
				<h2 class="page-title"><?php the_archive_title(); ?></h2>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			<?php endif; ?>
		</div>
		<?php if ( have_posts() ) : ?>
			<div class="row col-2">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'grid' );
				endwhile;
				?>
			</div>
			<?php
			the_posts_pagination( array(
				'prev_text' => __( 'Newer posts', 'business-lander' ),
				'next_text' => __( 'Older posts', 'business-lander' ),
			) );
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>
</main><!-- .site-main -->
<?php
get_sidebar();
