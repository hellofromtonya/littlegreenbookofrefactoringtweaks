<?php

add_action( 'widgets_init', 'register_some_widget' );
function register_some_widget() {
	register_widget( 'Prefix_Some_Widget' );
}
