<?php

/**
 * TBSC Custom Post Types
 *
 * @author     Daniele De Vito
 * @link       http://lmgtfy.com/?q=daniele+de+vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 *
 *
 * @wordpress-plugin
 * Plugin Name:     Custom Post Types
 * Plugin URI:      http://lmgtfy.com/?q=daniele+de+vito
 * Description:     Custom Post Type Plugin
 * Version:         1.0.0
 * Author:          Daniele De Vito
 * Author URI:      http://lmgtfy.com/?q=daniele+de+vito
 * Text Domain:     nathin
 */

namespace TBSC_CPT;

use TBSC_Core\Config\ArrayConfig;

// Oh no you don't. Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheating&#8217; uh?' );
}
if ( ! defined( 'TBSC_CPT_PLUGIN_DIR' ) ) {
	define( 'TBSC_CPT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'TBSC_CPT_CONFIG_DIR' ) ) {
	define( 'TBSC_CPT_CONFIG_DIR', TBSC_CPT_PLUGIN_DIR . 'config/' );
}

if ( ! defined( 'TBSC_CPT_PLUGIN_URL' ) ) {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}
	define( 'TBSC_CPT_PLUGIN_URL', $plugin_url );
}

require_once( __DIR__ . '/vendor/autoload.php' );


$tbsc_cpt = new Plugin();
add_action( 'plugins_loaded', array( $tbsc_cpt, 'run' ), 1 );

