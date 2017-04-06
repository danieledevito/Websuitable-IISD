<?php

/**
 * Class Foundation_Menu_Walker
 *
 * Adds Foundation dropdown class to menu items.
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Navigation;

use Walker_Nav_Menu;

class Foundation_Menu_Walker extends Walker_Nav_Menu {

	/**
	 * Alter the start_lvl method.
	 *
	 * @since 1.0.0
	 *
	 * @param string $output
	 * @param int $depth
	 * @param array $args
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu submenu first-sub vertical sub-menu\">\n";
	}

}

