<?php

/**
 * Page header shown on the posts page
 *
 * The posts page is also known as the blog.
 * This file will also be used on a custom home.php page.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
use TBSC_Core\Support\CustomData;

?>

<header class="page-header container">
	<?php
	if ( CustomData::available( 'custom_title', $this->common_meta ) ) {
		echo '<h1 class="page-header__heading">' . $this->common_meta['custom_title'] . '</h1>';
	} else {
		echo '<h1 class="page-header__heading">' . get_the_title( get_option( 'page_for_posts', true ) ) . '</h1>';
	}
	?>
</header>
