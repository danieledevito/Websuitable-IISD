<?php
/**
 * text-area.php
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */
?>

<p><label for="<?php echo $field['id'] ?>"><?php echo $field['desc'] ?></label></p>
<p>
<textarea rows="5" cols="50" name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>"><?php echo $value ?></textarea>
</p>
