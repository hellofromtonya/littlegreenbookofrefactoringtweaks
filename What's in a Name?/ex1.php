<?php

function prefix_matches_handler ( $matches ) {

	if ( ! is_array( $matches ) ) {
		return '';
	}

	$shortcode = '[someshortcode';

	if ( isset( $matches[1] ) && ! empty( $matches[1] ) ) {
		$shortcode .= ' id="' . $matches[1] . '"';
	}

	if ( isset( $matches[3] ) && ! empty( $matches[3] ) ) {
		$name = prefix_get_file_name( $matches[3], $matches[2], $matches[1] );
		if ( $name ) {
			$shortcode .= ' file="' . $name . '"';
		}
	}

	return $shortcode . ']';
}
