<?php

function do_the_all_event( $event_name, $args ) {
	if ( ! isset($wp_filter['all']) ) {
		return;
	}

	add_to_firing_events_list( $event_name );
	_wp_call_all_hook($args);
}

function add_to_firing_events_list( $event_name ) {
	global $wp_current_filter;

	$wp_current_filter[] = $event_name;
}

function remove_from_firing_events_list( $event_name ) {
	global $wp_current_filter;

	array_pop( $wp_current_filter );
}