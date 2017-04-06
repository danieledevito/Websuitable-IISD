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
<?php if ( $field['section_heading']) : ?>
	<h1 style="margin-top:3em;"><?php echo $field['section_heading'] ?></h1>
<?php endif; ?>
<div class="form-field" style="max-width: 600px;">

	<h4><?php echo $field['title'] ?></h4>
	<label for="<?php echo $field['label'] ?>"><?php echo $field['desc'] ?></label>

<?php
wp_editor(
	$value,
	$this->option_name . $field['id'],
	$field['args']['settings']
);
?>
</div>


