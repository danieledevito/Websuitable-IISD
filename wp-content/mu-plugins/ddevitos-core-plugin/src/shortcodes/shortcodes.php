<?php
/**
 * shortcodes.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

function row( $atts, $content = null ) {

	return '<div class="row">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'row', __NAMESPACE__ . '\\row' );

function column( $atts, $content = null ) {

	$a = shortcode_atts( array(
		'class' => '',
	), $atts );

	return '<div class="' . $a['class'] . '">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'column', __NAMESPACE__ . '\\column' );

function font_awesome( $atts ) {

	$a = shortcode_atts( array(
		'stack-bg' => 'circle',
		'icon' => 'code-fork',
		'size' => 'lg',
	), $atts );

	$html = '<span class="fa-stack fa-' . $a['size'] . '">';
	$html .= '<i class="fa fa-' . $a['stack-bg'] . ' fa-stack-2x"></i>';
	$html .= '<i class="fa fa-' . $a['icon'] . ' fa-stack-1x fa-inverse"></i>';
	$html .= '</span>';

	return $html;
}

add_shortcode( 'font_awesome', __NAMESPACE__ . '\\font_awesome' );

function tbsc_button( $atts, $content = null ) {

	$a = shortcode_atts( array(
		'class' => '',
		'link' => '/contact/',
	), $atts );

	$html = '<a href="'. $a['link'] .'" class="button' . ' ' . $a['class'] . '">';
	$html .= $content;
	$html .= '</a>';

	return $html;
}

add_shortcode( 'tbsc_button', __NAMESPACE__ . '\\tbsc_button' );

/**
 * Set figure max-width to 100%
 *
 * @param $width
 *
 * @return int
 */
function update_gallery_shortcode_width( $width ) {
	return 100;
}

add_filter( 'img_caption_shortcode_width', __NAMESPACE__ . '\\update_gallery_shortcode_width');

/**
 * Change caption shortcode to have max-width rather than width.
 *
 * The inline width style prevented images wrapped in figure element from responding to screen
 * width changes.
 *
 * @param string $output
 * @param $attr
 * @param $content
 *
 * @return string
 */
function fix_wordpress_caption( $output = '', $attr, $content ) {

	if ( $output != '' )
		return $output;

	$atts = shortcode_atts( array(
		'id'	  => '',
		'align'	  => 'alignnone',
		'width'	  => '',
		'caption' => '',
		'class'   => '',
	), $attr, 'caption' );

	$atts['width'] = (int) $atts['width'];
	if ( $atts['width'] < 1 || empty( $atts['caption'] ) )
		return $content;

	if ( ! empty( $atts['id'] ) )
		$atts['id'] = 'id="' . esc_attr( sanitize_html_class( $atts['id'] ) ) . '" ';

	$class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

	$html5 = current_theme_supports( 'html5', 'caption' );
	// HTML5 captions never added the extra 10px to the image width
	$width = $html5 ? $atts['width'] : ( 10 + $atts['width'] );

	/**
	 * Filter the width of an image's caption.
	 *
	 * By default, the caption is 10 pixels greater than the width of the image,
	 * to prevent post content from running up against a floated image.
	 *
	 * @since 3.7.0
	 *
	 * @see img_caption_shortcode()
	 *
	 * @param int    $width    Width of the caption in pixels. To remove this inline style,
	 *                         return zero.
	 * @param array  $atts     Attributes of the caption shortcode.
	 * @param string $content  The image element, possibly wrapped in a hyperlink.
	 */
	$caption_width = apply_filters( 'img_caption_shortcode_width', $width, $atts, $content );

	$style = '';
	if ( $caption_width )
		$style = ''; // Set to an empty string b/c there's no good reason to put an inline style here.

	$html = '';
	if ( $html5 ) {
		$html = '<figure ' . $atts['id'] . $style . 'class="' . esc_attr( $class ) . '">'
		        . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
	} else {
		$html = '<div ' . $atts['id'] . $style . 'class="' . esc_attr( $class ) . '">'
		        . do_shortcode( $content ) . '<p class="wp-caption-text">' . $atts['caption'] . '</p></div>';
	}

	return $html;
}

add_filter( 'img_caption_shortcode', __NAMESPACE__ . '\\fix_wordpress_caption', 10, 3 );

function phone( $atts ) {
	$phone = ( CustomData::get_theme_option( 'tbsc_settings' )['contact_phone'] );

	$a = shortcode_atts( array(
		'number' => $phone,
	), $atts );

	if ( ! $a['number'] ) {
		$a['number'] = $phone;
		$call = preg_replace( "/[^0-9]/", "", $phone );
	} else {
		$call = preg_replace( "/[^0-9]/", "", $a['number'] );
	}

	$html = '<span class="desktop-only">' . $a['number'] . '</span>';
	$html .= '<a href="tel:1+' . $call . '" class="mobile-only">' . $a['number'] . '</a>';
	
	return $html;

}

add_shortcode( 'phone', __NAMESPACE__ . '\\phone' );