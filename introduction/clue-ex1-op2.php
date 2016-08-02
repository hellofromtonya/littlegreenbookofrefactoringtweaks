<?php

function get_post_class( $class = '', $post_id = null ) {
	// omitted for brevity

	$post_thumbnail_styling_class = get_has_post_thumbnail_styling_class( $post, $post_password_required ) ;
	if ( $post_thumbnail_styling_class ) {
		$classes[] = $post_thumbnail_styling_class;
	}

	// omitted for brevity
}

/**
 * Returns the styling class for the post thumbnail if the conditions for this post are set.
 * Otherwise it returns false.
 *
 * @since 1.0.0
 *
 * @param WP_Post $post Instance of the post
 * @param bool $post_is_password_protected Flag for if the post is password protected.
 * @param string $styling_class (Optional) Styling class to return if the conditions are set.
 *
 * @return string|bool
 */
function get_has_post_thumbnail_styling_class( $post, $post_is_password_protected, $styling_class = 'has-post-thumbnail' ) {

	if ( is_attachment( $post ) || $post_is_password_protected ) {
		return false;
	}

	if ( ! current_theme_supports( 'post-thumbnails' ) || ! has_post_thumbnail( $post->ID ) ) {
		return false;
	}

	return $styling_class;
}