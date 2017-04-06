<?php
/**
 *
 *
 * @package    Custom Meta Plugin
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:     Custom Meta
 * Plugin URI: http://lmgtfy.com/?q=daniele+de+vito
 * Description:     Custom metaboxes and custom fields.
 * Version:         1.0.0
 * Author:          Daniele De Vito
 * Text Domain:     meta
 */

namespace TBSC_Meta;

/**
 * Start Path Declaration's
 */
if ( ! defined( 'TBSC_META_PLUGIN_DIR' ) ) {
	define( 'TBSC_META_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'TBSC_META_SOURCE_DIR' ) ) {
	define( 'TBSC_META_SOURCE_DIR', TBSC_META_PLUGIN_DIR . 'src/' );
}

if ( ! defined( 'TBSC_META_VIEW_DIR' ) ) {
	define( 'TBSC_META_VIEW_DIR', TBSC_META_SOURCE_DIR . 'views/' );
}

if ( ! defined( 'TBSC_META_CONFIG_DIR' ) ) {
	define( 'TBSC_META_CONFIG_DIR', TBSC_META_PLUGIN_DIR . 'config/' );
}
/**
 * End Path Declaration's
 */

require_once( TBSC_META_PLUGIN_DIR . '/vendor/autoload.php' ); //Composer initialization

// get_current_screen will not be defined if we do not ensure we are in admin first.
if ( is_admin() ) {

	$tbsc_meta = new Plugin();
	add_action( 'plugins_loaded', array( $tbsc_meta, 'run_post_metaboxes' ) );
	add_action( 'init', array( $tbsc_meta, 'run_term_metaboxes' ) );

}


