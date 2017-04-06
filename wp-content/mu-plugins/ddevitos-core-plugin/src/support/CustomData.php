<?php

/**
 * Class CustomData
 *
 * Offers a number of helper methods for dealing with custom
 * post meta data and site option data.
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Support;

class CustomData {

	/**
	 * ==============================================
	 *
	 * Custom Post Meta
	 *
	 * ==============================================
	 */

	/**
	 * Get Post Meta
	 *
	 * Checks if page is the posts page to
	 * ensure the correct post ID is used.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key     Optional array key.
	 * @param bool true/false Whether to return a single value.
	 * @return mixed
	 */
	public static function get_the_post_meta( $key = '0', $single = false ) {
		$id = is_home() ? get_option( 'page_for_posts' ) : get_the_ID();
		return get_post_meta( $id, $key, $single );
	}

	/**
	 * Retrieve the post meta array.
	 *
	 * Useful for checking post meta for blog and archive pages.
	 *
	 * @since 2.0.0
	 *
	 * @return mixed
	 */
	public static function get_post_meta_array() {
		$id = is_home() ? get_option( 'page_for_posts' ) : get_the_ID();
		return get_post_meta( $id );
	}

	/**
	 * ==============================================
	 *
	 * Theme options table.
	 *
	 * ==============================================
	 */

	/**
	 * Get theme options.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key         Options table key.
	 * @param bool|false $default Default value if not data available.
	 *
	 * @return mixed
	 */
	public static function get_theme_option( $key = '0', $default = false ) {
		return get_option( $key, $default );
	}

	/**
	 * ==============================================
	 *
	 * Custom Taxonomies and Terms
	 *
	 * ==============================================
	 */

	/**
	 * Get the custom terms / taxonomies for the post.
	 *
	 * @since 3.0.0
	 *
	 * @param string $taxonomy_slug
	 * @return array
	 */
	public static function get_the_custom_terms( $taxonomy_slug ) {
		$id = is_home() ? get_option( 'page_for_posts' ) : get_the_ID();
		return get_the_terms( $id, $taxonomy_slug );
	}

	/**
	 * Output list items with links to term archives within a custom taxonomy.
	 *
	 * @param string $taxonomy
	 */
	public static function do_custom_term_link_list( $taxonomy ) {

		$terms_in_tax = get_terms( $taxonomy );

		// I don't actually want to show the Popular category term on the page.
		foreach ( $terms_in_tax as $term ) {

			$link = get_term_link( $term );
			$name = $term->name;

			echo '<li><a href="' . $link . '">' . $name . '</a></li>';

		}

	}

	/**
	 * Output a dropdown menu for custom taxonomies.
	 *
	 * @since 3.0.0
	 *
	 * @param string $taxonomy    Taxonomy ID.
	 * @param string $title       Title for screen readers.
	 * @param string $select_text Category select prompt text.
	 */
	public static function do_custom_term_dropdown_list( $taxonomy, $title, $select_text = 'Select Category' ) {

		$terms = get_terms( $taxonomy );

		include( Views::load_view( TBSC_CORE_VIEWS_DIR . 'custom/custom-tax-dropdown.php' ) );

	}

	/**
	 * ==============================================
	 *
	 * Helpers
	 *
	 * ==============================================
	 */

	/**
	 * Check for post meta data.
	 *
	 * Checks for the key in the custom post meta array,
	 * and also checks to see if that key is empty.
	 * This prevents undefined index errors and spitting out
	 * empty code.
	 *
	 * @since 1.0.0
	 *
	 * @param string $array_key Post meta array key.
	 * @param array $array Post meta array.
	 *
	 * @return bool Returns true if the key exists and there is data there.
	 */
	public static function available( $array_key, $array ) {

		if ( ( $array ) && ( is_array( $array ) && ( array_key_exists( $array_key, $array ) ) && ( !empty( $array[ $array_key ] ) ) ) ) {
			return true;
		}

		return false;
	}
}