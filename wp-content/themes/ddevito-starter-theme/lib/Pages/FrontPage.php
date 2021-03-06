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
	protected $postsOnPage;
	protected $newsPosts;
	protected $articlePosts;
	protected $papersPosts;

	protected $recentPapers;
	protected $recentNews;
	protected $recentArticles;
	/**
	 * Custom Post Meta common to all pages and posts.
	 *
	 * @var
	 */
	protected $common_meta;

	public function __construct() {

		$this->postsOnPage = array();
		$this->newsPosts = wp_get_recent_posts(array(
			'numberposts' => 5,
			'category' => '6'
		));
		// foreach($this->newsPosts as $newsPost){
		// 	array_push($this->postsOnPage, $newsPost['ID']);
		// }
		$this->recentNews = array($this->newsPosts[0],$this->newsPosts[1],$this->newsPosts[2]);

		$this->articlePosts = wp_get_recent_posts(array(
			'numberposts' => 4,
			'category' => 8
		));
		// foreach($this->articlePosts as $articlePost){
		// 	array_push($this->postsOnPage, $articlePost['ID']);
		// }
		$this->recentArticles = array($this->articlePosts[0],$this->articlePosts[1],$this->articlePosts[2]);

		$this->papersPosts = wp_get_recent_posts(array(
			'numberposts' => 4,
			'category' => 7
		));
		$this->recentPapers = array($this->papersPosts[0],$this->papersPosts[1],$this->papersPosts[2]);

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
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/banner.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/sustainable-infrastructure.php' ) );
//		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/featuredMain.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/featuredNews.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/featuredPapers.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/front-page/featuredArticles.php' ) );
		echo "</div></div>";
	}



}