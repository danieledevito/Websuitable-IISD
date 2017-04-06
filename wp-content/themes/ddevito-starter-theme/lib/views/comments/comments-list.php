<?php

/**
 * Comment list view
 *
 * wp_list_comments outputs the post comments.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

?>

<div class="comment-list">
	<?php
	wp_list_comments( array(
		'walker'            => null,
		'max_depth'         => '',
		'style'             => 'div',
		'callback'          => array( $this, 'do_custom_comment_framework' ),
		'end-callback'      => null,
		'type'              => 'all',
		'reply_text'        => 'Reply',
		'page'              => '',
		'per_page'          => '',
		'avatar_size'       => 100,
		'reverse_top_level' => null,
		'reverse_children'  => '',
		'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
		'short_ping'        => false,   // @since 3.6
		'echo'              => true     // boolean, default is true
	) );

	?>
</div><!-- .comment-list -->
