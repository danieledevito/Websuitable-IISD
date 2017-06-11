<?php
/**
 * @author: Daniele De Vito
 * @date: 4/9/2017
 */

$posts_array = get_posts(
    array(
        'posts_per_page' => 4,
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'category' => wp_get_post_categories(get_the_ID())[0]
    )
);
?>
<div class="singlePostSidebar">
    <div class="singlePostSidebar__inner">
        <h3 <?php if($this->common_meta['post_color']){ echo "style='color:#" . $this->common_meta['post_color'] . "';";} ?>>Featured</h3>
        <div class="postSection sidebarSection">
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
        <?php if($this->common_meta['post_issues']){ ?>
            <h3 <?php if($this->common_meta['post_color']){ echo "style='color:#" . $this->common_meta['post_color'] . "';";} ?>>
                Issues
            </h3>
            <div class="sidebarSection issues">
                <p><?php echo $this->common_meta['post_issues']; ?></p>
            </div>
        <?php }?>

        <?php if($this->common_meta['post_actors']){ ?>
            <h3 <?php if($this->common_meta['post_color']){ echo "style='color:#" . $this->common_meta['post_color'] . "';";} ?>>
                Regions
            </h3>
            <div class="sidebarSection issues">
                <p><?php echo $this->common_meta['post_actors']; ?></p>
            </div>
        <?php }?>

        <?php if($this->common_meta['post_regions']){ ?>
            <h3 <?php if($this->common_meta['post_color']){ echo "style='color:#" . $this->common_meta['post_color'] . "';";} ?>>
                Actors
            </h3>
            <div class="sidebarSection issues">
                <p><?php echo $this->common_meta['post_regions']; ?></p>
            </div>
        <?php }?>
    </div>
</div>