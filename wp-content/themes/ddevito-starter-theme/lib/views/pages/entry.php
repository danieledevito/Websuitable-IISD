<?php

/**
 * Entry content
 *
 * This is the default view that will be used in most cases.
 * This shows the full post content.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
use TBSC_Core\Support\CustomData;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<header class="entry-header">
		<h1 class="entry-title"><?php
			if ( CustomData::available( 'custom_title', $this->common_meta ) ) {
				echo $this->common_meta['custom_title'];
			} else {
				the_title();
			}
			?></h1>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>


