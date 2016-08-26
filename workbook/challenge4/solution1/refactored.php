<?php

class Prefix_Shortcode_Course_Categories implements Prefix_Shortcode_Interface {

	/**
	 * List of taxonomy terms.
	 *
	 * @var array
	 */
	protected $course_taxonomy_terms;

	/**
	 * "orderby" terms query argument
	 *
	 * @var string
	 */
	protected $orderby = 'name';

	/**
	 * "order" terms query argument
	 *
	 * @var string
	 */
	protected $order = 'ASC';

	/**
	 * "number" terms query argument
	 *
	 * @var string
	 */
	protected $number = 100;

	/**
	 * "parent" terms query argument
	 *
	 * @var string
	 */
	protected $parent = '';

	/**
	 * "include" terms query argument
	 *
	 * @var string
	 */
	protected $include = '';

	/**
	 * "exclude" terms query argument
	 *
	 * @var string
	 */
	protected $exclude = '';

	/**
	 * "hide_empty" terms query argument
	 *
	 * @var string
	 */
	protected $hide_empty = false;

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
	 * @since 1.0.0
	 *
	 * @param array $attributes
	 *
	 * @return void
	 */
	protected function init_properties( array $attributes ) {
		foreach ( $attributes as $property => $attribute ) {
			$this->set_attribute( $property, $attribute );
		}
	}

	/**
	 * Set the property's attribute, if the property exists.
	 *
	 * @since 1.0.0
	 *
	 * @param string $property
	 * @param mixed $attribute
	 *
	 * @return void
	 */
	protected function set_attribute( $property, $attribute ) {
		if ( ! property_exists( $this, $property ) ) {
			return;
		}

		switch ( $property ) {
			case 'include':
			case 'exclude':
				$this->set_term_id_property( $property, $attribute );
				break;

			case 'hide_empty':
				$this->hide_empty = 'true' === $attribute;
				break;

			default:
				$this->$property = $attribute;
		}

	}

	/**
	 * Set the term IDs for the property.
	 *
	 * @since 1.0.0
	 *
	 * @param string $property
	 * @param mixed $attribute
	 *
	 * @return void
	 */
	protected function set_term_id_property( $property, $attribute ) {
		$attributes = explode( ',', $attribute );

		$this->$property = $this->generate_term_ids( $attributes );
	}
}
