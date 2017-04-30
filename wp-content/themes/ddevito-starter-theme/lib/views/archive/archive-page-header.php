<?php
/**
 * archive-page-header.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
var_dump(get_query_var('cat'));
var_dump($this->options);
$currentCatId = get_query_var('cat');
if($currentCatId == 6){
	//News
	$featuredPostId = $this->options['id_of_featured_news'];
}elseif($currentCatId == 7){
	//Papers
	$featuredPostId = $this->options['id_of_featured_papers'];
}elseif($currentCatId == 8){
	//Papers
	$featuredPostId = $this->options['id_of_featured_articals'];
}

$featuredPostMeta = get_post_meta($featuredPostId, '_tbsc_single_posts_custom_meta', true);


?>
<div class="catLandingHeader">
	<div class="topBar">
		<div class="inner"></div>
	</div>
	<div class="catColorBar"></div>
	<div class="imageWrap"
		<?php
		if(get_the_post_thumbnail_url($featuredPostId)){
			?>
			style='background: url("<?php echo get_the_post_thumbnail_url($featuredPostId); ?>") no-repeat center center'
			<?php
		}
		?>
		></div>
</div>
<header class="page-header container">
	<?php
	the_archive_title( '<h1 class="postCatTitle">', '</h1>' );
	echo '<h2 class="postCatDesc">' . get_the_title($featuredPostId) . '</h2>';
	if($featuredPostMeta['post_summary']){
		echo $featuredPostMeta['post_summary'];
	}else{
		echo get_the_excerpt($featuredPostId);
	}
	?>
</header>

