<?php

// Verify payment recipient
if ( strcasecmp( $business_email, trim( prefix_get_option( 'paypal_email', false ) ) ) != 0 ) {

}

// Check that the saved cart is not the same as the current cart
if ( json_decode( stripslashes( $_COOKIE['prefix_saved_cart'] ), true ) === PluginName()->session->get( 'prefix_cart' ) )
	return false;