<?php

class Prefix_Shortcode_Course_Categories implements Prefix_Shortcode_Interface {

	/**
	 * @var array list of taxonomy terms.
	 */
	protected $course_taxonomy_terms;

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
		$this->orderby = isset( $attributes['orderby'] ) ? $attributes['orderby'] : 'name';
		$this->order   = isset( $attributes['order'] ) ? $attributes['order'] : 'ASC';
		$this->number  = isset( $attributes['number'] ) ? $attributes['number'] : '100';
		$this->parent  = isset( $attributes['parent'] ) ? $attributes['parent'] : '';

		$include       = isset( $attributes['include'] ) ? explode( ',', $attributes['include'] ) : '';
		$this->include = $this->generate_term_ids( $include );

		$exclude       = isset( $attributes['exclude'] ) ? explode( ',', $attributes['exclude'] ) : '';
		$this->exclude = $this->generate_term_ids( $exclude );

		// make sure we handle string true/false values correctly with respective defaults
		$hide_empty       = isset( $attributes['hide_empty'] ) ? $attributes['hide_empty'] : 'false';
		$this->hide_empty = 'true' == $hide_empty ? true : false;

		$this->setup_course_categories();
	}


	/**
	 * create the messages query .
	 *
	 * @return mixed
	 */
	public function setup_course_categories() {
		$args = array(
			'orderby'    => $this->orderby,
			'order'      => $this->order,
			'exclude'    => $this->exclude,
			'include'    => $this->include,
			'number'     => $this->number,
			'parent'     => $this->parent,
			'hide_empty' => $this->hide_empty,
			'fields'     => 'all',
		);

		$this->course_taxonomy_terms = get_terms( 'course-category', $args );
	}
}