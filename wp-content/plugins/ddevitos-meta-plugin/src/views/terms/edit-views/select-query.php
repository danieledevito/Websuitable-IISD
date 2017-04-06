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

<tr class="form-field">
	<th scope="row">
		<?php if ( $field['section_heading'] ) : ?>
			<h1 style="margin-top:3em;"><?php echo $field['section_heading'] ?></h1>
		<?php endif; ?>
		<h4><?php echo $field['title'] ?></h4>
		<label for="<?php echo $field['label'] ?>"><?php echo $field['desc'] ?></label>

	</th>

	<td>
		<select name="<?php echo $this->option_name . $field['id'] ?>" id="<?php echo $field['label'] ?>"
		        class="postbox">

			<?php

			$query = new WP_Query( array(
				'post_type'      => 'tbsc_sbu',
				'posts_per_page' => - 1,

			) );

			?>

			<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					$id = get_the_ID();

					?>
					<option value="<?php echo $id; ?>" <?php if ( $value == $id )
						echo 'selected' ?>><?php the_title() ?></option>
					<?php
				} // end while
			} // end if
			?>
		</select>
	</td>
</tr>