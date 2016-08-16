<div class="prefix-row <?php echo $class; ?>">
	<div class="prefix-td">
		<?php $this->_render(); ?>
	</div>
	<div class="prefix-td prefix-remove-row">
		<button type="button" class="button prefix-remove-row-button<?php echo $disabled; ?>">
			<?php echo esc_html( $button_text ); ?>
		</button>
	</div>
</div>