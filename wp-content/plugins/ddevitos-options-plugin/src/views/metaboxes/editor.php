<?php
/**
 * WordPress Text Editor
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */
?>
	<p><label for="<?php echo $field['id'] ?>"><?php echo $field['desc'] ?></label></p>

<div class="" style="width: 50%">
<?php
wp_editor(
	$value,
	$field['id'],
	$field['args']['settings']
);
?>
</div>
