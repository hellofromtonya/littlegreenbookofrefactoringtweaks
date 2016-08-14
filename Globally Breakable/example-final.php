<?php

function prefix_author_box( $context = '', $echo = true ) {
	..
}

function prefix_user_meta_default_on( $value, $user_id ) {
	if ( $value ) {
		return $value;
	}

	$field = str_replace( 'get_the_author_', '', current_filter() );

	$attribute = null;

	if ( has_author_attribute( "user_$field", $user_id ) ) {
		$attribute = "user_$field";
	}

	if ( has_author_attribute( $field, $user_id ) ) {
		$attribute = $field;
	}

	return is_null( $attribute )
		? 1
		: get_author_attribute( $attribute, $user_id );
}

function get_the_author_meta( $field = '', $user_id = false ) {
	$original_user_id = $user_id;

	if ( ! $user_id ) {
		$user_id = get_author_id();
	}
	..
}

function get_the_author($deprecated = '') {
	global $authordata;
	..
	return apply_filters('the_author', is_object($authordata)
		? $authordata->display_name
		: null);
}