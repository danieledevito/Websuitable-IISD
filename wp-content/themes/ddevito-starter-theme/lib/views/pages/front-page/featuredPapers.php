<?php
/**
 * @author: Daniele De Vito
 * @date: 4/2/2017
 */
$postArray = get_posts(
    array(
        'category_name' => 'papers',
        'posts_per_page' => 3,
        'offset' => 1
    )
);
?>

<div class="frontPageTitleBar__wrap">
    <div class="frontPageTitleBar__inner">
        <a href="/category/papers/">
            <div class="bar" id="papers">
                <div class="text-wrapper">
                    <div class="text-inner">
                        Papers
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="featuredNews__wrap">
    <div class="featuredNews__inner">
        <?php
        foreach($posts_array as $post){
            $metaArray = get_post_meta( $post['ID'], "_tbsc_single_posts_custom_meta", false )[0];
            ?>
            <div class="featuredNewsItem featuredItemGeneric">
                <?php
                echo '<a href="' . get_the_permalink($post['ID']) . '#storyAnchor">';
                ?>
                <div class="imageWrap" style="
                    <?php
                if(has_post_thumbnail($post['ID'])){
                    echo "background: url('" . get_the_post_thumbnail_url($post['ID']) . "') no-repeat center center;";
                }else{
                    echo "background: url('/images/news.jpg') no-repeat center center;";
                }
                ?>"></div>
                <h3><?php echo $post['post_title']; ?></h3>
                <p>
                    <?php
                    if($metaArray['post_side_bar_text']){
                        echo $metaArray['post_side_bar_text'];
                    }else{
                        echo wp_filter_nohtml_kses($post['post_content']);
                    }

                    ?>
                </p>
                <?php
                echo '</a>';
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>