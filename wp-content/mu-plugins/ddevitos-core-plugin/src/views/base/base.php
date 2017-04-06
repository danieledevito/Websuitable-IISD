<?php

/**
 * Common page markup
 *
 * This markup forms the base for every page.
 * Future updates to markup will apply to all pages.
 * For backwards compatibility, avoid changing hooks.
 *
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

/**
 * Action hook for instantiating any page and post objects.
 *
 * @hooked none.
 */
do_action( 'ezra_start_page_load' );

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' );
	echo '?' . filemtime( get_stylesheet_directory() . '/style.css' ); ?>" type="text/css" media="screen, projection"/>

	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<?php do_action( 'ezra_after_body_open' ); ?>

<div id="page" class="hfeed site<?php echo ' ' . esc_attr( $this->config['custom_page_classes'] ); ?>">

	<?php

	/**
	 * Hook in before site header.
	 *
	 * @hooked none
	 */
	do_action( 'ezra_before_header' );
	?>

	<header id="header" class="site-header" itemscope itemtype="http://schema.org/WPHeader">

		<?php
		/**
		 * Hook in site header instantiated in class-base-page-template.php.
		 *
		 * @hooked lib/structures/header/
		 */
		do_action( 'ezra_header' );
		?>

	</header>

	<?php
	/**
	 * Hook in after site header.
	 *
	 * @hooked none
	 */
	do_action( 'ezra_after_header' );

	?>

	<div class="inner-page-wrap">

		<?php if ( $this->config['sidebar_left'] === true ) : ?>

			<aside id="left-sidebar" class="sidebar widget-area" role="complementary" aria-label="Left Sidebar"
			       itemscope
			       itemtype="http://schema.org/WPSideBar">

				<?php
				/**
				 * ezra_before_sidebar_widgets
				 *
				 * @hooked none.
				 */
				?>
				<?php do_action( 'ezra_before_sidebar_widgets_left' ); ?>

				<?php
				/**
				 * ezra_sidebar hook.
				 *
				 * @hooked lib/page-templates/do_page_sidebar method.
				 */
				?>
				<?php do_action( 'ezra_sidebar_left' ); ?>

				<?php
				/**
				 * ezra_after_sidebar_widgets
				 *
				 * @hooked none.
				 */
				?>
				<?php do_action( 'ezra_after_sidebar_widgets_left' ); ?>

			</aside><!-- #aside -->

		<?php endif; ?>

		<main id="main" class="site-content" role="main">

			<?php

			/**
			 * Hook in site layout instantiated in class-base-page-template.php.
			 *
			 * @hooked lib/views/layout/
			 */
			do_action( 'ezra_do_loop' );

			?>

		</main><!-- end #content and .site-content -->

		<?php if ( $this->config['sidebar_right'] === true ) : ?>

			<aside id="right-sidebar" class="sidebar widget-area" role="complementary" aria-label="Left Sidebar"
			       itemscope
			       itemtype="http://schema.org/WPSideBar">

				<?php
				/**
				 * ezra_before_sidebar_widgets
				 *
				 * @hooked none.
				 */
				?>
				<?php do_action( 'ezra_before_sidebar_widgets_right' ); ?>

				<?php
				/**
				 * ezra_sidebar hook.
				 *
				 * @hooked lib/page-templates/do_page_sidebar method.
				 */
				?>
				<?php do_action( 'ezra_sidebar_right' ); ?>

				<?php
				/**
				 * ezra_after_sidebar_widgets
				 *
				 * @hooked none.
				 */
				?>
				<?php do_action( 'ezra_after_sidebar_widgets_right' ); ?>

			</aside><!-- #aside -->

		<?php endif; ?>

	</div>

	<?php

	/**
	 * Hook in before the footer area.
	 *
	 * @hooked none
	 */
	do_action( 'ezra_before_footer' );
	?>

	<footer id="footer" role="contentinfo">

		<?php
		/**
		 * Hook in the footer object created by class-base-page-template.php.
		 *
		 * @hooked lib/structures/footer/
		 */
		do_action( 'ezra_footer' );
		?>

	</footer><!-- #colophon -->


	<?php
	/**
	 * Hook in after the footer area.
	 *
	 * @hooked none
	 */
	do_action( 'ezra_after_footer' );
	?>

</div><!-- #page -->

<?php do_action( 'ezra_before_body_close' ); ?>

<?php wp_footer(); ?>

</body>
</html>