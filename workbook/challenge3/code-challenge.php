<?php

class Some_Class {

	//..
	public function render_group_row( $field_group, $remove_disabled ) {
		$field_group->peform_param_callback( 'before_group_row' );
		$closed_class = $field_group->options( 'closed' ) ? ' closed' : '';
		echo '
		<div class="postbox plugin-row plugin-repeatable-grouping', $closed_class, '" data-iterator="', $field_group->index, '">';
		if ( $field_group->args( 'repeatable' ) ) {
			echo '<button type="button" ', $remove_disabled, 'data-selector="', $field_group->id(), '_repeat" class="dashicons-before dashicons-no-alt plugin-remove-group-row"></button>';
		}
		echo '
			<div class="pluginhandle" title="' , __( 'Click to toggle', 'plugin2' ), '"><br></div>
			<h3 class="plugin-group-title pluginhandle-title"><span>', $field_group->replace_hash( $field_group->options( 'group_title' ) ), '</span></h3>
			<div class="inside plugin-td plugin-nested plugin-field-list">';
		// Loop and render repeatable group fields
		foreach ( array_values( $field_group->args( 'fields' ) ) as $field_args ) {
			if ( 'hidden' == $field_args['type'] ) {
				// Save rendering for after the metabox
				$this->add_hidden_field( $field_args, $field_group );
			} else {
				$field_args['show_names'] = $field_group->args( 'show_names' );
				$field_args['context']    = $field_group->args( 'context' );
				$field = $this->get_field( $field_args, $field_group )->render_field();
			}
		}
		if ( $field_group->args( 'repeatable' ) ) {
			echo '
					<div class="plugin-row plugin-remove-field-row">
						<div class="plugin-remove-row">
							<button type="button" ', $remove_disabled, 'data-selector="', $field_group->id(), '_repeat" class="button plugin-remove-group-row alignright">', $field_group->options( 'remove_button' ), '</button>
						</div>
					</div>
					';
		}
		echo '
			</div>
		</div>
		';
		$field_group->peform_param_callback( 'after_group_row' );
	}
}