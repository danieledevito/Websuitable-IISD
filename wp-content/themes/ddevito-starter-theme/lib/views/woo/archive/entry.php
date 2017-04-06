<?php
/**
 * archive-entry-header.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

//get_header( 'shop' );

/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action( 'woocommerce_before_main_content' );
?>

<?php //if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<div class="container">
	<div class="row">
		<div class="medium-6 columns">
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		</div>
		<div class="medium-6 columns">
			<?php woocommerce_result_count(); ?>
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
</div>
<?php //endif; ?>

<?php
/**
 * woocommerce_archive_description hook.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
do_action( 'woocommerce_archive_description' );


if ( have_posts() ) : ?>

	<?php
	/**
	 * woocommerce_before_shop_loop hook.
	 *
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );
	?>

	<?php woocommerce_product_loop_start(); ?>

	<?php woocommerce_product_subcategories(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php wc_get_template_part( 'content', 'product' ); ?>

	<?php endwhile; // end of the loop. ?>

	<?php woocommerce_product_loop_end(); ?>

	<?php
	/**
	 * woocommerce_after_shop_loop hook.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
	?>

<?php elseif ( ! woocommerce_product_subcategories( array(
	'before' => woocommerce_product_loop_start( false ),
	'after'  => woocommerce_product_loop_end( false )
) )
) : ?>

	<?php wc_get_template( 'loop/no-products-found.php' ); ?>

<?php endif; ?>


/**
* woocommerce_after_main_content hook.
*
* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
*/
//do_action( 'woocommerce_after_main_content' );
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
?>

<?php //get_footer( 'shop' ); ?>
