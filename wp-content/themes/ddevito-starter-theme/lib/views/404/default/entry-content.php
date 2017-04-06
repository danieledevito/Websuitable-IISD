<?php

/**
 * Entry content for 404 page
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

?>

<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'tbsc' ); ?></p>

<?php get_search_form(); ?>

<?php
/* translators: %1$s: smiley */
$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'ezra' ), convert_smilies( ':)' ) ) . '</p>';
the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
?>

<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

