<?php

/**
 * Child Header
 *
 * Hooks into ezra_header
 *
 * header tags added by the tbsc-core plugin in mu-plugins.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

use TBSC_Core\Navigation\Foundation_Menu_Walker;
use TBSC_Core\Navigation\Foundation_Mobile_Menu_Walker;

?>
<div class="site-header__inner row column">
	<div class="logo">
		<?php $this->do_logo(); ?>
	</div>

	<div class="title-bar" data-responsive-toggle="tof-drill-down-menu" data-hide-for="medium">
		<button class="menu-icon" rel="js-menu-toggle" type="button" data-toggle></button>
		<div class="title-bar-title">Menu</div>
	</div>

	<div class="top-bar" id="tof-drill-down-menu">

		<div class="top-bar-right primary-menu-wrap">
			<nav id="site-navigation" class="tbsc-nav primary-menu" itemscope
			     itemtype="http://schema.org/SiteNavigationElement">

				<div class="hide-for-medium" rel="js-mobile-menu">
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => '',
						'menu_class'     => 'menu vertical',
						'before'         => '',
						'after'          => '',
						'link_before'    => '',
						'link_after'     => '',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
						'menu'           => '',
						'walker'         => new Foundation_Menu_Walker(),
					) );
				}
				?>
				</div>
				<div class="show-for-medium" rel="js-desktop-menu">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'container'      => '',
							'menu_class'     => 'menu dropdown',
							'before'         => '',
							'after'          => '',
							'link_before'    => '',
							'link_after'     => '',
							'items_wrap'     => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
							'menu'           => '',
							'walker'         => new Foundation_Menu_Walker(),
						) );
					}
					?>
				</div>
			</nav><!-- #site-navigation -->

		</div>
	</div>
</div>


