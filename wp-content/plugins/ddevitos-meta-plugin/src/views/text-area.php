<?php
/**
 * text-area.php
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

<p><label for="<?php echo $this->option_name . $field['id'] ?>"><?php echo $field['desc'] ?></label></p>
<p>
<textarea rows="5" cols="50" name="<?php echo $this->option_name . $field['id'] ?>" id="<?php echo $this->option_name . $field['id'] ?>"><?php echo $value ?></textarea>
</p>
