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
<tr class="form-field">
	<th scope="row">
		<?php if ( $field['section_heading'] ) : ?>
			<h1 style="margin-top:3em;"><?php echo $field['section_heading'] ?></h1>
		<?php endif; ?>
		<h4><?php echo $field['title'] ?></h4>
		<label for="<?php echo $field['label'] ?>"><?php echo $field['desc'] ?></label>
	</th>

	<td>
		<select name="<?php echo $this->option_name . $field['id'] ?>" id="<?php echo $field['label'] ?>"
		        class="postbox">

			<?php

			foreach ( $field['options'] as $option_value => $option_text ) {

				?>
				<option value="<?php echo $option_value ?>" <?php if ( $value == $option_value )
					echo 'selected' ?>><?php echo $option_text ?></option>
				<?php
			}
			?>
		</select>
	</td>
</tr>