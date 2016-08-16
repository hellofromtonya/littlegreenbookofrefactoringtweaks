<?php

$paypal_email = trim( prefix_get_option( 'paypal_email', false ) );
if ( strcasecmp( $business_email, $paypal_email ) != 0 ) {
	..
}
