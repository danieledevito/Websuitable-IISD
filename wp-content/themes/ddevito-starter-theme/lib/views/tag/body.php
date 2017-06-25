<?php
/**
 * @author: Daniele De Vito
 * @date: 6/25/2017
 */

?>

<?php
/**
 * entry.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
use TBSC_Core\Support\CustomData;
use TBSC_Core\Config\ArrayConfig;
use TBSC_Core\Meta\PostMeta;

$common_meta = get_post_meta( get_the_ID(), '_tbsc_common_custom_post_meta', true );

$single_post_meta = get_post_meta( get_the_ID(), '_tbsc_single_posts_custom_meta', true );

$post_meta = new PostMeta(
    new ArrayConfig( TBSC_CONFIG_DIR . 'post-meta/post-meta.php' )
);

if(get_the_ID() != $this->featuredPostId){
    ?>
    <article class="postEntry" id="post-<?php the_ID(); ?>" role="article">
        <!--	<a href="--><?php //the_permalink() ?><!--">-->
        <div class="innerPostWrap">
            <?php
            if(has_post_thumbnail()){
                ?>
                <div class="forMobile">
                    <h2><?php the_title() ?></h2>
                    <!--						<div class="thumbWrap">--><?php //the_post_thumbnail() ?><!--</div>-->
                    <div class="contentWrap">
                        <?php
                        if($single_post_meta && $single_post_meta['post_side_bar_text']){
                            echo $single_post_meta['post_side_bar_text'];
                        }else{
                            the_excerpt();
                        }
                        ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="read-more-button button radius">Read More</a>
                </div>
                <div class="forDesktop">
                    <div class="medium-4 column thumbWrap" style='background: url("<?php echo the_post_thumbnail_url() ?>") no-repeat center center'></div>
                    <div class="medium-8 column">
                        <h2><?php the_title() ?></h2>
                        <div class="contentWrap">
                            <?php
                            if($single_post_meta && $single_post_meta['post_side_bar_text']){
                                echo $single_post_meta['post_side_bar_text'];
                            }else{
                                the_excerpt();
                            }


                            ?></div>
                        <a href="<?php the_permalink(); ?>" class="read-more-button button radius">Read More</a>
                    </div>
                </div>
                <hr/>
                <?php
            }else{
                ?>
                <h2><?php the_title() ?></h2>
                <div class="contentWrap">
                    <?php
                    if($single_post_meta && $single_post_meta['post_side_bar_text']){
                        echo $single_post_meta['post_side_bar_text'];
                    }else{
                        the_excerpt();
                    }
                    ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="read-more-button button radius">Read More</a>
                <hr/>
                <?php
            }
            ?>
        </div>
    </article>
<?php } ?>
