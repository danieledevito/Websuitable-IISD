<?php

/**
 * hero.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
use TBSC_Core\Support\CustomData;
?>

<header class="hero page-header with-background container">
	<?php
	if ( CustomData::available( 'custom_title', $this->common_meta ) ) {
		echo '<h1 class="page-header__heading">' . $this->common_meta['custom_title'] . '</h1>';
	} else {
		the_title( '<h1 class="page-header__heading">', '</h1>' );
	}
	?>
</header>