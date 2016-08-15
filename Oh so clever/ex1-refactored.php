<?php

function get_post_type( $post = null ) {
	$post = get_post( $post );

	if ( $post ) {
		return $post->post_type;
	}

	return false;
}