<?php

class Prefix_Shortcode_Course_Categories implements Prefix_Shortcode_Interface {

	/**
	 * List of taxonomy terms.
	 *
	 * @var array
	 */
	protected $course_taxonomy_terms;

	/**
	 * Terms query arguments
	 *
	 * @var array
	 */
	protected $terms_query_arguments = array(
		'orderby'    => 'name',
		'order'      => 'ASC',
		'exclude'    => '',
		'include'    => '',
		'number'     => 100,
		'parent'     => '',
		'hide_empty' => false,
		'fields'     => 'all',
	);

	/**
	 * Setup the shortcode object
	 *
	 * @since 1.9.0
	 *
	 * @param array $attributes
	 * @param string $content
	 * @param string $shortcode the shortcode that was called for this instance
	 */
	public function __construct( $attributes, $content, $shortcode ) {
		$this->init_properties( $attributes );

		$this->setup_course_categories();
	}

	/**
	 * Initialize the properties.
	 *
	 * @since 2.0.0
	 *
	 * @param array $attributes
	 *
	 * @return void
	 */
	protected function init_properties( array $attributes ) {
		foreach ( $attributes as $property => $attribute ) {
			$this->set_terms_query_arguments( $property, $attribute );
		}
	}

	/**
	 * Set the argument for the terms query, if the argument exists.
	 *
	 * @since 2.0.0
	 *
	 * @param string $argument_key
	 * @param mixed $attribute
	 *
	 * @return void
	 */
	protected function set_terms_query_arguments( $argument_key, $attribute ) {
		if ( ! array_key_exists( $argument_key, $this->terms_query_arguments ) ) {
			return;
		}

		switch ( $argument_key ) {
			case 'include':
			case 'exclude':
				$value = explode( ',', $attribute );
				break;

			case 'hide_empty':
				$value = ( 'true' === $attribute );
				break;

			default:
				$value = $attribute;
		}

		$this->terms_query_arguments[ $argument_key ] = $value;
	}

	/**
	 * create the messages query .
	 *
	 * @since 2.0.0
	 *
	 * @return mixed
	 */
	public function setup_course_categories() {
		$this->course_taxonomy_terms = get_terms( 'course-category', $this->terms_query_arguments );
	}
}
