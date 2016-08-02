<?php

function get_post_class( $class = '', $post_id = null ) {
	// omitted for brevity

	set_post_thumbnail_styling_class( $classes, $post, $post_password_required );

	// omitted for brevity
}

/**
 * Sets the post thumbnail styling class attribute in the supplied array if the
 * conditions are set.  The `$styling_classes` is passed by reference.
 *
 * @since 1.0.0
 *
 * @param array $styling_classes Array of styling classes (ByReference)
 * @param WP_Post $post Instance of the post
 * @param bool $post_is_password_protected Flag for if the post is password protected.
 * @param string $styling_class (Optional) Styling class to return if the conditions are set.
 *
 * @return bool
 */
function set_post_thumbnail_styling_class( &$styling_classes, $post, $post_is_password_protected, $styling_class = 'has-post-thumbnail' ) {

	if ( is_attachment( $post ) || $post_is_password_protected ) {
		return false;
	}

	if ( ! current_theme_supports( 'post-thumbnails' ) || ! has_post_thumbnail( $post->ID ) ) {
		return false;
	}

	$styling_classes[] = $styling_class;

	return true;
}