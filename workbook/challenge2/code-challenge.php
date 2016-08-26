<?php

function prefix_get_header_image() {
	$theme_slug = prefix_actual_current_theme();
	$mods       = get_option( "theme_mods_{$theme_slug}" );

	if ( isset( $mods['header_image'] ) &&
	     'remove-header' != $mods['header_image'] &&
	     'random-default-image' != $mods['header_image'] &&
	     'random-uploaded-image' != $mods['header_image'] ) {
		return $mods['header_image'];
	}

	return false;
}