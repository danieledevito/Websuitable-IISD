<?php
/**
 * text.php
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

<label for="<?php echo $this->option_name . $field['id'] ?>"><?php echo $field['desc'] ?></label>
<select name="<?php echo $this->option_name . $field['id'] ?>" id="<?php echo $this->option_name . $field['id'] ?>"
        class="postbox">

	<?php

	foreach ( $field['options'] as $option_value => $option_text ) {
		?>
		<option value="<?php echo $option_value ?>" <?php if( $value == $option_value ) echo 'selected' ?>><?php echo $option_text ?></option>
		<?php
	}
	?>
</select>

<h1>TEST</h1>