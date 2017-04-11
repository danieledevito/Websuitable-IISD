<?php

/**
 * Class Post
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Posts;

use TBSC_Core\Config\ArrayConfig;
use TBSC_Core\Meta\PostMeta;
use TBSC_Core\Support\CustomData;
use TBSC_Core\Support\Views;

class Post {

	/**
	 * Post Meta configuration.
	 *
	 * @since 2.0.0
	 *
	 * @var PostMeta
	 */
	protected $post_meta;

	/**
	 * Custom post meta available to all pages and posts.
	 *
	 * @since 1.0.0
	 *
	 * @var array $meta Custom field meta.
	 */
	protected $common_meta;

	/**
	 * Instantiate the PostEntry
	 *
	 * @since 1.0.0
	 *
	 * @return self
	 */
	public function __construct() {

		/**
		 * Set post meta configuration.
		 *
		 * @since 2.0.0
		 */
		$this->post_meta = new PostMeta(
			new ArrayConfig( TBSC_CONFIG_DIR . 'post-meta/post-meta.php' )
		);

		// Get the post meta. Always used for custom titles.
		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_single_posts_custom_meta', false )[0];
	}

	/**
	 * Create the page.
	 *
	 * Call the parent method last, to make sure all hooks are
	 * available for the Page entry to work.
	 *
	 * @since 3.0.0
	 */
	public function do_the_entry() {

		add_action('ezra_after_header', array( $this, 'getContentWrap' ));
		add_action('ezra_before_loop', array( $this, 'getPostHeader' ));
		add_action( 'ezra_entry', array( $this, 'getMainContent' ) );

		add_action('ezra_before_footer', array($this, 'closeContentWrap'));

		add_action( 'ezra_after_entry', array( $this, 'do_single_post_navigation' ) );

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			$comments = new Comments(
				new ArrayConfig( TBSC_CONFIG_DIR . 'comments/comments-config.php' )
			);

			add_action( 'ezra_after_entry', array( $comments, 'init_comments' ) );
		}

	}


	public function getContentWrap() {
		?>
		<div class="blogPageWrap">
		<div class="blogPageWrap__inner">
		<?php
	}

	public function closeContentWrap() {
		?>
		</div>
		</div>
		<?php
	}

	public function getPostHeader() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'posts/postHeader.php' ) );
	}

	/**
	 * Output entry content.
	 *
	 * @since 1.0.0
	 */
	public function getMainContent() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'posts/entry.php' ) );
	}

	/**
	 * Output post navigation links.
	 *
	 * Hooks into markup output by do_post_navigation_markup method.
	 *
	 * @since 2.0.0
	 */
	public function do_single_post_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		include( Views::load_view( TBSC_VIEWS_DIR . 'posts/single-post-navigation.php' ) );
	}

}

