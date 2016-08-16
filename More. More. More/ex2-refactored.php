<?php

class Prefix_Types {
	..
	protected function repeat_row( $disable_remover = false, $class = 'prefix-repeat-row' ) {
		$disabled = $disable_remover ? ' button-disabled' : '';

		include( 'views/repeat-row.php' );
	}
	..
}