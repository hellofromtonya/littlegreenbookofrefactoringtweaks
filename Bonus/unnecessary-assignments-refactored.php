<?php

public function set( $options = array() ) {
	if ( ! empty( $options ) || empty( $options ) && empty( $this->key ) ) {
		$this->options = $options;
	}
}
