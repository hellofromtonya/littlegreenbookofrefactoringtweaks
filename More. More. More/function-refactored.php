<?php

class Some_Module {
	..
	function init() {
		if ( $this->maybe_disable_module() ) {
			return;
		}

		$this->in_plugin = ( class_exists( 'Plugin' ) && method_exists( 'Plugin', 'enable_module_configurable' ) ) ? true : false;

		$this->init_admin();
		$this->init_frontend();
		$this->init_configuration();
	}

	protected function init_admin() {

		if ( ! is_admin() ) {
			return;
		}

		add_action( 'admin_init', array( $this, 'register_settings' ), 5 );
		if ( ! $this->in_plugin ) {
			if ( 0 == $this->test_1or0_option( get_option( 'prefix_enable_it' ), true ) ) {
				return;
			}
		}

		add_action( 'wp_ajax_get_attachment_comments', array( $this, 'get_attachment_comments' ) );
		add_action( 'wp_ajax_nopriv_get_attachment_comments', array( $this, 'get_attachment_comments' ) );
		add_action( 'wp_ajax_post_attachment_comment', array( $this, 'post_attachment_comment' ) );
		add_action( 'wp_ajax_nopriv_post_attachment_comment', array( $this, 'post_attachment_comment' ) );
	}

	protected function init_frontend() {

		if ( is_admin() ) {
			return;
		}

		if ( ! $this->in_plugin ) {
			if ( 0 == $this->test_1or0_option( get_option( 'prefix_enable_it' ), true ) ) {
				return;
			}
		}

		$this->prebuilt_widths = apply_filters( 'jp_prefix_widths', $this->prebuilt_widths );
		add_filter( 'post_gallery', array( $this, 'enqueue_assets' ), 1000, 2 );
		add_filter( 'post_gallery', array( $this, 'set_in_gallery' ), - 1000 );
		add_filter( 'gallery_style', array( $this, 'add_data_to_container' ) );
		add_filter( 'wp_get_attachment_image_attributes', array( $this, 'add_data_to_images' ), 10, 2 );
	}

	protected function init_configuration() {
		if ( ! $this->in_plugin || ! method_exists( 'Plugin', 'module_configuration_load' ) ) {
			return;
		}
		Plugin::enable_module_configurable( dirname( dirname( __FILE__ ) ) . '/filename.php' );
		Plugin::module_configuration_load( dirname( dirname( __FILE__ ) ) . '/filename.php', array( $this, 'prefix_configuration_load' ) );
	}
	..
}
