<?php

/**
 * Class FrontPage
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Pages;

use TBSC_Core\Support\Views;
use TBSC\Base\Template;
use TBSC\Pages\Page;
use TBSC_Core\Support\CustomData;

/**
 * Class FrontPage
 *
 * @package TBSC\Pages
 */
class FrontPage {

	/**
	 * Custom Post Meta
	 *
	 * @var
	 */
	protected $front_meta;


	/**
	 * Custom Post Meta common to all pages and posts.
	 *
	 * @var
	 */
	protected $common_meta;

	public function __construct() {
		$this->front_meta = CustomData::get_the_post_meta( '_tbsc_front_custom_post', false )[0];

		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_common_custom_post_meta', false )[0];
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

		add_action( 'ezra_after_header', array( $this, 'getPageContent' ) );

	}

	/**
	 * Output the slider area.
	 *
	 * @since 1.0.0
	 */
	public function getPageContent() {
		echo "<div class='frontpage-content-wrap'><div class='frontpage-content-inner'>";
		echo "<div class='banner-wrap'><div class='banner-wrap-inner'><h1>Featured</h1></div></div>";
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/featuredMain.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/featuredNews.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/featuredPapers.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/featuredArticles.php' ) );
		echo "</div></div>";
	}



}