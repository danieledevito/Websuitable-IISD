<?php
/**
 * class-plugin.php
 *
 * @package    Custom Meta Plugin
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

namespace TBSC_Meta;

use TBSC_Core\Config\ArrayConfig;
use TBSC_Meta\Custom\CustomPostMeta;
use TBSC_Meta\Custom\CustomTermMeta;

class Plugin {

	/**
	 * Current post id.
	 *
	 * @since 1.0.0
	 *
	 * @var int $post_id Current post id.
	 */
	protected $post_id;

	/**
	 * Current post type.
	 *
	 * Either post, page or custom post type slug.
	 *
	 * @since 1.0.0
	 *
	 * @var string $post_type Current post type slug.
	 */
	protected $post_type;

	/**
	 * Current template file name.
	 *
	 * @since 2.0.0
	 *
	 * @var string $template_file File name with php extension.
	 */
	protected $template_file;

	public function run_post_metaboxes() {

		/**
		 * Create these metaboxes on every page.
		 */
		$common_config = (new ArrayConfig( TBSC_META_CONFIG_DIR . 'posts/common.php' ))->load_config();
		$common_custom_post_meta = new CustomPostMeta( $common_config );
		add_action( 'add_meta_boxes', array( $common_custom_post_meta, 'init_metaboxes' ) );
		add_action( 'save_post', array( $common_custom_post_meta, 'save_custom_post_meta' ) );

		/**
		 * Options for Posts Only.
		 */
		$posts_config = (new ArrayConfig( TBSC_META_CONFIG_DIR . 'posts/posts.php' ))->load_config();
		$single_posts_custom_meta = new CustomPostMeta( $posts_config );
		add_action( 'add_meta_boxes', array( $single_posts_custom_meta, 'init_metaboxes' ) );
		add_action( 'save_post', array( $single_posts_custom_meta, 'save_custom_post_meta' ) );

		/**
		 * ====================
		 *
		 * Metaboxes that aren't on every page.
		 *
		 * ====================
		 */
		// Posts Page
		$posts_page_meta_config = (new ArrayConfig( TBSC_META_CONFIG_DIR . 'posts/posts-page.php' ))->load_config();
		$posts_page_meta = new CustomPostMeta( $posts_page_meta_config );
		add_action( 'add_meta_boxes', array( $posts_page_meta, 'init_metaboxes' ) );
		add_action( 'save_post', array( $posts_page_meta, 'save_custom_post_meta' ) );

		// Front Page
		$front_page_meta_config = (new ArrayConfig( TBSC_META_CONFIG_DIR . 'posts/front-page.php' ))->load_config();
		$front_page_meta = new CustomPostMeta( $front_page_meta_config );
		add_action( 'add_meta_boxes', array( $front_page_meta, 'init_metaboxes' ) );
		add_action( 'save_post', array( $front_page_meta, 'save_custom_post_meta' ) );

		// Custom Post Types
		$cpt_custom_meta_config = (new ArrayConfig( TBSC_META_CONFIG_DIR . 'posts/featured_items.php' ))->load_config();
		$cpt_custom_meta = new CustomPostMeta( $cpt_custom_meta_config );
		add_action( 'add_meta_boxes', array( $cpt_custom_meta, 'init_metaboxes' ) );
		add_action( 'save_post', array( $cpt_custom_meta, 'save_custom_post_meta' ) );

		// Page Templates
		$template_page_meta_config = (new ArrayConfig( TBSC_META_CONFIG_DIR . 'posts/template_contact.php' ))->load_config();
		$template_page_meta = new CustomPostMeta( $template_page_meta_config );
		add_action( 'add_meta_boxes', array( $template_page_meta, 'init_metaboxes' ) );
		add_action( 'save_post', array( $template_page_meta, 'save_custom_post_meta' ) );

	}

	/**
	 * Start building metaboxes on term pages.
	 */
	public function run_term_metaboxes() {

		$feature_tabs_custom_term_meta = new CustomTermMeta( new ArrayConfig( TBSC_META_CONFIG_DIR . 'terms/tab-group-terms.php' ) );
		$feature_tabs_custom_term_meta->walk_all_custom_taxonomies();

		$custom_term_meta = new CustomTermMeta( new ArrayConfig( TBSC_META_CONFIG_DIR . 'terms/terms.php' ) );
		$custom_term_meta->walk_all_custom_taxonomies();

	}

}