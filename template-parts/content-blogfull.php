<?php
/**
 * Template part for displaying blogfull content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="section--archive-posts sidebar">
		<div id="main" class="row col-1">
<?php else : ?>
	<div class="section--archive-posts">
		<div id="main" class="row col-1">
<?php endif; ?>
			<h2 class="blog-title"><?php single_post_title(); ?></h2>
				<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>

				<?php
				if ( !business_lander_jetpack_featured_image_archive_display() || !has_post_thumbnail()) {
				?>
					<span class="line"></span>
				<?php
					}
					else {
						business_lander_post_thumbnail();
					}
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h3>' );?>
						<?php if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta-blog">
								<?php business_lander_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

					<?php
						$main_content = apply_filters( 'the_content', get_the_content() );
					?>

					<?php if ( strpos( $main_content, 'link-more' ) ) : ?>
						<div class="entry-content has-link-more">
						<?php else : ?>
							<div class="entry-content">
							<?php endif; ?>

							<?php
							if ( in_array( get_post_format(), array( 'audio', 'video' ), true ) ) {
								$media = get_media_embedded_in_content( $main_content, array(
									'audio',
									'video',
									'object',
									'embed',
									'iframe',
								) );
								$main_content = str_replace( $media, '', $main_content );
							}

							echo $main_content; /* WPCS: xss ok. */

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'greentech' ),
								'after'  => '</div>',
							) );
							?>
						</div><!-- .entry-content -->
						<?php echo business_lander_category_tag(); ?>
					</article><!-- #post-## -->
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