<?php
/**
 * Template part for displaying feature page 2.
 *
 * @package bussiness-lander
 */

?>

<?php


$feature_page_2 = get_theme_mod( 'feature_page_2');

if ( ! $feature_page_2 ) {
	return;
}

$query = new WP_Query( array(
	'post_type'      => 'page',
	'page_id'       => $feature_page_2,

) );

if ( ! $query->have_posts() ) {
	return;
}

?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<section class="features-page-2">
		<div class="container">
			<div class="page-2">
				<div>
					<h3 class="page-2__name"><?php the_title();?></h3>
				</div>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink();?>" class="page-2__continue">learn more</a>
			</div>
			<?php the_post_thumbnail();?>
		</div>
	</section>
<?php endwhile; ?>