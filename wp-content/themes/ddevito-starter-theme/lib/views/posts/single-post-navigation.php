<?php

/**
 * Single post navigation links
 *
 * Hooks into ezra_single_post_navigation action hook.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<div class="tbsc-section container">
	<nav class="navigation single-post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'tbsc' ); ?></h2>

		<div class="nav-links row">
			<div class="medium-6 column">
				<div class="nav-previous">
					<h2><?php previous_post_link( '%link', '<span class="single_post_navigation__heading">Previous Story</span><span class="single_post_nagivation__title">%title</span>' ); ?></h2>
				</div>
			</div>
			<div class="medium-6 column">
				<div class="nav-next">
					<h2><?php next_post_link( '%link', '<span class="single_post_navigation__heading">Next Story</span><span class="single_post_nagivation__title">%title</span>' ); ?></h2>
				</div>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
</div><!-- end .tbsc-section .container -->

