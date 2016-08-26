<?php

function prefix_get_header_image() {
	$header_image_option = prefix_get_theme_header_image_option();
	if ( ! $header_image_option ) {
		return false;
	}

	$excluded_values = array(
		'remove-header',
		'random-default-image',
		'random-uploaded-image',
	);

	$header_image_option_is_not_valid = in_array( $header_image_option, $excluded_values );

	return $header_image_option_is_not_valid ? false : $header_image_option;
}

/**
 * Get the theme header image option.
 *
 * @since 1.0.0
 *
 * @return mixed|null
 */
function prefix_get_theme_header_image_option() {
	return prefix_get_option_for_theme_modules( 'header_image' );
}

/**
 * Get the option from the theme's modules.  If the option does not exist,
 * then the default value is returned.
 *
 * @since 1.0.0
 *
 * @param string $option_key Option to retrieve
 * @param mixed|null $default Default value when the option does not exist.
 *
 * @return mixed|null
 */
function prefix_get_option_for_theme_modules( $option_key, $default = null ) {
	$theme_slug    = prefix_actual_current_theme();
	$theme_modules = (array) get_option( "theme_mods_{$theme_slug}" );

	return array_key_exists( $option_key, $theme_modules )
		? $theme_modules[ $option_key ]
		: $default;
}
