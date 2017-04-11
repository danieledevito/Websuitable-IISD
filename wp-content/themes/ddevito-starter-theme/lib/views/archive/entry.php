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
<article class="postEntry" id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
<!--	<a href="--><?php //the_permalink() ?><!--">-->
		<div class="innerPostWrap">
			<?php
				if(has_post_thumbnail()){
					?>
					<div class="forMobile">
						<h2><?php the_title() ?></h2>
<!--						<div class="thumbWrap">--><?php //the_post_thumbnail() ?><!--</div>-->
						<div class="contentWrap"><?php the_excerpt() ?></div>
						<a href="<?php the_permalink(); ?>" class="read-more-button button radius">Read More</a>
					</div>
					<div class="forDesktop">
						<div class="medium-4 column thumbWrap" style='background: url("<?php echo the_post_thumbnail_url() ?>") no-repeat center center'></div>
						<div class="medium-8 column">
							<h2><?php the_title() ?></h2>
							<div class="contentWrap"><?php the_excerpt() ?></div>
							<a href="<?php the_permalink(); ?>" class="read-more-button button radius">Read More</a>
						</div>
					</div>
					<hr/>
					<?php
				}else{
					?>
					<h2><?php the_title() ?></h2>
					<div class="contentWrap"><?php the_content() ?></div>
					<a href="<?php the_permalink(); ?>" class="read-more-button button radius">Read More</a>
					<hr/>
					<?php
				}
			?>
		</div>
<!--	</a>-->
<!--	<header class="entry-header">-->
<!--		<h2 class="entry-title"><a href="--><?php //the_permalink() ?><!--">--><?php
//				if ( CustomData::available( 'custom_title', $this->common_meta ) ) {
//					echo $this->common_meta['custom_title'];
//				} else {
//					the_title();
//				}
//				?><!--</a></h2>-->

<!--		<div class="entry-meta">-->
<!--			Published on --><?php //$post_meta->do_entry_date();?>
<!--		</div>-->
<!--	</header>-->

<!--	<div class="entry-content">-->
<!--		--><?php //the_excerpt(); ?>
<!--	</div>-->
<!---->
<!--	<footer class="entry-footer">-->
<!--		<a href="--><?php //the_permalink(); ?><!--" class="read-more-button button radius">Read More</a>-->
<!--	</footer>-->

</article>