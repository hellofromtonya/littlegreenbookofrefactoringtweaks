<?php

function do_the_all_event( $event_name, $args ) {
	if ( ! isset($wp_filter['all']) ) {
		return;
	}

	$wp_current_filter[] = $event_name;
	_wp_call_all_hook($args);
}


function apply_filters( $tag, $value ) {
	..
	$args = func_get_args();
	do_the_all_event( $tag, $args );
}

function apply_filters_ref_array($tag, $args) {
	..
	do_the_all_event( $tag, $args );
}

function do_action($tag, $arg = '') {
	..
	$args = func_get_args();
	do_the_all_event( $tag, $args );
}

function do_action_ref_array($tag, $args) {
	..
	do_the_all_event( $tag, $args );
}