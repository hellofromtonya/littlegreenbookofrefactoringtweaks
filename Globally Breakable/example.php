<?php

function prefix_author_box( $context = '', $echo = true ) {

	global $authordata;

	$authordata = is_object( $authordata )
		? $authordata
		: get_userdata( get_query_var( 'author' ) );
	..
}

function prefix_user_meta_default_on( $value, $user_id ) {
	$field = str_replace( 'get_the_author_', '', current_filter() );

	if ( $value )
		return $value;

	if ( ! $user_id )
		global $authordata;
	else
		$authordata = get_userdata( $user_id );

	$user_field = "user_$field";
	if ( isset( $authordata->$user_field ) )
		return $authordata->user_field;

	if ( isset( $authordata->$field ) )
		return $value;

	return 1;
}

function get_the_author_meta( $field = '', $user_id = false ) {
	$original_user_id = $user_id;

	if ( ! $user_id ) {
		global $authordata;
		$user_id = isset( $authordata->ID ) ? $authordata->ID : 0;
	} else {
		$authordata = get_userdata( $user_id );
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