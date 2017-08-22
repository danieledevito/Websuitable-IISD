<?php
/**
 * @author: Daniele De Vito
 * @date: 4/2/2017
 */
?>

<div class="frontPageTitleBar__wrap">
    <div class="frontPageTitleBar__inner">
        <a href="/category/articles/">
            <div class="bar" id="articles">
                <div class="text-wrapper">
                    <div class="text-inner">
                        Insight From Experts
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="featuredNews__wrap">
    <div class="featuredNews__inner">
        <?php
        foreach($this->recentArticles as $post){
            $metaArray = get_post_meta( $post['ID'], "_tbsc_single_posts_custom_meta", false )[0];
            ?>
            <div class="featuredNewsItem featuredItemGeneric">
                <?php
                echo '<a href="' . get_the_permalink($post['ID']) . '#f">';
                ?>
                <div class="imageWrap" style="<?php
                if(has_post_thumbnail($post['ID'])){
                    echo "background: url('" . get_the_post_thumbnail_url($post['ID']) . "') no-repeat center center;";
                }else{
                    echo "background: url('/images/artical.jpg') no-repeat center center;";
                }
                ?>"></div>
                <h3><?php echo $post['post_title'] ?></h3>
                <p><?php
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