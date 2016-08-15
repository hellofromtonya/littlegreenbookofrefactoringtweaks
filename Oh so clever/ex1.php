<?php

function get_post_type( $post = null ) {
	if ( $post = get_post( $post ) )
		return $post->post_type;

	return false;
}
