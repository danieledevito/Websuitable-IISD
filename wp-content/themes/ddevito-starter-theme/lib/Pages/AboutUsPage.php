<?php

/**
 * Class Page
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Pages;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

class AboutUsPage {

	/**
	 * Custom Post Meta common to all pages and posts.
	 *
	 * @var
	 */
	protected $common_meta;

	public function __construct() {

		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_common_custom_post_meta', false )[0];
	}


	public function do_the_entry() {

		add_action('ezra_after_header',array( $this, 'getBanner' )  );
		add_action( 'ezra_entry',    array( $this, 'do_page_content' ) );
		add_action( 'ezra_before_footer',    array( $this, 'getAboutUsFooter' ) );

	}

	public function do_page_content() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'aboutpage/content.php' ) );
	}
	public function getBanner(){
		include( Views::load_view( TBSC_VIEWS_DIR . 'aboutpage/banner.php' ) );
	}
	public function getAboutUsFooter(){
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/common/donate-footer.php' ) );
	}

}