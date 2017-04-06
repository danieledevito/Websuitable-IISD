<?php

/**
 * TBSC Theme Options
 *
 * @package    TBSC Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 *
 *
 * @wordpress-plugin
 * Plugin Name:     Theme Options
 * Plugin URI:      http://lmgtfy.com/?q=daniele+de+vito
 * Description:     The plugin adds the theme options.
 * Version:         3.0.0
 * Author:          Daniele De Vito
 * Author URI:      http://lmgtfy.com/?q=daniele+de+vito
 * Text Domain:     ddevito
 */

namespace TBSC_Options;

use TBSC_Core\Config\ArrayConfig;

// Oh no you don't. Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( ! defined( 'TBSC_OPTIONS_PLUGIN_DIR' ) ) {
	define( 'TBSC_OPTIONS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'TBSC_OPTIONS_CONFIG_DIR' ) ) {
	define( 'TBSC_OPTIONS_CONFIG_DIR', TBSC_OPTIONS_PLUGIN_DIR . 'config/' );
}

if ( ! defined( 'TBSC_OPTIONS_PLUGIN_URL' ) ) {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}
	define( 'TBSC_OPTIONS_PLUGIN_URL', $plugin_url );
}

require_once( __DIR__ . '/vendor/autoload.php' );

$tbsc_options = new Plugin( new ArrayConfig( TBSC_OPTIONS_CONFIG_DIR . 'options-page.php' ) );

add_action( 'plugins_loaded', [ $tbsc_options, 'run' ] );
