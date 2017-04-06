<?php
/**
 * TemplateExample.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Pages;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

class TemplateExample {

	/**
	 * Custom Post Meta common to all pages and posts.
	 *
	 * @var
	 */
	protected $common_meta;

	public function __construct() {

		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_common_custom_post_meta', false )[0];
	}

}