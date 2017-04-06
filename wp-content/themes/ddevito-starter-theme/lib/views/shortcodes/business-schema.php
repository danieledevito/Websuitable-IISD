<?php
/**
 * business-schema.php
 *
 * @package   ArborScape
 * @author    The Smart Web Team - Better Software Company
 * @copyright 2015 The Better Software Company
 * @license   GPL-2.0+
 */

?>

<div class="business-information" itemscope itemtype="http://schema.org/<?php echo $options['business_type'] ?>">
	<div class="tbsc-section container">
		<div class="row">
			<div class="medium-6 columns">
				<span itemprop="name"><?php echo $options['business_name'] ?></span>
				<div itemprop="address">
					<span itemprop="streetAddress"><?php echo $options['business_address'] ?></span><br>
					<span itemprop="addressLocality"><?php echo $options['business_city'] ?>,</span>
					<span itemprop="addressRegion"><?php echo $options['business_state'] ?></span>
					<span itemprop="postalCode"><?php echo $options['business_zip'] ?></span>
				</div>
				<span itemprop="telephone"><?php echo $options['business_phone'] ?></span>
				<span itemprop="faxNumber"><?php echo $options['business_fax'] ?></span><br>
				<span itemprop="sameAs"><a href="<?php echo $options['business_glocal_url'] ?>">Find us on
						Google</a></span>
				<br>
				<h4><strong>About Us:</strong></h4>
				<div itemprop="description"><p><?php echo $options['business_desc'] ?></p></div>
				<h4><strong>Areas Served:</strong></h4>
				<div itemprop="areaServed"><p><?php echo $options['areas_served'] ?></p></div>
			</div>
			<div class="medium-6 columns">
				<h4><strong><?php echo $options['hours_heading'] ?></strong></h4>

				<meta itemprop="openingHours" datetime="Su <?php echo $options['hours_sunday'] ?>">
				<strong>Sunday</strong>: <?php echo $options['hours_sunday'] ?><br>
				<meta itemprop="openingHours" datetime="Mo <?php echo $options['hours_monday'] ?>">
				<strong>Monday</strong>: <?php echo $options['hours_monday'] ?><br>
				<meta itemprop="openingHours" datetime="Tu <?php echo $options['hours_tuesday'] ?>">
				<strong>Tuesday</strong>: <?php echo $options['hours_tuesday'] ?><br>
				<meta itemprop="openingHours" datetime="We <?php echo $options['hours_wednesday'] ?>">
				<strong>Wednesday</strong>: <?php echo $options['hours_wednesday'] ?><br>
				<meta itemprop="openingHours" datetime="Th <?php echo $options['hours_thursday'] ?>">
				<strong>Thursday</strong>: <?php echo $options['hours_thursday'] ?><br>
				<meta itemprop="openingHours" datetime="Fr <?php echo $options['hours_friday'] ?>">
				<strong>Friday</strong>: <?php echo $options['hours_friday'] ?><br>
				<meta itemprop="openingHours" datetime="Sa <?php echo $options['hours_saturday'] ?>">
				<strong>Saturday</strong>: <?php echo $options['hours_saturday'] ?><br>
			</div>
		</div>
	</div>

	<!--	<div class="tbsc-section container">-->
	<!--		<div class="row">-->
	<!---->
	<!--			<div class="medium-6 columns">-->
	<!--				<h4><strong>Summer Hours</strong></h4>-->
	<!---->
	<!--				<meta itemprop="openingHours" datetime="Su -->
	<?php //echo $options['hours_sunday'] ?><!--"><strong>Sunday</strong>: -->
	<?php //echo $options['hours_sunday'] ?><!--<br>-->
	<!--				<meta itemprop="openingHours" datetime="Mo -->
	<?php //echo $options['hours_monday'] ?><!--"><strong>Monday</strong>: -->
	<?php //echo $options['hours_monday'] ?><!--<br>-->
	<!--				<meta itemprop="openingHours" datetime="Tu -->
	<?php //echo $options['hours_tuesday'] ?><!--"><strong>Tuesday</strong>: -->
	<?php //echo $options['hours_tuesday'] ?><!--<br>-->
	<!--				<meta itemprop="openingHours" datetime="We -->
	<?php //echo $options['hours_wednesday'] ?><!--"><strong>Wednesday</strong>: -->
	<?php //echo $options['hours_wednesday'] ?><!--<br>-->
	<!--				<meta itemprop="openingHours" datetime="Th -->
	<?php //echo $options['hours_thursday'] ?><!--"><strong>Thursday</strong>: -->
	<?php //echo $options['hours_thursday'] ?><!--<br>-->
	<!--				<meta itemprop="openingHours" datetime="Fr -->
	<?php //echo $options['hours_friday'] ?><!--"><strong>Friday</strong>: -->
	<?php //echo $options['hours_friday'] ?><!--<br>-->
	<!--				<meta itemprop="openingHours" datetime="Sa -->
	<?php //echo $options['hours_saturday'] ?><!--"><strong>Saturday</strong>: -->
	<?php //echo $options['hours_saturday'] ?><!--<br>-->
	<!---->
	<!--			</div>-->
	<!--			<div class="medium-6 columns">-->
	<!--				<h4><strong>Winter Hours</strong></h4>-->
	<!--			</div>-->
	<!---->
	<!--		</div>-->
	<!--	</div>-->

</div>
