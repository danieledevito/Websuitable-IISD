<?php
/**
 * PostMeta.php
 *
 * @author    Daniele De Vito
 * @copyright Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Meta;

use TBSC_Core\Support\Views;
use TBSC_Core\Config\I_Config;

class PostMeta {

	/**
	 * Post category count.
	 *
	 * @since 1.0.0
	 *
	 * @var int $post_category_count Category count.
	 */
	protected $post_category_count;

	/**
	 * Post Meta config.
	 *
	 * @since 2.0.0
	 *
	 * @var I_Config $config Config object
	 */
	protected $config;

	public function __construct( I_Config $config ) {
		$this->config = $config->load_config();
	}

	/**
	 * Output the categories list.
	 *
	 * @since 1.0.0
	 */
	public function do_categories_list() {
		$categories_list = get_the_category_list( esc_html__( $this->config['categories']['separator'], 'tbsc' ) );

		include( Views::load_view( TBSC_VIEWS_DIR . 'post-meta/category-list.php' ) );
	}

	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public function is_categorized_blog() {
		if ( $this->count_the_post_categories() > 1 ) {

			// This blog has more than 1 category so categorized_blog should return true.
			return true;

		} else {

			// This blog has only 1 category so categorized_blog should return false.
			return false;

		}
	}

	/**
	 * Count the number of post categories.
	 *
	 * @since 1.0.0
	 *
	 * @return int $all_the_cool_cats           Category count.
	 */
	protected function count_the_post_categories() {
		if ( false === ( $all_the_cool_cats = get_transient( 'ezra_categories' ) ) ) {

			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );
			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'ezra_categories', $all_the_cool_cats );

		}

		return $all_the_cool_cats;
	}

	/**
	 * Output the post tags list.
	 *
	 * Called directly in the entry-header view file.
	 * Can also hook into an event.
	 *
	 * @since 1.0.0
	 */
	public function do_tags_list() {
		$tags_list = get_the_tag_list( '', esc_html__( $this->config['tags']['separator'], 'tbsc' ) );

		include( Views::load_view( TBSC_VIEWS_DIR . 'post-meta/tag-list.php' ) );
	}

	/**
	 * Output the entry date.
	 *
	 * Called directly in the entry-header view file.
	 * Can also hook into an event.
	 *
	 * @since 1.0.0
	 */
	public function do_entry_date() {
		$date = $this->config['entry-date']['format'];

		include( Views::load_view( TBSC_VIEWS_DIR . 'post-meta/entry-date.php' ) );
	}

	/**
	 * Output the modification date of the entry.
	 *
	 * Not called by default.
	 * Can by accessed by any child class view.
	 *
	 * @since 1.0.0
	 */
	public function do_entry_modified_date() {
		$date = $this->config['entry-date']['format'];

		include( Views::load_view( TBSC_VIEWS_DIR . 'post-meta/modified-date.php' ) );
	}

	/**
	 * Output the entry author information.
	 *
	 * @since 1.0.0
	 */
	public function do_entry_author() {
		$author_name = esc_html( get_the_author() );
		$author_link = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );

		include( views::load_view( TBSC_VIEWS_DIR . 'post-meta/entry-author.php' ) );
	}
}