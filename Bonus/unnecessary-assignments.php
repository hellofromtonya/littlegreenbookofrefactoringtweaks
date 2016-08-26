<?php

public function set( $options = array() ) {
	$this->options = ! empty( $options ) || empty( $options ) && empty( $this->key )
		? $options
		: $this->options;
}
