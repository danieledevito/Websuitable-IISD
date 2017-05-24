<?php
/**
 * @author: Daniele De Vito
 * @date: 4/8/2017
 */
use TBSC_Core\Support\CustomData;

$posts_array = get_posts(
    array(
        'posts_per_page' => 4,
        'post_type' => 'post',
        'orderby' => 'menu_order',
        'order' => 'DESC',
        'category_name' => get_queried_object()->slug
    )
);
//var_dump($posts_array);
?>

<div class="catPageSideBar">
    <h3>FEATURED</h3>
    <div class="catPageSideBar__inner">
        <?php
        foreach($posts_array as $post){
            echo '<div class="featuredPostWrap">';
            echo '<a href="' . get_post_permalink($post->ID) . '">';
            ?>
            <div class="featuredPost__inner row">
                <?php if(has_post_thumbnail($post->ID)){
                    ?>
                        <div class="small-4 column featuredPostThumb"
                             style='background: url("<?php echo get_the_post_thumbnail_url($post->ID); ?>") no-repeat center center'
                        >
                        </div>
                        <div class="small-8 column featuredPostContent">
                            <h4><?php
                                echo $post->post_title
                                ?></h4>
                        </div>
                    <?php
                }else{
                    ?>
                    <div class="small-12 column featuredPostContent">
                        <h4><?php echo $post->post_title ?></h4>
                    </div>
                    <?php
                }?>

            </div>
            <?php
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>
</div>