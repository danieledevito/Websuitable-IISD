<?php
/**
 * pagination.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
use TBSC_Core\Support\Views;

?>

<div class="tbsc-section container">
	<div class="paginate-links-section tbsc-section container">

		<div class='page-numbers page-num'>Page <?php echo $this->get_paged() ?> of <?php echo $wp_query->max_num_pages ?></div>

		<nav class="navigation paging-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'tbsc' ); ?></h2>

<!--			--><?php //include( Views::load_view( TBSC_VIEWS_DIR . 'navigation/partials/archive-pagination.php' ) );
			?>
			<?php include( Views::load_view( TBSC_VIEWS_DIR . 'navigation/partials/paginate-links.php' ) );
			?>
		</nav><!-- .navigation -->
	</div><!-- end paginate-links-section -->
</div><!-- end tbsc-section -->