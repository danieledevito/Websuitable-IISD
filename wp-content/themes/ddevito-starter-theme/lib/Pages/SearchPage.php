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

use TBSC\Posts\Archive;
use TBSC_Core\Support\Views;

class SearchPage extends Archive {

	/**
	 * Output the archive page header.
	 *
	 * For archives this will include the page title
	 * as well as the archive description.
	 *
	 * @since 2.0.0
	 */
	public function do_page_header() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'search/search-page-header.php' ) );
	}

}