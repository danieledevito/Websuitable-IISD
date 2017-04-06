<?php

/**
 * Class FoundationMenu
 *
 * Works with the walker class extensions to
 * support foundation menu styles and functions.
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Navigation;

use TBSC_Core\Config;

class FoundationMenu {

	/**
	 * Init hooks.
	 *
	 * Putting methods in their place.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		add_filter( 'wp_nav_menu',                              array( $this, 'add_class_to_nav_menu' ) );
		add_filter( 'nav_menu_css_class',                       array( $this, 'do_has_dropdown_foundation_class' ) );
		add_filter( 'foundation_off_canvas_nav_menu_start_el',  array( $this, 'add_label_tag_for_foundation_headings' ) );

	}

	/**
	 * Add Foundation style to nav menu.
	 *
	 * @since 1.0.0
	 *
	 * @param string $class
	 *
	 * @return string $class    Amended menu css class.
	 */
	public function add_class_to_nav_menu( $class ){

		$class = str_replace('current-menu-item', 'current-menu-item active', $class);

		return $class;

	}


	/**
	 * Add Foundation dropdown class to nav menu if there is a submenu.
	 *
	 * @since 1.0.0
	 *
	 * @param array $classes    Current classes.
	 *
	 * @return array $classes   Amended classes.
	 */
	public function do_has_dropdown_foundation_class( $classes ){

		if ( in_array( 'menu-item-has-children', $classes) ) {
			$classes[] = 'has-dropdown menu nested';
		}

		return $classes;

	}

	/**
	 * Replace empty links with label tags for the off-canvas menu.
	 *
	 * @since 1.0.0
	 *
	 * @param string $item_output       Menu item markup.
	 *
	 * @return string $item_output      New menu item markup.
	 */
	function add_label_tag_for_foundation_headings( $item_output ) {

		if ( false === strpos( $item_output, 'href' ) ) {
			$item_output = str_replace( 'a>', 'label>', $item_output );
			return $item_output;
		}

		return $item_output;

	}


}