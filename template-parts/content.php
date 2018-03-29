<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'business-lander' ),
				array(
						'span' => array(
							'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		?>

	<div id="content" class="site-content container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<div class="pagelink"><?php wp_link_pages('pagelink=<span>%</span>'); ?></div>
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->
