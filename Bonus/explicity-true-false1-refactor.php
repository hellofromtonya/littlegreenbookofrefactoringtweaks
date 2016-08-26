<?php

function is_sticky( $post_id = 0 ) {
	..

	return in_array( $post_id, $stickies );
}