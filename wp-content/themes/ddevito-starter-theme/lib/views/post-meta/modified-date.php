<?php

/**
 * Entry modification date
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) : ?>

	<time class="entry-date published" datetime="<?php echo $date['date-posted-att']; ?>"><?php echo $date['date-posted-display']; ?></time> <em>( updated on <time class="updated" datetime="<?php echo $date['date-modified-att']; ?>"><?php echo $date['date-modified-display']; ?></time> )</em>

<?php endif; ?>
