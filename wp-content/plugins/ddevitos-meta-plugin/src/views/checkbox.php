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
<p><label style="margin-right: 20px;" for="<?php echo $this->option_name . $field['id'] ?>"><?php echo $field['desc'] ?></label>
<input type="checkbox" id="<?php echo $this->option_name . $field['id'] ?>" name="<?php echo $this->option_name . $field['id'] ?>" value="1"<?php checked( 1, $value, true ) ?> >
</p>

