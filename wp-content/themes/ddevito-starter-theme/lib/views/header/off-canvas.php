<?php

/**
 * Off canvas menu
 *
 * Opening markup for the off-canvas foundation menu.
 * Menu appears on mobile only.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

use TBSC_Core\Navigation\Foundation_Mobile_Menu_Walker;

?>
<div class="off-canvas-wrapper">
	<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

		<div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-position="left">
			<button class="close-button" aria-label="Close alert" type="button" data-toggle="offCanvasLeft">
				<span aria-hidden="true">&times;</span>
			</button>
			<a href="<?php bloginfo( 'url' ); ?>" class="ofc-home"><img src="/images/logo.png"/></a>
			<nav class="off-canvas-navigation">
				<ul class="off-canvas-navigation__items">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array(
							'theme_location'  => 'primary',
							'container'       => 'nav',
							'container_class' => 'off-canvas-navigation',
							'menu_class'      => 'mobile-menu',
							'menu_id'         => '',
							'items_wrap'      => '%3$s',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'walker'          => new Foundation_Mobile_Menu_Walker(),
						) );
					}
					?>
				</ul>
			</nav>
		</div><!-- #offCanvasLeft -->
		<div class="off-canvas-content" data-off-canvas-content>
			<div class="title-bar hide-for-large">
				<div class="title-bar-left">
					<button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
				</div>
				<div class="text-center">
					SUSTAINABLE INFRASTRUCTURE PORTAL
				</div>
			</div><!-- .title-bar -->


