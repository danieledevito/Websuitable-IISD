<?php

/**
 * class-shortcodes.php
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

namespace TBSC_Options\Shortcodes;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

class Shortcodes {

	public static function tbsc_business_info() {
		$options = CustomData::get_theme_option( 'as_settings', true );
		include( Views::load_view( TBSC_OPTIONS_PLUGIN_DIR . 'src/views/shortcodes/business-schema.php' ) );
	}

}


//function tbsc_business_info() {
//
//}
//add_shortcode( 'business_info', __NAMESPACE__ . '\\tbsc_business_info' );