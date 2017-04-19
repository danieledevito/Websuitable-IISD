<?php
/**
 * @author: Daniele De Vito
 * @date: 4/18/2017
 */
?>
<div class="about-banner" <?php
if(has_post_thumbnail()){
    echo 'style="background: url(\'' . get_the_post_thumbnail_url() . '\') no-repeat center center;"';
}
?>>
    <div class="about-banner__inner ">
        <h1 <?php if(has_post_thumbnail()){echo 'class="hasBg"';} ?>><?php the_title(); ?></h1>
    </div>
</div>
