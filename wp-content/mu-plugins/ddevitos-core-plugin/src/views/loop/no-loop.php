<?php

/**
 * No loop
 *
 * Called by the 404 page as the loop is not necessary for that page.
 * May be used by any static html entries that don't use WordPress post editor.
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

do_action( 'ezra_before_loop' );

do_action( 'ezra_before_entry' );

/**
 * ezra_do_entry hook.
 *
 * @hooked lib/views/content/
 */
do_action( 'ezra_do_entry' );

do_action( 'ezra_after_entry' );

do_action( 'ezra_after_loop' );


