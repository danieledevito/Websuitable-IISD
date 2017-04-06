<?php
/**
 * show-hooks.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

/**
 * Show all the action hooks available in core.
 *
 * @since 2.0.0
 */
function tbsc_core_show_all_hooks() {
	$style = 'border: 1px solid #cc0000; background: #ddd; color: #cc0000; width: 100%; height: 30px; border-radius: 5px; padding-left: 2em;';
	add_action( 'ezra_start_page_load', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_start_page_load</p></div>';
	});
	add_action( 'ezra_after_body_open', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_body_open</p></div>';
	});
	add_action( 'ezra_before_header', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_header</p></div>';
	});
	add_action( 'ezra_header', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_header</p></div>';
	});
	add_action( 'ezra_after_header', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_header</p></div>';
	});
	add_action( 'ezra_before_content_sidebar_wrap', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_content_sidebar_wrap</p></div>';
	});
	add_action( 'ezra_after_content_wrap_open', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_content_wrap_open</p></div>';
	});
	add_action( 'ezra_site_inner', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_site_inner</p></div>';
	});
	add_action( 'ezra_before_content_wrap_close', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_content_wrap_close</p></div>';
	});
	add_action( 'ezra_after_content_sidebar_wrap', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_content_sidebar_wrap</p></div>';
	});
	add_action( 'ezra_before_footer', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_footer</p></div>';
	});
	add_action( 'ezra_footer', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_footer</p></div>';
	});
	add_action( 'ezra_after_footer', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_footer</p></div>';
	});
	add_action( 'ezra_before_body_close', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_body_close</p></div>';
	});

	/**
	 * The Loop and entries
	 */
	add_action( 'ezra_before_loop', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_loop</p></div>';
	});
	add_action( 'ezra_before_while', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_while</p></div>';
	});
	add_action( 'ezra_before_entry', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_entry</p></div>';
	});
	add_action( 'ezra_before_entry_header', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_entry_header</p></div>';
	});
	add_action( 'ezra_entry_header', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_entry_header</p></div>';
	});
	add_action( 'ezra_after_entry_header', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_entry_header</p></div>';
	});
	add_action( 'ezra_before_entry_content', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_entry_content</p></div>';
	});
	add_action( 'ezra_entry_content', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_entry_content</p></div>';
	});
	add_action( 'ezra_after_entry_content', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_entry_content</p></div>';
	});
	add_action( 'ezra_before_entry_footer', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_entry_footer</p></div>';
	});
	add_action( 'ezra_entry_footer', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_entry_footer</p></div>';
	});
	add_action( 'ezra_after_entry_footer', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_entry_footer</p></div>';
	});
	add_action( 'ezra_after_entry', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_entry</p></div>';
	});
	add_action( 'ezra_after_endwhile', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_endwhile</p></div>';
	});
	add_action( 'ezra_loop_else', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_loop_else</p></div>';
	});
	add_action( 'ezra_after_loop', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_loop</p></div>';
	});

	/**
	 * Post Navigation
	 */
	add_action( 'ezra_before_single_post_navigation', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_single_post_navigation</p></div>';
	});
	add_action( 'ezra_single_post_navigation', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_single_post_navigation</p></div>';
	});
	add_action( 'ezra_after_single_post_navigation', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_single_post_navigation</p></div>';
	});

	/**
	 * Pagination
	 */
	add_action( 'ezra_before_archive_pagination', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_archive_pagination</p></div>';
	});
	add_action( 'ezra_archive_pagination', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_archive_pagination</p></div>';
	});
	add_action( 'ezra_after_archive_pagination', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_archive_pagination</p></div>';
	});

	/**
	 * Sidebars
	 */
	add_action( 'ezra_before_sidebar_wrap', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_sidebar_wrap</p></div>';
	});
	add_action( 'ezra_before_sidebar_widgets', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_before_sidebar_widgets</p></div>';
	});
	add_action( 'ezra_sidebar', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_sidebar</p></div>';
	});
	add_action( 'ezra_after_sidebar_widgets', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_sidebar_widgets</p></div>';
	});
	add_action( 'ezra_after_sidebar_wrap', function() use ( $style ) {
		echo '<div style="' . $style . '"><p>ezra_after_sidebar_wrap</p></div>';
	});

}



