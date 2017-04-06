<?php
/**
 * WordPress Text Editor
 *
 * @package    Custom Meta Plugin
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */
?>
	<p><label for="<?php echo $this->option_name . $field['id'] ?>"><?php echo $field['desc'] ?></label></p>

<?php
wp_editor(
	$value,
	$this->option_name . $field['id'],
	$field['args']['settings']
);
?>