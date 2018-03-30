<?php
/**
 * Template part for displaying contact.
 *
 * @package business-lander
 */

?>

<?php

$contact_bg_default = get_template_directory_uri() . '/images/contact-bg.png';

$contact_pages = get_theme_mod( 'front_page_contact');

if ( ! $contact_pages ) {
	return;
}

$image = get_theme_mod( 'contact_section_img', $contact_bg_default );

$query = new WP_Query( array(
	'post_type' => 'page',
	'page_id'   => $contact_pages,

) );

if ( ! $query->have_posts() ) {
	return;
}

$query1 = new WP_Query( array(
	'post_type' => 'post',
	'p'         => 148,

) );

?>
<section class="section--contact" style="background-image: url( <?php echo esc_url( $image ) ?> )">
	<div class="container">
		<div class="section-contact__left">
			<div class="contact__left">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div>
						<h2 class="name"><?php the_title();?></h2>
					</div>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
		<div class="section-contact__right">
			<div class="contact__right">
				<?php while ( $query1->have_posts() ) : $query1->the_post(); ?>
					<h3 class="title"><?php the_title();?></h3>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>