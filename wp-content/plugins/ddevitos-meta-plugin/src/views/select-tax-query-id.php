<?php
/**
 * text.php
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

<label for="<?php echo $this->option_name . $field['id'] ?>"><?php echo $field['desc'] ?></label>
<select name="<?php echo $this->option_name . $field['id'] ?>" id="<?php echo $this->option_name . $field['id'] ?>"
        class="postbox">

	<?php

	$terms = get_terms( $field['tax_id'] );

	foreach ( $terms as $term ) {

		?>
		<option value="<?php echo $term->term_id ?>" <?php if( $value == $term->term_id ) echo 'selected' ?>><?php echo $term->name ?></option>
		<?php
	}
	?>
</select>