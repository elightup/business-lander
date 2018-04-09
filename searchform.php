<?php
/**
 * The template for displaying custom search form
 *
 * @package business-lander
 */

?>


<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input class="form-control search-field" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Enter your Keyword', 'business-lander' ); ?>"/>
	<input type="submit" class="search-submit" value="Search">
</form>