<?php

function get_author_id( $author_id = 0 ) {
	return get_author_attribute( 'ID', $author_id );
}

function get_author_display_name( $author_id = 0 ) {
	return get_author_attribute( 'display_name', $author_id );
}

function get_author_first_name( $author_id = 0 ) {
	return get_author_attribute( 'first_name', $author_id );
}

function get_author_email( $author_id = 0 ) {
	return get_author_attribute( 'email', $author_id );
}

function get_author_bio( $author_id = 0 ) {
	return get_author_attribute( 'description', $author_id );
}

function get_author_attribute( $attribute, $author_id = 0 ) {

}