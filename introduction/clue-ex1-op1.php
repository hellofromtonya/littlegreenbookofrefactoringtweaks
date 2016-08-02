<?php

function get_post_class( $class = '', $post_id = null ) {
	// omitted for brevity

	if ( is_ok_to_add_post_thumbnail_styling_class( $post, $post_password_required ) ) {
		$classes[] = 'has-post-thumbnail';
	}

	// omitted for brevity
}

/**
 * Checks if the conditions are right to add a post thumbnail styling class.
 *
 * @since 1.0.0
 *
 * @param WP_Post $post Instance of the post
 * @param bool $post_is_password_protected Flag for if the post is password protected.
 *
 * @return bool
 */
function is_ok_to_add_post_thumbnail_styling_class( $post, $post_is_password_protected ) {
	if ( $post_is_password_protected || is_attachment( $post ) ) {
		return false;
	}

	return current_theme_supports( 'post-thumbnails' ) &&
	       has_post_thumbnail( $post->ID );
}