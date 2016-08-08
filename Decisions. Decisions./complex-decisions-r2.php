<?php

public function show_notices() {
	// .. code
	if ( is_purchase_page_configured() && has_user_setup_purchase_page() ) {
		// .. code removed for brevity
	}
	// .. remaining code removed for brevity
}


function is_purchase_page_configured() {
	$purchase_page_id = (int) prefix_get_option( 'purchase_page', 0 );

	return ( $purchase_page_id && 'trash' != get_post_status( $purchase_page_id ) );
}

function has_user_setup_purchase_page() {
	if ( ! current_user_can( 'edit_pages' ) ) {
		return false;
	}

	return get_user_meta( get_current_user_id(), '_prefix_set_checkout_dismissed' );
}