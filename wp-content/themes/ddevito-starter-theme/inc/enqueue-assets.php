<?php

/**
 * Enqueue all the things.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

/**
 * Enqueue styles.
 *
 * @since 1.0.0
 */
function styles() {

	// Enqueue Google fonts
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,400i,700|Roboto:300,400,400i,500,700', array(), '1.0.0' );
	// Enqueue Font Awesome
	wp_enqueue_style( 'MY_THEME-FontAwesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'custom-styles',
		get_stylesheet_directory_uri() . '/assets/dist/css/app.css' . '?' . filemtime( get_stylesheet_directory() . '/assets/dist/css/app.css' )
	);

	wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/assets/dist/css/fonts.css' . '?' . filemtime( get_stylesheet_directory() . '/assets/dist/css/fonts.css' ));
}


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\styles', 99 );


/**
 * Enqueue scripts.
 *
 * @since 1.0.0
 */
function scripts() {

	// Add core Foundation js to footer
	wp_enqueue_script( 'foundation-js', get_stylesheet_directory_uri() . '/assets/dist/js/foundation.js', array( 'jquery' ), '6.2.0', true );

//	wp_enqueue_script( 'foundation-init', get_stylesheet_directory_uri() . '/inc/js/foundation_init.js', array( 'foundation-js' ), '', true );

	// Custom minified JavaScript
	wp_enqueue_script( 'foundation_starter_appjs', get_stylesheet_directory_uri() . '/assets/dist/js/app.min.js', array( 'foundation-js' ), '', true );

//	wp_enqueue_script( 'mdl-js', 'https://code.getmdl.io/1.1.1/material.min.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts' );