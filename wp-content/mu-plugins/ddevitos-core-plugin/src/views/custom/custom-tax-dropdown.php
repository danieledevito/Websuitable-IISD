<?php
/**
 * dropdown.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */
?>


<div class="widget widget_categories tbsc-taxonomy-dropdown-menu">
	<label class="screen-reader-text" for="<?php echo $taxonomy ?>"><?php echo $title ?></label>
	<select name="<?php echo $taxonomy ?>" rel="custom_category_select" id="<?php echo $taxonomy ?>" class="postform">
		<option value="-1"><?php echo $select_text ?></option>

		<?php foreach ( $terms as $term ) { ?>

			<option class="level-0" value="<?php echo get_term_link( $term, $taxonomy ); ?>">
				<?php echo $term->name; ?>
			</option>

		<?php } ?>

	</select>
	<script type="text/javascript">
		/* <![CDATA[ */
		(function () {
			var $dropdown = jQuery("[rel='custom_category_select']");

			function onCatChange() {

				if ( $dropdown.select().val() != -1 ) {
					location.href = $dropdown.select().val();
				}
			}

			$dropdown.change( onCatChange );
		})();
		/* ]]> */
	</script>
</div>
