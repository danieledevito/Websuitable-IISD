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
<div class="catLandingHeader">
	<div class="topBar">
		<div class="inner"></div>
	</div>
	<div class="catColorBar"></div>
	<div class="imageWrap"></div>
</div>
<header class="page-header container">
	<?php
	the_archive_title( '<h1 class="postCatTitle">', '</h1>' );
	echo '<h2 class="postCatDesc">' . get_term_meta(get_query_var('cat'), '_pagetitle', true) . '</h2>';
	the_archive_description( '<p calss="postDesc">', '</p>' );
	?>
</header>

