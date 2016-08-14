<?php

function get_author_attribute( $attribute, $author_id = 0 ) {
	$author = get_author_data( $author_id );
	if ( ! $author ) {
		return;
	}

	return $author->get_attribute( $attribute );
}