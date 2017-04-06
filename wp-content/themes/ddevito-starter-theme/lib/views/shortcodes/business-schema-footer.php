<?php
/**
 * business-schema-footer.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */
?>

<div class="business-information" itemscope itemtype="http://schema.org/<?php echo $options['business_type'] ?>">
	<div class="container">
		<div class="row">
			<div class="medium-6 columns">
				<h4><strong>Contact Us:</strong></h4>
				<span itemprop="name"><?php echo $options['business_name'] ?></span>
				<div itemprop="address">
					<span itemprop="streetAddress"><?php echo $options['business_address'] ?></span><br>
					<span itemprop="addressLocality"><?php echo $options['business_city'] ?>,</span>
					<span itemprop="addressRegion"><?php echo $options['business_state'] ?></span>
					<span itemprop="postalCode"><?php echo $options['business_zip'] ?></span>
				</div>
				<span itemprop="telephone"><?php echo $options['business_phone'] ?></span>
				<span itemprop="faxNumber"><?php echo $options['business_fax'] ?></span><br>
				<span itemprop="sameAs"><a href="<?php echo $options['business_glocal_url'] ?>">Find us on Google</a></span>
			</div>
			<div class="medium-6 columns">
				<h4><strong>Areas Served:</strong></h4>
				<div itemprop="areaServed"><p><?php echo $options['areas_served'] ?></p></div>
			</div>
		</div>
	</div>

</div>
