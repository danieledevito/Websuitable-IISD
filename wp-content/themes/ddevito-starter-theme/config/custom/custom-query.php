<?php

/**
 * custom-query.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */


return array(
	'view'           => 'custom/custom-loop.php',
	'new_query'      => function () {
		new \WP_Query( array(
			'posts_per_page'         => 2,
			'posts_per_archive_page' => 1,
			'post_type'              => 'podc_services',
//			'tax_query'              => array(
//				'relation' => 'OR',
//				array(
//					'taxonomy' => 'tax_one',
//					'field'    => 'slug',
//					'terms'    => 'fiction',
//					'operator' => 'NOT IN'
//
//				),
//				array(
//					'taxonomy' => 'tax_one',
//					'field'    => 'slug',
//					'terms'    => 'non-fiction',
//					'operator' => 'NOT IN'
//				),
//			),

		) );
	},
	'args'           => array(
		'posts_per_page'         => 2,
		'posts_per_archive_page' => 1,
		'post_type'              => 'podc_services',
//		'tax_query'              => array(
//			'relation' => 'OR',
//			array(
//				'taxonomy' => 'tax_one',
//				'field'    => 'slug',
//				'terms'    => 'fiction',
//				'operator' => 'NOT IN'
//
//			),
//			array(
//				'taxonomy' => 'tax_one',
//				'field'    => 'slug',
//				'terms'    => 'non-fiction',
//				'operator' => 'NOT IN'
//			),
//		),

	),
	'paginate_links' => array(
		'display' => true,
		'args'    => array(
			'show_all'           => false,
			'end_size'           => 1,
			'mid_size'           => 2,
			'prev_next'          => true,
			'prev_text'          => __( '<i class="fa fa-chevron-circle-left">Prev<span class="screen-reader-text">Previous Page</span></i>' ),
			'next_text'          => __( '<i class="fa fa-chevron-circle-right">Next<span class="screen-reader-text">Next Page</span></i>' ),
			'type'               => 'plain',
			'add_args'           => false,
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => '',
		),

	),
);