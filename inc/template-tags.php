<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package business-lander
 */

/**
 * Auto add more links.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function business_lander_content_more() {
	/* translators: string replaced with the html */
	$text = wp_kses_post( sprintf( __( 'Read more %s', 'business-lander' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' ) );
	$more = sprintf( '<p class="link-more"><a href="%s#more-%d" class="more-link btn btn-primary">%s</a></p>', esc_url( get_permalink() ), get_the_ID(), $text );

	return $more;
}

add_filter( 'the_content_more_link', 'business_lander_content_more' );

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function business_lander_posted_on() {
	global $post;

	if ( ! is_object( $post ) ) {
		return;
	}

	$author_id = $post->post_author;
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</a></span>';

	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
}

/**
 * Prints HTML with meta information for author
 */
function business_lander_show_author() {
	$author_name = get_the_author();
	echo '<span class="by-author"><i class="fa fa-user"></i>by <a class="url fn n" href="'
		. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="bookmark">'
		. esc_html( $author_name )
		. '</a></span>';
}


/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function business_lander_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'business-lander' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="post-category">%1$s</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'business-lander' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="post-tag">%1$s</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
}

