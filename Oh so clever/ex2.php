<?php

abstract class Prefix_Type_Picker_Base extends Prefix_Type_Text {
	..

	public function parse_picker_options( $arg = 'date', $args = array() ) {
		..
		if ( $js_format = prefix_utils()->php_to_js_dateformat( $format ) ) {
			..
		}
		..
	}

	..
}