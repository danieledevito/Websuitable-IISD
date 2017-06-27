<?php
/**
 * @author: Daniele De Vito
 * @date: 4/2/2017
 */
use TBSC_Core\Support\CustomData;
?>



<div class="featuredMain__wrap">
    <div class="featuredMain__inner">

        <div class="featured-item item-1">
            <a href="/sustainable-development/">
                <div class="darken-overlay"></div>
                <div class="imgWrap">
                    <img src="<?php echo $this->front_meta['frontpage_featured_item_pic']; ?>" alt="<?php echo $this->front_meta['frontpage_featured_item_title']; ?>"/>
                </div>
                <div class="title">
                    <h3>SUSTAINABLE<br/>INFRASTRUCTURE<br/>PRIMER</h3>
                </div>
            </a>
        </div>



        <div class="featured-item" style='
            background: url("<?php
            if(has_post_thumbnail($this->newsPosts[1]['ID'])){
                echo get_the_post_thumbnail_url($this->newsPosts[1]['ID']);
            }else{
                echo '/images/news.jpg';
            }
            ?>") no-repeat center center;background-size: cover;-webkit-background-size: cover;'
            >
            <a href="<?php echo get_the_permalink($this->newsPosts[0]['ID']); ?>#storyAnchor">
                <div class="darken-overlay"></div>
                <div class="imgWrap"></div>
<!--                <div class="colour-bar"></div>-->
                <div class="title">
                    <h3><?php echo $this->newsPosts[0]['post_title']; ?></h3>
<!--                    <p>--><?php //echo $this->newsPostsMeta['post_side_bar_text'] ?><!--</p>-->
                </div>
            </a>
        </div>

        <div class="featured-item" style='
            background: url("<?php
        if(has_post_thumbnail($this->papersPosts[0]['ID'])){
            echo get_the_post_thumbnail_url($this->papersPosts[0]['ID']);
        }else{
            echo '/images/papers.jpg';
        }
        ?>") no-repeat center center;background-size: cover;-webkit-background-size: cover;'
            >
            <a href="<?php echo get_the_permalink($this->papersPosts[0]['ID']); ?>#storyAnchor">
                <div class="darken-overlay"></div>
                <div class="imgWrap"></div>
<!--                <div class="colour-bar"></div>-->
                <div class="title">
                    <h3><?php echo $this->papersPosts[0]['post_title']; ?></h3>
<!--                    <p>--><?php //echo $this->papersPostsMeta['post_side_bar_text'] ?><!--</p>-->
                </div>
            </a>
        </div>

        <div class="featured-item" style='
            background: url("<?php
        if(has_post_thumbnail($this->articlePosts[0]['ID'])){
            echo get_the_post_thumbnail_url($this->articlePosts[0]['ID']);
        }else{
            echo '/images/artical.jpg';
        }
        ?>") no-repeat center center;background-size: cover;-webkit-background-size: cover;'
            >
            <a href="<?php echo get_the_permalink($this->articlePosts[0]['ID']); ?>#storyAnchor">
                <div class="darken-overlay"></div>
                <div class="imgWrap"></div>
<!--                <div class="colour-bar"></div>-->
                <div class="title">
                    <h3><?php echo $this->articlePosts[0]['post_title']; ?></h3>
<!--                    <p>--><?php //echo $this->articlePostsMeta['post_side_bar_text'] ?><!--</p>-->
                </div>
            </a>
        </div>



    </div>
</div>