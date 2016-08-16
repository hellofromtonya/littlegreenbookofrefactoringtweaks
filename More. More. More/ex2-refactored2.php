<?php

class Prefix_Types {
..
	protected function repeat_row( $disable_remover = false, $class = 'prefix-repeat-row' ) {
		$disabled    = $disable_remover ? ' button-disabled' : '';
		$button_text = $this->_text( 'remove_row_text', __( 'Remove', 'plugin' ) );

		include( 'views/repeat-row.php' );
	}
..
}