<?php

/**
 * Class SingleWooProduct
 *
 * Used as a replacement for archive.php template.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Posts;

use TBSC_Core\Navigation\Pagination;
use TBSC_Core\Support\Views;
use TBSC_Core\Config\ArrayConfig;
use TBSC_Core\Meta\PostMeta;
use TBSC_Core\Support\CustomData;

class WooSingle {

	/**
	 * Post Meta configuration.
	 *
	 * @since 2.0.0
	 *
	 * @var PostMeta
	 */
	protected $post_meta;

	/**
	 * Custom post meta data.
	 *
	 * @since 2.0.0
	 *
	 * @var array $meta
	 */
	protected $meta;

	/**
	 * Custom Post Meta common to all pages and posts.
	 *
	 * @var
	 */
	protected $common_meta;

	/**
	 * Archive constructor.
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

		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_common_custom_post_meta', false )[0];

	}

	/**
	 * Do the entry.
	 *
	 * @since 3.0.0
	 */
	public function do_the_entry() {

		// Hook in the base WC hooks for other page content.
		add_action( 'ezra_entry', array( $this, 'do_page_content' ) );

	}

	/**
	 * Output the post content.
	 *
	 * For archives, we'll output content summary
	 * rather than the full content.
	 *
	 * @since 2.0.0
	 */
	public function do_page_content() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'woo/single/entry-content.php' ) );
	}

}