<?php
/**
 * text.php
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */
?>
<p><label for="<?php echo $field['id'] ?>"><?php echo $field['desc'] ?></label></p>
<p><input size="70" id="<?php echo $field['id'] ?> upload_image" type="text" name="<?php echo $field['id'] ?>" class="media-url" value="<?php echo $value ?>"/>
	<input id="upload-button" type="button" class="button upload-button" value="Upload Media" /></p>