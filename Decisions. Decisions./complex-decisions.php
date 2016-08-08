<?php

public function show_notices() {
	// .. code
	if ( ( prefix_get_option( 'purchase_page', '' ) == '' || 'trash' == get_post_status( prefix_get_option( 'purchase_page', '' ) ) ) && current_user_can( 'edit_pages' ) && ! get_user_meta( get_current_user_id(), '_prefix_set_checkout_dismissed' ) ) {
		// .. code removed for brevity
	}
	// .. remaining code removed for brevity
}