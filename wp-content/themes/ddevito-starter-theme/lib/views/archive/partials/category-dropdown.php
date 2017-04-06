<?php

/**
 * category-dropdown.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

the_widget(
	'WP_Widget_Categories',
	array(
		'title' => 'Filter By:',
		'dropdown' => '1',
	)
);