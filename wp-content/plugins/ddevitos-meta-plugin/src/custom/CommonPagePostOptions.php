<?php

/**
 * class-common-options.php
 *
 * @package   ArborScape
 * @author    The Smart Web Team - Better Software Company
 * @copyright 2015 The Better Software Company
 * @license   GPL-2.0+
 */

namespace TBSC_Meta\Custom;

class CommonPagePostOptions {

	public function __construct( $config ) {

		$this->config = $config;

	}

	public function do_custom_entry_title( $title ) {
		$page_options = get_post_meta( get_the_ID(), $this->config['option_name'], true );

		if ( $page_options ) {
			global $post;
			if ( ( $post->post_title == $title ) && ( array_key_exists( 'custom_title', $page_options ) ) && ( ! empty ( $page_options['custom_title'] ) ) && ( !is_admin() ) ) {
				return $page_options['custom_title'];
			}
		}
		return $title;

	}

}