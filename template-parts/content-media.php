<?php
/**
 * Template part for displaying media content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-lander
 */

?>

<div class="entry-content">
	<?php
	if ( in_array( get_post_format(), array( 'audio', 'video' ), true ) ) {
		$media        = get_media_embedded_in_content(
			$main_content, array(
				'audio',
				'video',
				'object',
				'embed',
				'iframe',
			)
		);
		$main_content = str_replace( $media, '', $main_content );
	}

