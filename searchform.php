<?php
/**
 * The template for displaying custom search form
 *
 * @package business-lander
 */

?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input class="form-control search-field" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Enter your Keyword', 'business-lander' ); ?>"/>
	<button type="submit" class="search-submit">
		<i class="fa fa-search"></i>
		<span class="screen-reader-text"><?php echo esc_html__( 'Search', 'business-lander' ) ?></span>
	</button>
</form>
