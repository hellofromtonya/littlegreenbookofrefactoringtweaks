<?php

function prefix_redirect_canonical() {
	if ( prefix_is_blog_page() || ! apply_filters( 'prefix_do_redirect_canonical', true ) ) {
		return;
	}

	if ( !empty( $_POST ) ) {
		return;
	}
	// .. code to be processed is here

	if ( $canonical_url === $req_url_clean ) {
		return;
	}

	// .. 17 lines of code to be processed is here
}