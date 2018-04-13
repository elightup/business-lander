<?php
/**
 * Template part for displaying contact.
 *
 * @package business-lander
 */

?>

<?php
$frontpage_id = get_option( 'page_on_front' );
$bg_contact   = get_the_post_thumbnail_url( $frontpage_id );
$query        = new WP_Query(
	array(
		'post_type' => 'page',
		'page_id'   => $frontpage_id,
	)
);

if ( ! $query->have_posts() ) {
	return;
}

$post   = get_theme_mod( 'contact_form' );
$query1 = new WP_Query(
	array(
		'post_type' => 'page',
		'page_id'   => $post,
	)
);

if ( ! $query1->have_posts() ) {
	return;
}

?>
<section class="section--contact" style="background-image: url( <?php echo esc_url( $bg_contact ); ?> )">
	<div class="container">
		<div class="section-contact__left">
			<div class="contact__left">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
?>
					<div class="title">
						<h2><?php the_title(); ?></h2>
					</div>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
		<div class="section-contact__right">
			<div class="contact__right">
				<?php
				while ( $query1->have_posts() ) :
					$query1->the_post();
?>
					<h3 class="title"><?php the_title(); ?></h3>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
