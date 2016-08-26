<?php

class Some_Class {

	//..
	public function render_group_row( $field_group, $remove_disabled ) {
		$field_group->peform_param_callback( 'before_group_row' );

		$closed_class = $field_group->options( 'closed' ) ? ' closed' : '';
		$group_title  = $field_group->replace_hash( $field_group->options( 'group_title' ) );

		include( 'views/repeatable-row.php' );

		$field_group->peform_param_callback( 'after_group_row' );
	}

	protected function render_repeatable_group_fields( $field_group ) {
		$fields = array_values( $field_group->args( 'fields' ) );

		$show_names = $field_group->args( 'show_names' );
		$context    = $field_group->args( 'context' );

		foreach ( $fields as $field_args ) {

			if ( 'hidden' == $field_args['type'] ) {
				// Save rendering for after the metabox
				$this->add_hidden_field( $field_args, $field_group );

			} else {
				$field_args['show_names'] = $show_names;
				$field_args['context']    = $context;
				$field                    = $this->get_field( $field_args, $field_group );

				$field->render_field();
			}
		}
	}
}