<?php

/**
 * Class Views
 *
 * Validates and loads view files.
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Support;

use InvalidArgumentException;
use RuntimeException;

class Views {

	public static function load_view( $filepath_plus_name ) {

		$view = $filepath_plus_name;
		if ( self::is_file_valid( $view ) ) {
			return $view;
		}

		return null;

	}

	protected static function is_file_valid( $file ) {

		if ( ! $file ) {
			throw new InvalidArgumentException( __( 'A view filename must not be empty.', 'podc' ) );
		}
		if ( ! is_readable( $file ) ) {
			throw new RuntimeException( sprintf( '%s %s', __( 'The specified view file is not readable', 'podc' ), $file ) );
		}
		return true;

	}

}