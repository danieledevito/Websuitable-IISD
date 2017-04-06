<?php

/**
 * Loop view
 *
 * Provides action hooks for content output.
 * Called by any page or post requiring the loop.
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

do_action( 'ezra_before_loop' );

if ( have_posts() ) :

	do_action( 'ezra_before_while' );
	while ( have_posts() ) : the_post();

		do_action( 'ezra_before_entry' );

		/**
		 * ezra_do_entry hook.
		 *
		 * @hooked lib/views/content/
		 */
		do_action( 'ezra_entry' );

		do_action( 'ezra_after_entry' );

	endwhile; //* end of one post
	do_action( 'ezra_after_endwhile' );

else : //* if no posts exist
	do_action( 'ezra_loop_else' );
endif; //* end loop

do_action( 'ezra_after_loop' );


