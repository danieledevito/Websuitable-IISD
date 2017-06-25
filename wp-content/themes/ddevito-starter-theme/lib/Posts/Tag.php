<?php

/**
 * Class Archive
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

class Tag {

	protected $pagination;
	protected  $options;
	protected $common_meta;
	protected  $listOfPostsWithTag;

	public function __construct() {

		$this->pagination = new Pagination(
			new ArrayConfig( TBSC_CONFIG_DIR . 'navigation/paginate-links.php' )
		);
		$this->options = CustomData::get_theme_option("iisd_settings");
		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_common_custom_post_meta', false )[0];

	}

	public function do_the_entry() {

		add_action( 'ezra_before_loop', array( $this, 'do_page_header' ) );
		add_action( 'ezra_entry', array( $this, 'do_page_content' ) );
		add_action( 'ezra_after_loop', array( $this->pagination, 'do_pagination' ) );

	}
	public function do_page_content() {
		?>
		<div class="row tagBodyWrap">
			<div class="tagBodyInner">
				<?php include( Views::load_view( TBSC_VIEWS_DIR . 'tag/body.php' ) ); ?>
			</div>
		</div>
		<?php
	}

	public function do_page_header() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'tag/header.php' ) );
	}

//	public function do_category_dropdown() {
//		include( Views::load_view( TBSC_VIEWS_DIR . 'archive/partials/category-dropdown.php' ) );
//	}

}