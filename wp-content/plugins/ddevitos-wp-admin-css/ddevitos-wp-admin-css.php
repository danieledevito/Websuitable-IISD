<?php
/**
 * Plugin Name: Wordpress Admin CSS
 * Plugin URI: http://danieledevito.com
 * Description: Ability to add CSS to your website within the Wordpress admin panel.
 * Author: Daniele De Vito
 * Author URI: http://danieledevito.com
 * Version: 0
 * Text Domain: ddevitos-wp-admin-css
 *
 * @package SCCSS
 * @author John Regan
 * @version 3.2
 */

// Prevent direct file access
if( ! defined( 'ABSPATH' ) ) {
	die();
}

define( 'SCCSS_FILE', __FILE__ );

if( ! is_admin() ) {
	require_once dirname( SCCSS_FILE ) . '/includes/public.php';
} elseif( ! defined( 'DOING_AJAX' ) ) {
	require_once dirname( SCCSS_FILE ) . '/includes/admin.php';
}

