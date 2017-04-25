<?php

/**
 * Class SearchPage
 *
 * Extends Archive which extends Post
 * Replaces search.php template.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Pages;

use TBSC_Core\Navigation\Pagination;
use TBSC_Core\Support\Views;
use TBSC_Core\Config\ArrayConfig;
use TBSC_Core\Support\CustomData;

class SearchPage {

	public function __construct() {

		$this->pagination = new Pagination(
			new ArrayConfig( TBSC_CONFIG_DIR . 'navigation/paginate-links-search.php' )
		);
		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_common_custom_post_meta', false )[0];
	}

	public function do_the_entry() {
		add_action( 'ezra_before_entry', array( $this, 'do_page_header' ) );
		add_action( 'ezra_entry', array( $this, 'do_page_content' ) );
		add_action( 'ezra_after_loop', array( $this->pagination, 'do_pagination' ) );
	}

	public function do_page_header() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'search/search-page-header.php' ) );
	}

	public function do_page_content() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'archive/entry.php' ) );
	}
}