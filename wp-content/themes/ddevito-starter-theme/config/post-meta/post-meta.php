<?php

/**
 * Post entries config array
 *
 * May be extended by other entries that use posts,
 * ie: posts page, archives, search results, etc.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */


$date_format = '';

return array(
		'categories'        => array(
				'separator' => ' ',
		),
		'tags'        => array(
				'separator' => ' ',
		),

		'after-entry'        => array(
		),
		'entry-date'            => array(
				'format'      => array(
						'date-posted-att'       => esc_attr( get_the_date( 'c' ) ),
						'date-posted-display'   => esc_html( get_the_date( $date_format ) ),
						'date-modified-att'     => esc_attr( get_the_modified_date( 'c' ) ),
						'date-modified-display' => esc_html( get_the_modified_date( $date_format ) ),
				),
		),
		'entry-modification-date'   => array(
		),
		'entry-author'          => array(
		),

		'single-post-navigation'   => array(
		),
);