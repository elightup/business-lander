<?php
/**
 * Template part for displaying contact.
 *
 * @package bussiness-lander
 */

?>

<?php


$feature_page_1 = get_theme_mod( 'feature_page_1');

if ( ! $feature_page_1 ) {
	return;
}

$query = new WP_Query( array(
	'post_type'      => 'page',
	'page_id'       => $feature_page_1,

) );

if ( ! $query->have_posts() ) {
	return;
}

?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<section class="features-page-1" style="background-image: url( <?php the_post_thumbnail_url(); ?> )">
		<div class="container">
			<div class="page-1">
				<div>
					<h3 class="page-1__name"><?php the_title();?></h3>
				</div>

				<?php the_excerpt(); ?>
				<a href="<?php the_permalink();?>" class="page-1__continue">learn more</a>
			</div>
		</div>
	</section>
<?php endwhile; ?>