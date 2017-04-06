<?php
/**
 * Checkbox view file.
 *
 * Uses the following data from the configuration array:
 * - Field ID
 * - Field Description
 * - Custom meta array key
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
<div class="form-field">
	<h4><?php echo $field['title'] ?></h4>
	<label style="margin-right: 20px;" for="<?php echo $field['label'] ?>"><?php echo $field['desc'] ?></label>
	<input type="checkbox" id="<?php echo $field['label'] ?>" name="<?php echo $this->option_name . $field['id'] ?>"
	       value="1"<?php checked( 1, $value, true ) ?> >
</div>


