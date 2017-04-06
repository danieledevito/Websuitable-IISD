<?php

/**
 * Comments link shown on archive pages
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

	<span class="comments-link">
		<?php comments_popup_link( esc_html__( 'Leave a comment', 'tbsc' ), esc_html__( '1 Comment', 'tbsc' ), esc_html__( '% Comments', 'tbsc' ) ); ?>
	</span>

<?php endif; ?>
