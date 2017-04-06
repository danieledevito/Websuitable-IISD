<?php

/**
 * Comment list header
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>
<h2 class="comments-title">
	<?php
	printf( // WPCS: XSS OK.
		esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'ezra' ) ),
		number_format_i18n( get_comments_number() ),
		'<span>' . get_the_title() . '</span>'
	);
	?>
</h2>
