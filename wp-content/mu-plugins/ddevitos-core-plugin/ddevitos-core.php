<?php

/**
 * TBSC Core Functionality Plugin
 *
 * @package   WP Core
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito,
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:     WP Core
 * Description:     Core functionality plugin. Put in the mu-plugins directory.
 * Version:         1.0.0
 * Author:          Daniele De Vito
 * Text Domain:     tbsc-core
 */

namespace TBSC_Core;

// Oh no you don't. Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ! defined( 'TBSC_CORE_PLUGIN_DIR' ) ) {
	define( 'TBSC_CORE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'TBSC_CORE_VIEWS_DIR' ) ) {
	define( 'TBSC_CORE_VIEWS_DIR', TBSC_CORE_PLUGIN_DIR . '/src/views/' );
}

if ( ! defined( 'TBSC_CORE_PLUGIN_URL' ) ) {
	$plugin_url = plugin_dir_url( __FILE__ );
	define( 'TBSC_CORE_PLUGIN_URL', $plugin_url );
}

// Autoload Core Config and Render View functionality as needed by other plugins.
require_once( __DIR__ . '/vendor/autoload.php' );

