<?php
/**
 * The template part for displaying cta section on front page
 *
 * @package business-lander
 */

$cta_title = get_theme_mod( 'cta_title', __( 'Expect the extraordinary', 'business-lander' ) );
$cta_text = get_theme_mod( 'cta_text', __( 'We are A Team of Experts', 'business-lander' ) );
$cta_button_url = get_theme_mod( 'cta_button_url', 'https://gretathemes.com/' );
$cta_button_text = get_theme_mod( 'cta_button_text', __( 'contact us', 'business-lander' ) );
$cta_bg = get_theme_mod( 'cta_background', get_template_directory_uri() . '/images/bg-cta.jpg' );
?>

<section class="section--cta" style="background-image: url( <?php echo esc_url( $cta_bg ); ?> )">
	<div class="container">
		<h3 class="section-cta__title">
			<?php echo esc_html( $cta_title ); ?>
		</h3>
		<p class="section-cta__text">
			<?php echo esc_html( $cta_text ); ?>
		</p>
		<div class="section-cta__link">
			<a href="<?php echo esc_url( $cta_button_url ); ?>" alt="<?php echo esc_html( $cta_button_text ); ?>"  class="btn btn-primary">
				<?php echo esc_html( $cta_button_text ); ?>
			</a>
		</div>
	</div>
</section>
