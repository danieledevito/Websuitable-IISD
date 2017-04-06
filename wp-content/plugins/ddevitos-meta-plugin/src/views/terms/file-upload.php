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
<?php if ( $field['section_heading']) : ?>
	<h1 style="margin-top:3em;"><?php echo $field['section_heading'] ?></h1>
<?php endif; ?>
<div class="" style="margin-bottom: 1em;">
	<div style="clear: both;">
		<h4><?php echo $field['title'] ?></h4>
		<p>	<label for="<?php echo $field['label'] ?>"><?php echo $field['desc'] ?></label></p>
	</div>
	<input size="100" id="<?php echo $field['label'] ?>" type="text"
		       name="<?php echo $this->option_name . $field['id'] ?>" class="media-url" value="<?php echo $value ?>"/>
	<input id="upload-button" type="button" class="button upload-button" value="Upload Media"/>
</div>
