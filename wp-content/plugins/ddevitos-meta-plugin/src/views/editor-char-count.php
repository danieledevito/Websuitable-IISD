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
	<p>
		<label for="<?php echo $this->option_name . $field['id'] ?>"><?php echo $field['desc'] ?></label>
		<span style="float: right"><strong>Max 290 Characters:</strong> <span id="postSummaryCharCount">0</span></span>
	</p>

<div class="charCountWrap">
<?php
wp_editor(
	$value,
	$this->option_name . $field['id'],
	$field['args']['settings']
);
?>
</div>
