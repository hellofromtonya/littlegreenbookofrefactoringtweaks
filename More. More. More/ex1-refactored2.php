<?php

if ( ! is_paypal_email( $business_email ) ) {
	..
}


function is_paypal_email( $email_to_compare ) {
	$paypal_email = trim( prefix_get_option( 'paypal_email', false ) );

	$emails_are_the_same = strcasecmp( $email_to_compare, $paypal_email ) == 0;

	return $emails_are_the_same;
}