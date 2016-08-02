<?php

function get_post_class( $class = '', $post_id = null ) {
	// omitted for brevity

	// Post thumbnails.
	if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID ) && ! is_attachment( $post ) && ! $post_password_required ) {
		$classes[] = 'has-post-thumbnail';
	}

	// omitted for brevity
}
