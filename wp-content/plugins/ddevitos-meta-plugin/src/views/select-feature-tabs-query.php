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

<?php if ( $field['section_heading']) : ?>
	<h1 style="margin-top:3em;"><?php echo $field['section_heading'] ?></h1>
<?php endif; ?>
<h4><?php echo $field['title'] ?></h4>
<label for="<?php echo $field['label'] ?>"><?php echo $field['desc'] ?></label>
<select name="<?php echo $this->option_name . $field['id'] ?>" id="<?php echo $field['label'] ?>"
        class="postbox">

	<?php

	$args = array(
		'hide_empty'=>false
	);

	$term = get_terms('business_types_tabs', $args);

	if ( count($term) > 0 ) {
		for($x = 0; $x < count($term); $x++) {
			$name = $term[$x]->name;
			$id = $term[$x]->term_id;
		?>
			<option value="<?php echo $id ?>" <?php if( $value == $id ) echo 'selected' ?>><?php echo $name; ?></option>
	<?php
		} // end while
	} // end if
	?>
</select>
