<?php
/**
 * Main Plugin Class
 *
 * @package   WP Core
 * @author    Daniele De Vito
 * @copyright 2015 The Better Software Company
 * @license   GPL-2.0+
 */

namespace TBSC_Core;

use TBSC_Core\Config\I_Config;
use TBSC_Core\Config\ArrayConfig;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

final class Plugin {

	/**
	 * Main config file.
	 *
	 * @since 1.0.0
	 *
	 * @var $config
	 */
	protected $config;

	/**
	 * Instantiate CoreController.
	 *
	 * @since 1.0.0
	 *
	 * @param I_Config $config
	 *
	 * @return self
	 */
	public function __construct( I_Config $config ) {

		$this->config = $config->load_config();

		if ( array_key_exists( 'widget_areas', $this->config ) ) {
			$widget_config = new ArrayConfig ( $this->config['widget_areas'] );

			$this->widget_area_config = $widget_config->load_config();
		}
	}

	/**
	 * Initialize the plugin.
	 *
	 * All un-hooked callbacks are hooked into after_setup_theme by default
	 * since this class is instantiated in functions.php at after_setup_theme.
	 *
	 * @since 1.0.0
	 */
	public function run() {

		/**
		 * Create all needed objects at the after_setup_theme event.
		 */
		$this->register_all_menus();

		/**
		 * Do stuff after the after_setup_theme event.
		 */
		add_action( 'edit_category', array( $this, 'category_transient_flusher' ) );
		add_action( 'save_post', array( $this, 'category_transient_flusher' ) );
		add_filter( 'the_content', array( $this, 'tgm_io_shortcode_empty_paragraph_fix' ) );

		if ( array_key_exists( 'widget_areas', $this->config ) ) {
			add_action( 'widgets_init', array( $this, 'create_widget_areas' ) );
		}

		if ( ( is_admin() ) && ( ( $this->is_edit_page( 'edit' ) ) || ( $this->is_edit_page() ) || ( $this->is_edit_page( 'new' ) ) ) ) {
			add_action( 'admin_head', [ $this, 'load_scripts' ] );
		}

	}

	/**
	 * Register all required menus.
	 *
	 * @since 1.0.0
	 */
	protected function register_all_menus() {

		register_nav_menus( $this->config['menu_registration'] );

	}

	/**
	 * Flush out the transients used in categorized_blog.
	 *
	 * @since 1.0.0
	 */
	public function category_transient_flusher() {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'ezra_categories' );

	}

	public function create_widget_areas() {

		array_walk( $this->widget_area_config['widget_areas'], function ( $widget_area ) {

			register_sidebar( array_merge( $this->widget_area_config['default_widget_markup'], $widget_area ) );

		} );
	}

	/**
	 * Filters the content to remove any extra paragraph or break tags
	 * caused by shortcodes.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content String of HTML content.
	 *
	 * @return string $content Amended string of HTML content.
	 */
	public function tgm_io_shortcode_empty_paragraph_fix( $content ) {

		$array = array(
			'<p>['          => '[',
			']</p>'         => ']',
			']<br />'       => ']',
			'<p>&nbsp;</p>' => '',
		);

		return strtr( $content, $array );

	}

	/**
	 * is_edit_page
	 * function to check if the current page is a post edit page
	 *
	 * @author Ohad Raz <admin@bainternet.info>
	 *
	 * @param  string $new_edit what page to check for accepts new - new post page ,edit - edit post page, null for either
	 *
	 * @return boolean
	 */
	private function is_edit_page( $new_edit = null ) {
		global $pagenow;
		//make sure we are on the backend
		if ( ! is_admin() ) {
			return false;
		}


		if ( $new_edit == "edit" ) {
			return in_array( $pagenow, array( 'post.php', ) );
		} elseif ( $new_edit == "new" ) //check for new post page
		{
			return in_array( $pagenow, array( 'post-new.php' ) );
		} else //check for either new or edit
		{
			return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
		}
	}

	/**
	 * Load media uploader script.
	 *
	 * Have to load the script like this because the stupid thing won't work
	 * with wp_enqueue_script function.
	 *
	 * @since 3.0.0
	 */
	public function load_scripts() {

		// Need this script working so the media uploader will open.
		wp_enqueue_media();

		?>
		<script>
			jQuery(function ($) {
				'use strict';

				var mediaUploadHandler = (function mediaUploadHandlerModule() {

					var clickedButton;

					// Extend the wp.media object
					var mediaUploader = wp.media.frames.file_frame = wp.media({
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						}, multiple: false
					});

					// Set the clicked button when the media uploader is opened.
					function setClickedButton(e) {
						clickedButton = e.currentTarget;
					}

					// Get the clicked button when setting the media URL in the text field.
					function getClickedButton() {
						return clickedButton;
					}

					// Open the media uploader.
					function openMediaUploader() {

						$('.upload-button').click(function clickHandler(e) {

							setClickedButton(e);

							e.preventDefault();

							if (mediaUploader) {
								mediaUploader.open();
							}

						});
					}

					// When a file is selected, grab the URL and set it as the text field's value
					function setMediaURLinField() {
						mediaUploader.on('select', function populateURLField() {

							var attachment = mediaUploader.state().get('selection').first().toJSON();
							$(getClickedButton()).prev('.media-url').val(attachment.url);
						});
					}

					// Initialize this module.
					function init() {
						openMediaUploader();
						setMediaURLinField();
					}

					var publicAPI = {
						init: init
					};

					return publicAPI;

				})();

				$(document).ready(mediaUploadHandler.init);
			});

		</script>

		<?php
	}
	
}