<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bussiness-lander
 */

?>

<section class="no-results not-found">
	<h2><?php esc_html_e( 'Nothing Found', 'bussiness-lander' ); ?></h2>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
			/* translators: creat post page url */
			printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bussiness-lander' ), array(
				'a' => array(
				'href' => array(),
				),
			) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bussiness-lander' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bussiness-lander' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
