<?php

/**
 * Class PaginateLinks
 *
 * Handles the paginate_links core function.
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Navigation;

use TBSC_Core\Config\I_Config;
use TBSC_Core\Support\Views;

class Pagination {

	/**
	 * Paginate-links arguments.
	 *
	 * Found in config/core/navigation.
	 * Args are passed into the paginate_links function
	 * found in the do_custom_paginate_links method.
	 *
	 * @since 1.0.0
	 *
	 * @var array $paginate_links_args
	 */
	protected $config = array();

	/**
	 * Instantiate PaginateLinks.
	 *
	 * @since 1.0.0
	 *
	 * @param I_Config $config Paginate links config object.
	 *
	 * @return self
	 */
	public function __construct( I_Config $config ) {
		$this->config = $config->load_config();
	}

	/**
	 * Get page number for the present query.
	 *
	 * @since 1.0.0
	 *
	 * @return int $paged       Page number.
	 */
	protected function get_paged() {
		if ( is_front_page() ) {
			$paged = ( get_query_var( 'page' ) ) ? intval( get_query_var( 'page' ) ) : 1;
		} else {
			$paged = ( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : 1;
		}

		return $paged;
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
		return paginate_links( $this->config['args'] );
	}

	/**
	 * Output the paginated links.
	 *
	 * View found in the starter theme /navigation.
	 * From this view either do_pagination_links or do_archive_pagination method is called.
	 *
	 * @since 1.0.0
	 */
	public function do_pagination() {
		// Escape early if there's only one page or display is set to zero in the config file.
		global $wp_query;
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		include( Views::load_view( TBSC_VIEWS_DIR . 'navigation/pagination.php' ) );
	}

//	/**
//	 * Do paginate links.
//	 *
//	 * The other option would be to hook in
//	 * simple pagination here.
//	 *
//	 * @since 2.0.0
//	 */
//	public function do_paginate_links() {
//		include( Views::load_view( TBSC_VIEWS_DIR . 'navigation/partials/paginate-links.php' ) );
//	}
//
//	/**
//	 * Do simple pagination.
//	 *
//	 * The other option would be to hook in
//	 * paginate links here.
//	 *
//	 * @since 2.0.0
//	 */
//	public function do_archive_pagination() {
//		include( Views::load_view( TBSC_VIEWS_DIR . 'navigation/partials/archive-pagination.php' ) );
//	}

}