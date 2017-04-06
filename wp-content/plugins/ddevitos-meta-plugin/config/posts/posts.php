<?php
/**
 * front-page.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

return array(

	'option_name' => '_tbsc_single_posts_custom_meta',

	'show_on_page' => 'post',

	'metabox_screens' => array(

		'post' => array(
			'single_posts_custom_mb_1' => array(
				'nonce_action' => 'save_single_posts_mb_nonce_1',
				'nonce_name'   => 'pwho_single_posts_mb_nonce_1',
				'id'           => 'single_posts_custom_mb_1',
				'title'        => 'Single Post Options',
				'desc'         => '',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
				'screen'       => 'post',
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(

					array(
						'title'                 => '',
						'id'                    => '[featured_video]',
						'label'                 => 'featured_video',
						'desc'                  => 'Show a video on the blog page instead of a photo.',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'featured_video',
						'sanitization_callback' => 'sanitize_text_field',
					),


				),
				/* end fields */
			), /* end metabox 1 */


		), /* end Posts Metaboxes */
	),
);