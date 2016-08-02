<?php

function setup_postdata( $post ) {
	// removed for brevity

	$content = $post->post_content;
	if ( false !== strpos( $content, '<!--nextpage-->' ) ) {
		// removed for brevity
		$pages = explode('<!--nextpage-->', $content);
	} else {
		$pages = array( $post->post_content );
	}

	$pages = apply_filters( 'content_pagination', $pages, $post );

	// removed for brevity
}
