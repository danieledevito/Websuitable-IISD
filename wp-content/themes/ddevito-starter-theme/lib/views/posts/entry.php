<?php
/**
 * entry.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
use TBSC_Core\Support\CustomData;
use TBSC_Core\Config\ArrayConfig;
use TBSC_Core\Meta\PostMeta;

$common_meta = get_post_meta( get_the_ID(), '_tbsc_common_custom_post_meta', true );

$single_post_meta = get_post_meta( get_the_ID(), '_tbsc_single_posts_custom_meta', true );

$post_meta = new PostMeta(
	new ArrayConfig( TBSC_CONFIG_DIR . 'post-meta/post-meta.php' )
);
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

		<div class="entry-meta">
			Published on <?php $post_meta->do_entry_date();?>
		</div>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<footer class="entry-footer">

	</footer>

</article>