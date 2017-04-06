<?php

/**
 * List of post categories
 *
 * Called by the PostEntry class.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<?php if ( $categories_list && $this->is_categorized_blog() ) : ?>
	<span class="cat-links"><?php echo $categories_list ?></span>
<?php endif; ?>
