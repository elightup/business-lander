<?php
/**
 * Template part for displaying contact.
 *
 * @package business-lander
 */

$front_page_id = get_option( 'page_on_front' );
$image         = get_the_post_thumbnail_url( $front_page_id, 'full' );
if ( $image ) {
	$image = ' style="background-image: url(' . esc_url( $image ) . ')"';
}
?>
<section class="section--contact"<?php echo $image; // WPCS: XSS OK. ?>>
	<div class="container">
		<div class="section-contact__left">
			<div class="contact__left">
				<div class="title">
					<h2><?php echo esc_html( get_the_title( $front_page_id ) ); ?></h2>
				</div>
				<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $front_page_id ) ); ?>
			</div>
		</div>
		<div class="section-contact__right">
			<div class="contact__right">
				<?php
				$contact_page = get_theme_mod( 'contact_page' );
				if ( $contact_page ) {
						?>
						<h3 class="title"><?php echo esc_html( get_the_title( $contact_page ) ); ?></h3>
						<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $contact_page ) ); ?>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
