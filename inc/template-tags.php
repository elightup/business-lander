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
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'F j Y' ) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( '%s', 'post author', 'business-lander' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

			echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

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
 * Prints HTML with meta information for the category and tag.
 */
function business_lander_category_tag() {
	$category_detail = get_the_category();// $post->ID
	foreach ( $category_detail as $cd ) {
		$category_name  = $cd->cat_name;
		$category_link .= '<a href="' . esc_url( get_category_link( $cd->cat_ID ) ) . '">' . $category_name . '</a>';
	}

		$category = '<span class="post-category"> ' . $category_link . '</span>';

		$post_tags = get_the_tags();

	if ( $post_tags ) {
		foreach ( $post_tags as $tag ) {
			$tags       = $tag->name;
			$tags_link .= '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . $tags . '</a>';
		}

		$category .= '<span class="post-tag"> ' . $tags_link . '</span>';
	}
		echo $category;
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
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'business-lander' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'business-lander' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'business-lander' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'business-lander' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'business-lander' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
}

/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function business_lander_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() || is_home() || is_archive() ) :
		?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php else : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
			<?php
			the_post_thumbnail( 'medium' );
			?>
		</a>
	<?php
	endif; // End is_singular().
}

