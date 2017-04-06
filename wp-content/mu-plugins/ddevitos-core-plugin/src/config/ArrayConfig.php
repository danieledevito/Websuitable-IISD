<?php

/**
 * class-array-config.php
 *
 * @author    Daniele De Vito
 * @copyright Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Config;

use InvalidArgumentException;
use RuntimeException;

class ArrayConfig implements I_Config {

	protected $config;

	public function __construct( $filepath_plus_name ) {

		$this->config = $filepath_plus_name;

	}


	/***************************
	 * Helpers
	 **************************/
	/**
	 * Loads the config file
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function load_config() {
		if ( $this->is_file_valid( $this->config ) ) {
			return include $this->config;
		}

		return null;
	}

	/**
	 * Build the config file's full qualified path
	 *
	 * @since 1.0.0
	 *
	 * @param string $file
	 * @return bool
	 *
	 * @throws InvalidArgumentException
	 * @throws RuntimeException
	 */
	protected function is_file_valid( $file ) {
		if ( ! $file ) {
			throw new InvalidArgumentException( __( 'A config filename must not be empty.', 'tbsccore' ) );
		}
		if ( ! is_readable( $file ) ) {
			throw new RuntimeException( sprintf( '%s %s', __( 'The specified config file is not readable', 'tbsccore' ), $file ) );
		}
		return true;
	}

}