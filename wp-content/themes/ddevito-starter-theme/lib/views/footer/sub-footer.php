<?php

/**
 * Default sub-footer view
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
use TBSC_Core\Navigation\Foundation_Menu_Walker;
?>

<section class="sub-footer">
	<div class="sub-footer__inner">
<!--			<p>&copy; --><?php //echo date('Y') . ' ' . $this->options['copyright_text']; ?><!--</p>-->
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => '',
					'menu_class'     => 'dropdown menu',
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
</section>
