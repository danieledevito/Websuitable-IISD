<?php
/**
 * options-page.php
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */
wp_enqueue_media();

?>

<div class="wrap">

	<h2><?php echo $this->settings['heading'] ?></h2>

	<form method="post" action="options.php">

		<?php
		settings_fields( $this->settings['option_group'] );
		do_settings_sections( $this->settings['page_slug'] );
		submit_button();
		?>

</div>
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