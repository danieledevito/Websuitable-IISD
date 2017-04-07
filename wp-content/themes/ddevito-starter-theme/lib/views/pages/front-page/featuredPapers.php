<?php
/**
 * @author: Daniele De Vito
 * @date: 4/2/2017
 */
$posts_array = get_posts(
    array(
        'posts_per_page' => 3,
        'post_type' => 'featured_items',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'tax_one',
                'field' => 'slug',
                'terms' => 'papers'
            )
        )
    )
);
?>

<div class="frontPageTitleBar__wrap">
    <div class="frontPageTitleBar__inner">
        <div class="bar" id="papers">
            <div class="text-wrapper">
                <div class="text-inner">
                    Papers
                </div>
            </div>
        </div>
    </div>
</div>

<div class="featuredNews__wrap">
    <div class="featuredNews__inner">
        <?php
        foreach($posts_array as $post){
            $metaArray = get_post_meta( $post->ID, "_featured_items_custom_meta", false )[0];
            ?>
            <div class="featuredNewsItem featuredItemGeneric">
                <?php
                if($metaArray['featured_items_story_link']){
                    echo '<a href="' . $metaArray['featured_items_story_link'] . '">';
                }
                echo get_the_post_thumbnail($post->ID);
                if($metaArray['featured_items_story_link']){
                    echo '</a>';
                }
                ?>
                <h3><?php echo $metaArray['featured_items_story_title']; ?></h3>
                <p><?php echo $metaArray['featured_items_story_subtitle']; ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>