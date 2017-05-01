<?php
/**
 * @author: Daniele De Vito
 * @date: 4/2/2017
 */
use TBSC_Core\Support\CustomData;


$featuredNewsPost = wp_get_recent_posts(array(
    'posts_per_page' => 1,
    'category_name' => 'news'
));
$featuredNewsPostMeta = get_post_meta($featuredNewsPost[0]['ID'], "_tbsc_single_posts_custom_meta",false)[0];

$featuredArticalPost = wp_get_recent_posts(array(
    'posts_per_page' => 1,
    'category_name' => 'articals'
));
$featuredArticalPostMeta = get_post_meta($featuredArticalPost[0]['ID'], "_tbsc_single_posts_custom_meta",false)[0];

$featuredPaperPost = wp_get_recent_posts(array(
    'posts_per_page' => 1,
    'category_name' => 'papers'
));
$featuredPaperPostMeta = get_post_meta($featuredPaperPost[0]['ID'], "_tbsc_single_posts_custom_meta",false)[0];

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

        <div class="featured-item item-1">
            <a href="">
                <div class="darken-overlay"></div>
                <div class="imgWrap">
                    <img src="<?php echo $this->front_meta['frontpage_featured_item_pic']; ?>" alt="<?php echo $this->front_meta['frontpage_featured_item_title']; ?>"/>
                </div>
                <div class="colour-bar"></div>
                <div class="title">
                    <?php echo $this->front_meta['frontpage_featured_item_title']; ?>
                </div>
            </a>
        </div>

        <div class="featured-item" style='
            background: url("<?php
            if(has_post_thumbnail($featuredNewsPost[0]['ID'])){
                echo get_the_post_thumbnail_url($featuredNewsPost[0]['ID']);
            }else{
                echo '/images/news.jpg';
            }
            ?>") no-repeat center center;background-size: cover;-webkit-background-size: cover;'
            >
            <a href="">
                <div class="darken-overlay"></div>
                <div class="imgWrap"></div>
                <div class="colour-bar"></div>
                <div class="title">
                    <h3><?php echo $featuredNewsPost[0]['post_title']; ?></h3>
                    <p><?php echo $featuredNewsPostMeta['post_side_bar_text'] ?></p>
                </div>
            </a>
        </div>

        <div class="featured-item" style='
            background: url("<?php
        if(has_post_thumbnail($featuredPaperPost[0]['ID'])){
            echo get_the_post_thumbnail_url($featuredPaperPost[0]['ID']);
        }else{
            echo '/images/papers.jpg';
        }
        ?>") no-repeat center center;background-size: cover;-webkit-background-size: cover;'
            >
            <a href="">
                <div class="darken-overlay"></div>
                <div class="imgWrap"></div>
                <div class="colour-bar"></div>
                <div class="title">
                    <h3><?php echo $featuredPaperPost[0]['post_title']; ?></h3>
                    <p><?php echo $featuredPaperPostMeta['post_side_bar_text'] ?></p>
                </div>
            </a>
        </div>

        <div class="featured-item" style='
            background: url("<?php
        if(has_post_thumbnail($featuredArticalPost[0]['ID'])){
            echo get_the_post_thumbnail_url($featuredArticalPost[0]['ID']);
        }else{
            echo '/images/artical.jpg';
        }
        ?>") no-repeat center center;background-size: cover;-webkit-background-size: cover;'
            >
            <a href="">
                <div class="darken-overlay"></div>
                <div class="imgWrap"></div>
                <div class="colour-bar"></div>
                <div class="title">
                    <h3><?php echo $featuredArticalPost[0]['post_title']; ?></h3>
                    <p><?php echo $featuredArticalPostMeta['post_side_bar_text'] ?></p>
                </div>
            </a>
        </div>



    </div>
</div>