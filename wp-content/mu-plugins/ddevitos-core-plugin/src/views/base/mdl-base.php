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


<?php

/**
 * Hook in before site header.
 *
 * @hooked none
 */
do_action( 'ezra_before_header' );
?>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	<header class="site-header mdl-layout__header" itemscope itemtype="http://schema.org/WPHeader">

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

	/**
	 * Hook in before the sidebar content wrap.
	 *
	 * @hooked none
	 */
	do_action( 'ezra_before_content_sidebar_wrap' );
	?>

	<main class="content with-drawer" role="main">

		<?php

		do_action( 'ezra_after_content_wrap_open' );

		/**
		 * Hook in site layout instantiated in class-base-page-template.php.
		 *
		 * @hooked lib/views/layout/
		 */
		do_action( 'ezra_site_inner' );

		do_action( 'ezra_before_content_wrap_close' );

		?>

	</main><!-- end #content and .site-content -->

	<?php

	/**
	 * Hook in after the content and sidebar area.
	 *
	 * @hooked none
	 */
	do_action( 'ezra_after_content_sidebar_wrap' );

	/**
	 * Hook in before the footer area.
	 *
	 * @hooked none
	 */
	do_action( 'ezra_before_footer' );
	?>

	<footer id="colophon" class="site-footer" role="contentinfo">

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
</div><!-- material layout -->
<?php do_action( 'ezra_before_body_close' ); ?>

<?php wp_footer(); ?>

</body>
</html>