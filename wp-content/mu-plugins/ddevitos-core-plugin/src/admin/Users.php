<?php

/**
 * User role class
 *
 * @package   TBSC Core
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Core\Admin;

use TBSC_Core\Config\I_Config;

/**
 * Class Users
 *
 * Create user roles.
 *
 * @package TBSC_Core\Admin
 */
class Users {

	/**
	 * User role configuration.
	 *
	 * @since 2.0.0
	 *
	 * @var array $config Config array.
	 */
	protected $config;

	/**
	 * Users constructor.
	 *
	 * @since 2.0.0
	 *
	 * @param I_Config $config User role config object.
	 */
	public function __construct( I_Config $config ) {

		$this->config = $config->load_config();

	}

	/**
	 * Add WordPress user roles.
	 *
	 * @since 2.0.0
	 */
	public function add_user_roles() {
		array_walk( $this->config, function ( $role_key ) {
			add_role(
				$role_key['role'],
				$role_key['display_name'],
				$role_key['capabilities']
			);
		} );
	}



	/**
	 * Remove a user role.
	 *
	 * @since 2.0.0
	 *
	 * @param string $role User role id.
	 */
	public function remove_user_role( $role ) {
		remove_role( $role );
	}

}