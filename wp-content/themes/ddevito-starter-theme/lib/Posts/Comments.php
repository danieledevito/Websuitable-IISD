<?php

/**
 * Class Comments
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Posts;

use TBSC_Core\Support\Views;
use TBSC_Core\Config\I_Config;

class Comments {

	/**
	 * Comments config array.
	 *
	 * @since 1.0.0
	 *
	 * @type array
	 */
	protected $config = array();

	/**
	 * Instantiate Comments
	 *
	 * @since 1.0.0
	 *
	 * @param I_Config $config Comments config array.
	 *
	 * @return self
	 */
	public function __construct( I_Config $config ) {

		$this->config = $config->load_config();

	}

	/**
	 * Init.
	 *
	 * Putting methods in their place.
	 * Plugging view files into the proper hooks
	 * in comments.php.
	 *
	 * @since 1.0.0
	 */
	public function init_comments() {

		add_action( 'ezra_comments_header',         array( $this, 'do_comments_header' ) );
		add_action( 'ezra_before_comments_list',    array( $this, 'do_comments_nav_above' ) );
		add_action( 'ezra_comments_list',           array( $this, 'do_comments_list' ) );
		add_action( 'ezra_after_comments_list',     array( $this, 'do_comments_nav_below' ) );
		add_action( 'ezra_comments_footer',         array( $this, 'do_comment_form' ) );

		add_filter( 'comment_form_defaults',        array( $this, 'override_comment_form_defaults' ) );

		$this->do_comments_template();
	}

	/**
	 * Load comments.php
	 *
	 * This file must be loaded for comments to work properly.
	 * File found in root folder.
	 *
	 * @since 1.0.0
	 */
	public function do_comments_template() {

		comments_template();

	}

	/**
	 * Filter and override comment form defaults.
	 *
	 * @param array $defaults
	 *
	 * @return mixed        Altered submit button markup.
	 */
	public function override_comment_form_defaults( $defaults ) {

		if ( array_key_exists( 'form_defaults_overwrite', $this->config['components'] ) ) {

			return array_merge( $defaults, $this->config['components']['form_defaults_overwrite'] );

		}

		return $defaults;

	}

	/**
	 * Output comment form.
	 *
	 * @since 1.0.0
	 */
	public function do_comment_form() {

		include( Views::load_view( TBSC_VIEWS_DIR . 'comments/comment-form.php' ) );

	}

	/**
	 * Do comments header.
	 *
	 * @since 1.0.0
	 */
	public function do_comments_header() {

		include( Views::load_view( TBSC_VIEWS_DIR . 'comments/comments-header.php' ) );

	}

	/**
	 * Output the comment list markup.
	 *
	 * @since 1.0.0
	 */
	public function do_comments_list() {

		include( Views::load_view( TBSC_VIEWS_DIR . 'comments/comments-list.php' ) );

	}

	/**
	 * Do comments navigation above the comments section.
	 *
	 * @since 1.0.0
	 */
	public function do_comments_nav_above() {

		include( Views::load_view( TBSC_VIEWS_DIR . 'comments/comments-nav-above.php' ) );

	}

	/**
	 * Do comments navigation below the comments section.
	 *
	 * @since 1.0.0
	 */
	public function do_comments_nav_below() {

		include( Views::load_view( TBSC_VIEWS_DIR . 'comments/comments-nav-below.php' ) );

	}

	/**
	 * Output Custom Comment Markup.
	 *
	 * Restructured default comment.
	 * Used as callback in /comments.php
	 *
	 * @since 1.0.0
	 *
	 * @param $comment
	 * @param $args
	 * @param $depth
	 */
	public function do_custom_comment_framework( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;

		extract($args, EXTR_SKIP);

		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		include( Views::load_view( TBSC_VIEWS_DIR . 'comments/comment-list-framework.php' ) );

	}

}