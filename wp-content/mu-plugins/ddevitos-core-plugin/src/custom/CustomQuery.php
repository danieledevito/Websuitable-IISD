<?php

/**
 * class-custom-query.php
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Custom;

use TBSC_Core\Config\I_Config;
use TBSC_Core\Support\Views;

//if ( $this->custom_query->have_posts() ) : while ( $this->custom_query->have_posts() ) : $this->custom_query->the_post();
// echo 'Content goes here';
//endwhile; endif;

/**
 * Class CustomQuery
 *
 * Create a custom query object.
 *
 * @package TBSC_Core\Custom
 */
class CustomQuery {

	/**
	 * Custom query configuration array.
	 *
	 * @since 1.0.0
	 *
	 * @var array $query_config
	 */
	protected $query_config = array();

	/**
	 * New WP_Query object.
	 *
	 * @since 1.0.0
	 *
	 * @var \WP_Query
	 */
	public $custom_query;

	/**
	 * Page number for the present query.
	 *
	 * @since 1.0.0
	 *
	 * @var int $paged Page number.
	 */
	protected $paged;

	/**
	 * New Query arguments.
	 *
	 * Used by the WP_Query object.
	 *
	 * @since 1.0.0
	 *
	 * @var array $custom_query_args Query args.
	 */
	protected $custom_query_args = array();

	/**
	 * Paginate links arguments.
	 *
	 * Used by core paginate_links function.
	 *
	 * @since 1.0.0
	 *
	 * @var array $pagination_links_args Paginate links args.
	 */
	protected $pagination_links_args = array();

	/**
	 * CustomQuery constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param $query_settings
	 * @param $post_type
	 * @param $number_of_posts
	 */
	public function __construct( array $query_settings, $post_type, $number_of_posts = -1 ) {

		// Load main config file for query instance.
		$this->query_config = $query_settings;

		// Create args array for custom WP_Query
		$this->custom_query_args['paged'] = $this->get_paged();
		$this->custom_query_args['post_type'] = $post_type;
		$this->custom_query_args['posts_per_archive_page'] = $number_of_posts;
		$this->custom_query_args['posts_per_page'] = $number_of_posts;
		// Instantiate new WP_Query object. Merge instance args array with config array
		$this->custom_query = new \WP_Query( array_merge( $this->query_config['args'], $this->custom_query_args ) );

		// Build instance args array for the pagination links
		$this->pagination_links_args['current'] = $this->get_paged();
		$this->pagination_links_args['base'] = $this->get_pagenum_link();
		$this->pagination_links_args['format'] = $this->get_format();
		$this->pagination_links_args['total'] = $this->custom_query->max_num_pages;

	}

	/**
	 * Get the new query object.
	 *
	 * @since 2.0.0
	 *
	 * @return object
	 */
	public function get_new_query() {
		return $this->custom_query;
	}

	/**
	 * Get page number for the present query.
	 *
	 * @since 1.0.0
	 *
	 * @return int $paged Page number.
	 */
	protected function get_paged() {
		if ( is_front_page() ) {
			$paged = ( get_query_var('page') ) ? intval( get_query_var('page') ) : 1;
		} else {
			$paged = ( get_query_var('paged') ) ? intval( get_query_var('paged') ) : 1;
		}

		return $paged;
	}

	/**
	 * Return the link for the posts page stripping out any arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return string|void
	 */
	protected function get_pagenum_link() {

		// Convert any HTML entities to their applicable characters
		$pagenum_link = html_entity_decode( get_pagenum_link() );

		// Splits URL in pieces at any '?'. Anything that comes after the '?' is an argument that needs to be removed.
		$url_parts    = explode( '?', $pagenum_link );

		// Only use the URL. Don't need the arguments.
		$pagenum_link = $url_parts[0];

		// Make sure there's a trailing slash at the end of the URL
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		return $pagenum_link;
	}

	/**
	 * Set permalinks for paged URLs
	 *
	 * @since 1.0.0
	 *
	 * @link https://codex.wordpress.org/Function_Reference/user_trailingslashit
	 *
	 * @return string $format Permalink structure.
	 */
	protected function get_format() {

		global $wp_rewrite;

		$pagenum_link = $this->get_pagenum_link();

		// if permalinks are being used and index.php is NOT in the URL use just index.php as the URL
		$format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';

		// If using permalinks add prettier endings to the links /%#%
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		return $format;
	}

	/**
	 * Outputs core paginate_links function.
	 *
	 * Called from within the do_paginate_links_partial view.
	 *
	 * @since 1.0.0
	 *
	 * @return array|string|void
	 */
	protected function get_paginate_links() {

		/**
		 * Core paginate_links.
		 *
		 * @since 1.0.0
		 *
		 * @see https://codex.wordpress.org/Function_Reference/paginate_links Paginate Links codex reference.
		 */
		return paginate_links( array_merge( $this->query_config['paginate_links']['args'], $this->pagination_links_args ) );

	}

	/**
	 * Do paginate links.
	 *
	 * The other option would be to hook in
	 * regular pagination here.
	 *
	 * @since 2.0.0
	 */
	public function do_paginate_links() {

		if ( $this->custom_query->max_num_pages < 2 || true !== $this->query_config['paginate_links']['display'] ) {
			return;
		}
		include( Views::load_view( TBSC_VIEWS_DIR . 'navigation/partials/paginate-links.php' ) );
	}
}