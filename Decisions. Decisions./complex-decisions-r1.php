<?php

public function show_notices() {
	// .. code
	$purchase_page_id                = (int) prefix_get_option( 'purchase_page', 0 );
	$purchase_page_is_not_configured = ! $purchase_page_id || 'trash' == get_post_status( $purchase_page_id );

	$has_user_not_setup_checkout_page = current_user_can( 'edit_pages' ) && ! get_user_meta( get_current_user_id(), '_prefix_set_checkout_dismissed' );

	if ( $purchase_page_is_not_configured && $has_user_not_setup_checkout_page ) {
		// .. code removed for brevity
	}
	// .. remaining code removed for brevity
}
