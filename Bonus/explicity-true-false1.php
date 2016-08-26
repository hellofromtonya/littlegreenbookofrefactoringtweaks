<?php

function is_sticky( $post_id = 0 ) {
	..

	if ( in_array( $post_id, $stickies ) )
		return true;

	return false;
}