<?php
/**
 * @author: Daniele De Vito
 * @date: 5/2/2017
 */
use TBSC_Core\Support\CustomData;

$posts = get_posts(array('include' => '196, 147'));

?>
<div class="container">
    <div class="sustainable-development">
        <div class="sustainable-development__inner">
            <?php
            foreach($posts as $post){
                $postMeta = get_post_meta($post->ID,'_tbsc_single_posts_custom_meta', true);
                ?>
                <div class="post-wrapper">
                    <div class="post-image-wrap">
                    <div class="post-image" style="background: url('<?php echo get_the_post_thumbnail_url($post->ID); ?>') no-repeat center center; -webkit-background-size: cover;background-size: cover;">
                    </div>
                    </div>
                    <div class="post-title">
                        <div class="title-bar">
                        </div>
                        <div class="sub-title-bar" style="background: #<?php echo $postMeta['post_color'] ?>"></div>
                        <h1><?php echo $post->post_title; ?></h1>
                    </div>
                    <div class="post-content">
                        <?php echo $post->post_content; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>