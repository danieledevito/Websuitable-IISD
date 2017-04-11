<?php
/**
 * @author: Daniele De Vito
 * @date: 4/9/2017
 */
use TBSC_Core\Support\CustomData;
$postMeta = CustomData::get_the_post_meta( '_tbsc_single_posts_custom_meta', false )[0];

?>

<div class="postHeaderWrap">
    <div class="topBar"><div class="topBarInner"></div></div>
    <div class="catColorBar" style="background: #<?php if($postMeta){ echo $postMeta['post_color']; } ?>;"></div>
</div>