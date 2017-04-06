<?php

/**
 * Config file for registering widget areas
 *
 * This is an array of widget areas and the common markup
 * each widget area is to share.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

return array(
	'default_widget_markup' => array(
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	),

	'widget_areas' => array(
		array(
			'name'          => __( 'Sidebar Left', 'tbscwa' ),
			'id'            => 'sidebar-left',
			'description'   => '',
		),
		array(
			'name'          => __( 'Sidebar Right', 'tbscwa' ),
			'id'            => 'sidebar-right',
			'description'   => '',
		),
		array(
			'name'          => __( 'Sidebar Blog', 'tbscwa' ),
			'id'            => 'sidebar-blog',
			'description'   => '',
		),

	),

);