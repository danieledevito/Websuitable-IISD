<?php
/**
 * @author: Daniele De Vito
 * @date: 4/18/2017
 */
?>
<div class="about-banner-upper"></div>
<div class="about-banner-upper-custom"></div>
<div class="about-banner" <?php
if(has_post_thumbnail()){
    echo 'style="background: url(\'' . get_the_post_thumbnail_url() . '\') no-repeat center center;"';
}
?>>
    <div class="about-banner__inner ">
    </div>
</div>
