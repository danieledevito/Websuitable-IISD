<?php
/**
 * class-plugin.php
 *
 * @package    Custom Post Types
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

namespace TBSC_CPT;

use TBSC_Core\Config\ArrayConfig;

final class Plugin {

	public function run() {

		// Services
		$config = (new ArrayConfig( TBSC_CPT_CONFIG_DIR . 'featured_items.php'))->load_config();
		$services = new Custom\CustomPostsTaxonomies( $config );
		add_action( 'init', array( $services, 'init_cpt_registration' ) );

	}

}