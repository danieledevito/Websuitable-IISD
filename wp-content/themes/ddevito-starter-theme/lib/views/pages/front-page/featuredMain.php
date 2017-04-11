<?php
/**
 * @author: Daniele De Vito
 * @date: 4/2/2017
 */
use TBSC_Core\Support\CustomData;

$posts_array = get_posts(
    array(
        'posts_per_page' => 4,
        'post_type' => 'featured_items',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'tax_one',
                'field' => 'slug',
                'terms' => 'main-featured'
            )
        )
    )
);
?>

<div class="featuredMain__wrap">
    <div class="featuredMain__inner">
        <?php
            $intCount = 0;
            foreach($posts_array as $post){
                $metaArray = get_post_meta( $post->ID, "_featured_items_custom_meta", false )[0];
                if($intCount == 0){
                    ?>
                    <div class="featured-item item-1">
                        <?php if($metaArray['featured_items_story_link']){ ?>
                            <a href="<?php echo $metaArray['featured_items_story_link']; ?>">
                        <?php } ?>
                        <div class="darken-overlay"></div>
                        <div class="imgWrap">
                            <?php echo get_the_post_thumbnail($post->ID);?>
                        </div>
                        <div class="colour-bar"></div>
                        <div class="title">
                            <h3>SUSTAINABLE<br/>INFRASTRUCTURE<br/>PRIMER</h3>
                            <?php

//                            echo '<h3>' . $metaArray['featured_items_story_title'] . '</h3>';
                            if($metaArray['featured_items_story_subtitle']){
                                echo $metaArray['featured_items_story_subtitle'];
                            }
                            ?>
                        </div>
                        <?php if($metaArray['featured_items_story_link']){ ?>
                            </a>
                        <?php } ?>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="featured-item" style='background: url("<?php echo get_the_post_thumbnail_url($post->ID);?>") no-repeat center center;background-size: cover;-webkit-background-size: cover;'>
                    <?php if($metaArray['featured_items_story_link']){ ?>
                        <a href="<?php echo $metaArray['featured_items_story_link']; ?>">
                    <?php } ?>
                        <div class="darken-overlay"></div>
                        <div class="imgWrap"></div>
                        <div class="colour-bar"></div>
                        <div class="title">
                            <?php
                            echo '<h3>' . $metaArray['featured_items_story_title'] . '</h3>';
                            if($metaArray['featured_items_story_subtitle']){
                                echo '<p>' . $metaArray['featured_items_story_subtitle'] . '</p>';
                            }
                            ?>
                        </div>
                        <?php if($metaArray['featured_items_story_link']){ ?>
                            </a>
                        <?php } ?>
                    </div>
                    <?php
                }
                $intCount++;
            }
        ?>
    </div>
</div>