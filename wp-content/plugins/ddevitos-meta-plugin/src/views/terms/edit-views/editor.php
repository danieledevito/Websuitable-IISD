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

<tr class="form-field">
	<th scope="row">
		<?php if ( $field['section_heading'] ) : ?>
			<h1 style="margin-top:3em;"><?php echo $field['section_heading'] ?></h1>
		<?php endif; ?>

		<h4><?php echo $field['title'] ?></h4>
		<label for="<?php echo $field['label'] ?>"><?php echo $field['desc'] ?></label>

	</th>

	<td>
		<?php
		wp_editor(
			$value,
			$this->option_name . $field['id'],
			$field['args']['settings']
		);
		?>

	</td>
</tr>



