<?php

/**
 * Page header shown on search results pages
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<header class="search-page-header">
	<h1 class="page-header__heading">
		<?php printf( esc_html__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</header><!-- .page-header -->