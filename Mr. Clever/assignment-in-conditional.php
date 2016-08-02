<?php

/**
 * Retrieve the post type of the current post or of a given post.
 *
 * @since 2.1.0
 *
 * @param int|WP_Post|null $post Optional. Post ID or post object. Default is global $post.
 * @return string|false          Post type on success, false on failure.
 */
function get_post_type( $post = null ) {
	if ( $post = get_post( $post ) )
		return $post->post_type;

	return false;
}