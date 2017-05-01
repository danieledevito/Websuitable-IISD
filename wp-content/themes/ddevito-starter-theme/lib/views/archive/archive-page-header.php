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
	<div class="imageWrap"
		<?php
		if(get_the_post_thumbnail_url($this->featuredPostId)){
			?>
			style='background: url("<?php echo get_the_post_thumbnail_url($this->featuredPostId); ?>") no-repeat center center'
			<?php
		}
		?>
		></div>
</div>
<header class="page-header container">
	<?php
	the_archive_title( '<h1 class="postCatTitle">', '</h1>' );
	echo '<h2 class="postCatDesc">' . get_the_title($this->featuredPostId) . '</h2>';
	if($this->featuredPostMeta['post_summary']){
		echo $this->featuredPostMeta['post_summary'];
	}else{
		echo get_the_excerpt($this->featuredPostId);
	}
	?>
	<div>
	<a style="margin-top:1.16rem;background: #083166" href="<?php get_the_permalink($this->featuredPostId); ?>" class="read-more-button button radius">Read More</a>
	</div>
</header>

