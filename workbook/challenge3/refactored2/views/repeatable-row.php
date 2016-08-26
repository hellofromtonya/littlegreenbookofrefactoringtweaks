<div class="postbox plugin-row plugin-repeatable-grouping<?php echo $closed_class; ?>" data-iterator="<?php echo $field_group->index; ?>">
	<?php if ( $field_group->args( 'repeatable' ) ) : ?>
		<button type="button"<?php echo $remove_disabled; ?> data-selector="<?php echo $field_group->id(); ?>_repeat" class="dashicons-before dashicons-no-alt plugin-remove-group-row"></button>
	<?php endif; ?>
	<div class="pluginhandle" title="<?php _e( 'Click to toggle', 'plugin2' ); ?>"><br></div>
	<h3 class="plugin-group-title pluginhandle-title">
		<span><?php echo $field_group->replace_hash( $field_group->options( 'group_title' ) ); ?></span>
	</h3>
	<div class="inside plugin-td plugin-nested plugin-field-list">
		<?php
		$this->render_repeatable_group_fields( $field_group );
		if ( $field_group->args( 'repeatable' ) ) : ?>
			<div class="plugin-row plugin-remove-field-row">
				<div class="plugin-remove-row">
					<button type="button"<?php echo $remove_disabled; ?> data-selector="<?php echo $field_group->id(); ?>_repeat" class="button plugin-remove-group-row alignright"><?php echo $field_group->options( 'remove_button' ); ?></button>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>