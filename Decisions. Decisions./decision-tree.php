<?php

switch ( $collection ) {
	case 'forms' :
		switch ( $collection2 ) {
			case 'results' :
				switch ( $method ) {
					case 'GET' :
						$this->get_results( $id );
						break;
					case 'DELETE':
					case 'PUT':
					case 'POST':
					default:
						$this->die_bad_request();
				}
				break;
			case 'properties' :
				switch ( $method ) {
					case 'PUT' :
						$this->put_forms_properties( $data, $id );
						break;
					default:
						$this->die_bad_request();
				}
				break;
			case 'feeds' :
				if ( false == empty( $id2 ) ) {
					$this->die_bad_request();
				}
				switch ( $method ) {
					case 'GET' :
						$this->get_feeds( null, $id );
						break;
					case 'DELETE' :
						$this->delete_feeds( null, $id );
						break;
					case 'PUT' :
						$this->die_not_implemented();
						break;
					case 'POST' :
						$this->post_feeds( $data, $id );
						break;
					default :
						$this->die_bad_request();
				}
				break;
			case 'entries' :
				if ( false == empty( $id2 ) ) {
					$this->die_bad_request();
				}
				switch ( $method ) {
					case 'GET' :
						$this->get_entries( null, $id, $schema );
						break;
					case 'POST' :
						$this->post_entries( $data, $id );
						break;
					case 'PUT' :
					case 'DELETE' :
						$this->die_not_implemented();
						break;
					default:
						$this->die_bad_request();
				}
				break;
			case 'submissions' :
				if ( false == empty( $id2 ) ) {
					$this->die_bad_request();
				}
				switch ( $method ) {
					case 'POST' :
						$this->submit_form( $data, $id );
						break;
					case 'GET' :
					case 'PUT' :
					case 'DELETE' :
						$this->die_not_implemented();
						break;
					default:
						$this->die_bad_request();
				}
				break;
			case '' :
				switch ( $method ) {
					case 'GET':
						$this->get_forms( $id, $schema );
						break;
					case 'DELETE':
						$this->delete_forms( $id );
						break;
					case 'PUT':
						$this->put_forms( $data, $id, $id2 );
						break;
					case 'POST':
						if ( false === empty( $id ) ) {
							$this->die_bad_request();
						}
						$this->post_forms( $data, $id );
						break;
					default:
						$this->die_bad_request();
				}
				break;
			default :
				$this->die_bad_request();
				break;
		}
		break;
	case 'entries' : //  route = /entries/{id}
		switch ( $method ) {
			case 'GET':
				switch ( $collection2 ) {
					case 'fields' : // route = /entries/{id}/fields/{id2}
						$this->get_entries( $id, null, $schema, $id2 );
						break;
					case '' :
						$this->get_entries( $id, null, $schema );
						break;
					default :
						$this->die_bad_request();
				}
				break;
			case 'DELETE' :
				$this->delete_entries( $id );
				break;
			case 'PUT' :
				switch ( $collection2 ) {
					case 'properties' : // route = /entries/{id}/properties/{id2}
						$this->put_entry_properties( $data, $id );
						break;
					case '' :
						$this->put_entries( $data, $id );
						break;
				}
				break;
			case 'POST' :
				if ( false === empty( $id ) ) {
					$this->die_bad_request();
				}
				$this->post_entries( $data );
				break;
			default:
				$this->die_bad_request();
		}
		break;
	case 'feeds' :
		switch ( $method ) {
			case 'GET' :
				$this->get_feeds( $id );
				break;
			case 'DELETE' :
				if ( empty( $id ) ) {
					$this->die_bad_request();
				}
				$this->delete_feeds( $id );
				break;
			case 'PUT' :
				$this->put_feeds( $data, $id );
				break;
			case 'POST' :
				if ( false === empty( $id ) ) {
					$this->die_bad_request();
				}
				$this->post_feeds( $data );
				break;
			default :
				$this->die_bad_request();
		}
		break;
	default :
		$this->die_bad_request();
		break;
}
