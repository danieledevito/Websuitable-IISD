<?php

/**
 * Class Home
 *
 * Extends ArchivePage which extends Post.
 * Instantiated with the home.php template file.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Posts;

use TBSC_Core\Support\Views;

class Home extends Archive {

	/**
	 * Output the posts page page header.
	 *
	 * For the posts page this typically includes
	 * the page title only.
	 *
	 * @since 2.0.0
	 */
	public function do_page_header() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'home/posts-page-page-header.php' ) );
	}


}