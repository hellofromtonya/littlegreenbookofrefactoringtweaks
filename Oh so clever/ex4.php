<?php

add_action( 'widgets_init', create_function( '', "register_widget('Prefix_Some_Widget');" ) );