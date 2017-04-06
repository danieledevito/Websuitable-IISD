<?php
/**
 * Media.php
 *
 * @package   tbsc-2
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Support;

class Media {

	/**
	 * Get the url for the featured image.
	 *
	 * @since 3.0.0
	 *
	 * @param string $size The image size.
	 *
	 * @return mixed
	 */
	public static function get_ft_image_url( $size = 'full' ) {

		$thumb_id        = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src( $thumb_id, $size, true );
		$thumb_url       = $thumb_url_array[0];

		return $thumb_url;
	}

	/**
	 * Get the alt attr value for the featured image.
	 *
	 * @since 3.0.0
	 *
	 * @return string
	 */
	public static function get_ft_image_alt() {
		$thumb_id  = get_post_thumbnail_id();
		$thumb_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );

		return $thumb_alt;
	}

	/**
	 * Get the featured image markup.
	 *
	 * @since 3.0.0
	 *
	 * @return mixed
	 */
	public static function get_ft_image_code() {
		$thumb_id        = get_post_thumbnail_id();
		$thumbnail_image = wp_get_attachment_image( $thumb_id, 'portfolio-archive' );

		return $thumbnail_image;
	}

}