<?php

/**
 * archive-page-navigation.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<div class="nav-links row">

	<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous medium-6 columns"><?php next_posts_link( __( 'Older posts', 'tbsc' ) ); ?></div>
	<?php endif; ?>

	<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next medium-6 columns"><?php previous_posts_link( __( 'Newer posts', 'tbsc' ) ); ?></div>
	<?php endif; ?>

</div><!-- .nav-links -->
