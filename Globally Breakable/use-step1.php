<?php

function prefix_author_box( $context = '', $echo = true ) {
	$author_display_name = get_author_display_name();
	$gravatar            = get_avatar( get_author_email(), get_author_avatar_size( $context ) );
	$description         = wpautop( get_author_bio() );
	..
}