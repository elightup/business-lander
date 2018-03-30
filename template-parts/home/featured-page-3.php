<?php
/**
 * Template part for displaying featured page 3.
 *
 * @package business-lander
 */

?>

<?php


$featured_page_3 = get_theme_mod( 'featured_page_3');

if ( ! $featured_page_3 ) {
	return;
}

$query = new WP_Query( array(
	'post_type' => 'page',
	'page_id'   => $featured_page_3,

) );

if ( ! $query->have_posts() ) {
	return;
}

?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<section class="featured-page-3">
		<div class="container">
			<?php the_post_thumbnail();?>
			<div class="page-3">
				<div>
					<h3 class="page-3__name"><?php the_title();?></h3>
				</div>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink();?>" class="page-3__continue"><?php echo esc_html('learn more');?></a>
			</div>
		</div>
	</section>
<?php endwhile; ?>