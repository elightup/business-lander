<?php
/**
 * Template part for displaying contact.
 *
 * @package business-lander
 */

?>
<section class="section--contact" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?> )">
	<div class="container">
		<div class="section-contact__left">
			<div class="contact__left">
				<?php the_post(); ?>
				<div class="title">
					<h2><?php the_title(); ?></h2>
				</div>
				<?php the_content(); ?>
			</div>
		</div>
		<div class="section-contact__right">
			<div class="contact__right">
				<?php
				$contact_page = get_theme_mod( 'contact_form' );
				$query        = new WP_Query( array(
					'post_type' => 'page',
					'page_id'   => $contact_page,
				) );
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<h3 class="title"><?php the_title(); ?></h3>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
