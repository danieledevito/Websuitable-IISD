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
<p>
<input size="70" type="text" name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>" value="<?php echo $value ?>">
</p>