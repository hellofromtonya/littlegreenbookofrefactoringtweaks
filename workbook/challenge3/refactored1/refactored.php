<?php

class Some_Class {

	//..
	public function render_group_row( $field_group, $remove_disabled ) {
		$field_group->peform_param_callback( 'before_group_row' );
		$closed_class = $field_group->options( 'closed' ) ? ' closed' : '';

		include( 'views/repeatable-row.php' );

		$field_group->peform_param_callback( 'after_group_row' );
	}
}