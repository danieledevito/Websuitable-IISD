<?php

/**
 * functions.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC_Core\Admin\Users;
use TBSC_Core\Plugin;
use TBSC_Core\Config\ArrayConfig;
use TBSC_Core\Navigation\FoundationMenu;

require_once( get_stylesheet_directory() . '/vendor/autoload.php' );

include( get_stylesheet_directory() . '/inc/woo.php' );
include( get_stylesheet_directory() . '/inc/shortcodes.php' );

if ( ! defined( 'TBSC_CONFIG_DIR' ) ) {
	define( 'TBSC_CONFIG_DIR', get_stylesheet_directory() . '/config/' );
}

if ( ! defined( 'TBSC_VIEWS_DIR' ) ) {
	define( 'TBSC_VIEWS_DIR', get_stylesheet_directory() . '/lib/views/' );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

// Fired on every page load
add_action( 'after_setup_theme', __NAMESPACE__ . '\\theme_setup', 15 );

/**
 * Theme Setup
 *
 * This is where we start Core, and other important things.
 *
 * @since 2.0.0
 */
function theme_setup() {

	/**
	 * Show all action hooks available in core.
	 *
	 * Just comment this out to hide the hooks.
	 *
	 * @since 2.0.0
	 */
//	tbsc_core_show_all_hooks();

	/**
	 * Instantiate Core
	 *
	 * Core runs a few tasks that are required for every theme:
	 * - Widget Area / Sidebar Registration
	 * - Menu Registration
	 *
	 * These items are easily configured by using the core-config array.
	 *
	 * @since 2.0.0
	 */
	global $tbsc_core;
	$tbsc_core = new Plugin( new ArrayConfig( TBSC_CONFIG_DIR . 'core-config.php' ) );

	$tbsc_core->run();

	/**
	 * Initialize Foundation Menu Styles
	 *
	 * @since 2.0.0
	 */
	$tbsc_foundation_menu_styles = new FoundationMenu();
	$tbsc_foundation_menu_styles->init();

	/**
	 * Instantiate Users Object
	 *
	 * @since 2.0.0
	 */
	$tbsc_user_roles = new Users( new ArrayConfig( TBSC_CONFIG_DIR . 'users/user-roles.php' ) );
	$tbsc_user_roles->add_user_roles();
	$role = get_role( 'tbsc_client_admin' );
	$role->add_cap('level_7'); // Have to add this so user can be made author of blog posts.

	add_editor_style();

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'woocommerce' );


	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_action( 'wp_head', __NAMESPACE__ . '\\do_favicon' );
//	add_action( 'wp_footer', __NAMESPACE__ . '\\override_gravity_forms', 99999 );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Set up the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'custom_background_args', array(
//			'default-color' => 'ffffff',
//			'default-image' => '',
//	) ) );

	/**
	 * Remove the editor from the front page if you're using metaboxes for all content.
	 *
	 * @since 3.0.0
	 */
//	add_action( 'add_meta_boxes', __NAMESPACE__ . '\\remove_editor_on_front' );

	add_filter( 'gform_confirmation_anchor', '__return_false' ); // sucks when the form doesn't validate.

}

function remove_editor_on_front() {

	global $post;
	if ( $post->ID === get_option( 'page_on_front' ) ) {
		remove_post_type_support( 'page', 'editor' );
	}
}

/**
 * Making things look awesome.
 *
 * @since 1.0.0
 */
function do_favicon() {
	?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
	<?php
}

/**
 * Let's override Gravity Forms styles.
 *
 * @since 1.0.0
 */
function override_gravity_forms() {
	?>
	<link rel='stylesheet' href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/gravity_form.css" type='text/css'
	      media='all'/>
	<?php
}

add_action('admin_enqueue_scripts',  __NAMESPACE__ . '\\admin_style');

function admin_style(){
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/dist/css/admin_featured_items.css');
}
