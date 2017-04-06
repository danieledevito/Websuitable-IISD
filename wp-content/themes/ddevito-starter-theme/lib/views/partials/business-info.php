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

<div class="business-information" itemscope itemtype="http://schema.org/<?php echo $this->options['business_type'] ?>">
	<h2>Contact Us:</h2>
	<p itemprop="name"><?php echo $this->options['business_name'] ?></p>
	<p itemprop="address">
		<span itemprop="streetAddress"><?php echo $this->options['business_address'] ?></span><br>
		<span itemprop="addressLocality"><?php echo $this->options['business_city'] ?>,</span>
		<span itemprop="addressRegion"><?php echo $this->options['business_state'] ?></span>
		<span itemprop="postalCode"><?php echo $this->options['business_zip'] ?></span>
	</p>
	<p>
		Ph: <span itemprop="telephone"><?php echo $this->options['business_phone'] ?></span><br>
		Fx: <span itemprop="faxNumber"><?php echo $this->options['business_fax'] ?></span><br>
	</p>
	<h3>Areas Served:</h3>
	<p itemprop="areaServed"><?php echo $this->options['areas_served'] ?></p>
</div>