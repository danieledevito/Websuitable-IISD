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
	the_archive_title( '<h1 class="postCatTitle">', '</h1>' );
	the_archive_description( '<h2 class="postCatDesc">', '</h2>' );
	?>
</header>

