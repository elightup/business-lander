<?php
/**
 * The template part for displaying cta section on front page
 *
 * @package bussiness-lander
 */

$cta_title = get_theme_mod( 'cta_title', __( 'Expect the extraordinary', 'bussiness-lander' ) );
$cta_text = get_theme_mod( 'cta_text', __( 'We are A Team of Experts', 'bussiness-lander' ) );
$cta_button_url = get_theme_mod( 'cta_button_url', 'https://gretathemes.com/' );
$cta_button_text = get_theme_mod( 'cta_button_text', __( 'contact us', 'bussiness-lander' ) );
$cta_bg = get_theme_mod( 'cta_background', get_template_directory_uri() . '/images/cta-bg.png' );
?>

<section class="section--cta" style="background-image: url( <?php echo esc_url( $cta_bg ); ?> )">
	<div class="container">
		<div class="section-cta__title">
			<?php echo esc_html( $cta_title ); ?>
		</div>
		<div class="section-cta__text">
			<?php echo esc_html( $cta_text ); ?>
		</div>
		<div class="section-cta__link">
			<a href="<?php echo esc_url( $cta_button_url ); ?>" alt="<?php echo esc_html( $cta_button_text ) ?>"  class="btn btn-primary">
				<?php echo esc_html( $cta_button_text ); ?>
			</a>
		</div>
	</div>
</section>
