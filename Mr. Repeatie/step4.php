<?php

function do_the_all_event() {
	if ( ! isset($wp_filter['all']) ) {
		return;
	}

	$wp_current_filter[] = $tag;
	$args = func_get_args();
	_wp_call_all_hook($args);
}