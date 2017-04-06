<?php
/**
 * file-upload.php
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
		<p><label for="<?php echo $field['label'] ?>"><?php echo $field['desc'] ?></label></p>
	</th>

	<td>
		<input size="100" id="<?php echo $field['label'] ?>" type="text"
		       name="<?php echo $this->option_name . $field['id'] ?>" class="media-url" value="<?php echo $value ?>"/>
		<input id="upload-button" type="button" class="button upload-button" value="Upload Media"/>
	</td>
</tr>

