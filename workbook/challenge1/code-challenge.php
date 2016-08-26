<?php

/*
 * Check if custom post type exists, to provide data
 */
function prefix_is_post_type( $type ) {
	global $wp_query;
	if ( $type == get_post_type( $wp_query->post->ID ) ) return true;
	return false;
}
