<div class="postbox plugin-row plugin-repeatable-grouping<?php esc_attr_e( $closed_class ); ?>" data-iterator="<?php esc_attr_e( $field_group->index ); ?>">
	<?php if ( $is_repeatable ) : ?>
		<button type="button"<?php echo $remove_disabled; ?> data-selector="<?php echo $group_id; ?>_repeat" class="dashicons-before dashicons-no-alt plugin-remove-group-row"></button>
	<?php endif; ?>
	<div class="pluginhandle" title="<?php _e( 'Click to toggle', 'plugin2' ); ?>"><br></div>
	<h3 class="plugin-group-title pluginhandle-title">
		<span><?php esc_html_e( $group_title ); ?></span>
	</h3>
	<div class="inside plugin-td plugin-nested plugin-field-list">
		<?php
		$this->render_repeatable_group_fields( $field_group );
		if ( $is_repeatable ) : ?>
			<div class="plugin-row plugin-remove-field-row">
				<div class="plugin-remove-row">
					<button type="button"<?php echo $remove_disabled; ?> data-selector="<?php echo $group_id; ?>_repeat" class="button plugin-remove-group-row alignright"><?php esc_html_e( $field_group->options( 'remove_button' ) ); ?></button>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>