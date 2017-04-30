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

class Archive {

	/**
	 * =========================================================
	 *
	 * Meta data pertaining to the Archive Page itself.
	 *
	 * Single post meta data needs to be grabbed in the loop,
	 * so that variable is set in the view.
	 *
	 * =========================================================
	 */

	/**
	 * Custom post meta data for the archive page itself, not the listings.
	 *
	 * Only useful if you have a page template set using custom fields.
	 *
	 * Custom meta for each post happens in the view as the post ID is required
	 * and is only grabbed in the loop.
	 *
	 * @since 2.0.0
	 *
	 * @var array $meta
	 */
//	protected $custom_meta;

	/**
	 * Pagination object.
	 *
	 * Handles archive pagination.
	 * Can output either paginate_links or
	 * the more generic archive pagination
	 * with simple prev and next links.
	 *
	 * @since 1.0.0
	 *
	 * @var Pagination
	 */
	protected $pagination;

	/**
	 * Custom Post Meta common to all pages and posts.
	 *
	 * This pertains to the archive page itself.
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
		 * Create new pagination object.
		 *
		 * Pagination handles output of the pagination
		 * section markup and then you can hook in
		 * either basic archive pagination or the
		 * cooler paginate links output.
		 *
		 * @since 2.0.0
		 */
		$this->pagination = new Pagination(
			new ArrayConfig( TBSC_CONFIG_DIR . 'navigation/paginate-links.php' )
		);
		$this->options = CustomData::get_theme_option("iisd_settings");
		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_common_custom_post_meta', false )[0];

	}

	/**
	 * Do the entry.
	 *
	 * @since 3.0.0
	 */
	public function do_the_entry() {


		add_action( 'ezra_before_loop', array( $this, 'do_page_header' ) );
		// Load pagination from the pagination object found in tbsc-core plugin.
		add_action( 'ezra_before_loop', array( $this, 'wrapEntry' ) );
		add_action( 'ezra_entry', array( $this, 'do_page_content' ) );
		add_action( 'ezra_after_loop', array( $this->pagination, 'do_pagination' ) );
		add_action( 'ezra_after_loop', array( $this, 'endWrap' ) );
//		add_action( 'ezra_before_footer', array( $this, 'endPageWrap' ) );

	}

	public function wrapEntry() {
		?>
		<div class="landingBodyWrap">
			<div class="postWrap">
		<?php
	}

	public function endWrap() {
		?>
			</div>
			<div class="sideBarWrap">
				<?php include( Views::load_view( TBSC_VIEWS_DIR . 'postcatlanding/sidebar.php' ) ); ?>
			</div>
		</div>
		<?php
	}

	public function do_page_content() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'archive/entry.php' ) );
	}

	public function do_page_header() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'archive/archive-page-header.php' ) );

	}

//	public function do_category_dropdown() {
//		include( Views::load_view( TBSC_VIEWS_DIR . 'archive/partials/category-dropdown.php' ) );
//	}

}