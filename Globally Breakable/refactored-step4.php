<?php

function get_author_data( $author_id = 0 ) {
	$author = get_userdata( $author_id );

	return is_object( $author )
		? $author
		: null;
}