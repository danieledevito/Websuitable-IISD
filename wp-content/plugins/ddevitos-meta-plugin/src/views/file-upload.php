<?php
/**
 * file-upload.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */
?>
<div class="form-field">
	<p><label for="<?php echo $this->option_name . $field['id'] ?>"><?php echo $field['desc'] ?></label></p>
<input size="70" id="<?php echo $this->option_name . $field['id'] ?>" type="text" name="<?php echo $this->option_name . $field['id'] ?>" class="media-url" value="<?php echo $value ?>"/>
	<input id="upload-button" type="button" class="button upload-button" value="Upload Media" />
</div>