<?php
/**
 * archive-page-header.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<header class="page-header container">
	<?php
	the_archive_title( '<h1 class="page-header__heading">', '</h1>' );
	the_archive_description( '<div class="page-header__sub_heading taxonomy-description">', '</div>' );
	?>
</header>

