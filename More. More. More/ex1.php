<?php

// Verify payment recipient
if ( strcasecmp( $business_email, trim( prefix_get_option( 'paypal_email', false ) ) ) != 0 ) {
	..
}
