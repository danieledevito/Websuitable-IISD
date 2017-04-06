<?php
/**
 * checkbox.php
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */
?>

<p><label for="<?php echo $field['id'] ?>"><?php echo $field['desc'] ?></label></p>
<p>
<input type="checkbox" id="<?php echo $field['id'] ?>" name="<?php echo $field['id'] ?>" value="1"<?php checked( 1, $value, true ) ?> >
</p>

