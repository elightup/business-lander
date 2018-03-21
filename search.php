<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bussiness-lander
 */

get_header(); ?>


<main id="main" class="site-main">

	<div class="section--archive-posts sidebar">
		<div id="main" class="row col-1">
			<h2 class="blog-title"><?php
				/* translators: search query */
				printf( esc_html__( 'Search Results for: %s', 'bussiness-lander' ), esc_html( get_search_query() ) ); ?></h2>
			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		</div>
	</div>
	<?php get_sidebar();?>
</main><!-- #main -->


<?php

get_footer();
