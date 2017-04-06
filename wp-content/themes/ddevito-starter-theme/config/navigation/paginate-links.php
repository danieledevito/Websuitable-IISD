<?php

/**
 * Paginate Links configuration file
 *
 * This is the default paginate links configuration file.
 * Config file set in main-config.php.
 * Child theme can declare a different config file and override this one.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

return array(

	// Core function arguments.
	'args'  => array(
		//	'base'               => '%_%', //Calculated dynamically by the class-paginate-links.php
		//	'format'             => '?page=%#%', // Calculated dynamically by the class-paginate-links.php
		//	'total'              => 1, // Calculated dynamically by the class-paginate-links.php
		//	'current'            => 0, // Calculated dynamically by the class-paginate-links.php
			'show_all'           => False,
			'end_size'           => 1,
			'mid_size'           => 2,
			'prev_next'          => True,
			'prev_text'          => __('&laquo;'),
			'next_text'          => __('&raquo;'),
			'type'               => 'plain',
			'add_args'           => False,
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		),

);