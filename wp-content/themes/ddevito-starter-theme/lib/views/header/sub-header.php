<?php
/**
 * @author: Daniele De Vito
 * @date: 4/1/2017
 */
use TBSC_Core\Navigation\Foundation_Menu_Walker;

?>
<div class="siteSubHeader">
    <div class="siteSubHeaderInner">

        <div class="primaryMenu">
            <nav id="site-navigation" class="primary-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => '',
                        'menu_class' => 'dropdown menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
                        'menu' => '',
                        'walker' => new Foundation_Menu_Walker(),
                    ));
                }
                ?>
            </nav>
            <!-- #site-navigation -->
        </div>
        <div class="search-bar-wrap">
            <?php get_search_form(true); ?>
        </div>
    </div>
</div>