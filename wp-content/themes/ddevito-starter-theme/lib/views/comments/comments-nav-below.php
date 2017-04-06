<?php

/**
 * Comment navigation
 *
 * For paginated comments.
 * Set in Settings > Discussion.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
	<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ezra' ); ?></h2>
	<div class="nav-links">

		<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'ezra' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'ezra' ) ); ?></div>

	</div><!-- .nav-links -->
</nav><!-- #comment-nav-below -->