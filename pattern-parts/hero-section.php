<?php
/**
 * Title: Hero Section
 * Slug: volatyl/hero-section
 * Categories: banner, featured
 * Post Types: page
 * Viewport Width: 1400
 * Description: Full-width hero with headline, supporting text, and two call-to-action buttons. Best suited for Canvas page templates.
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"darker","className":"v-xl","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull v-xl has-darker-background-color has-background">

	<!-- wp:heading {"level":1,"textAlign":"center"} -->
	<h1 class="wp-block-heading has-text-align-center">Your Compelling Headline</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">Supporting text that communicates your core value proposition. Keep it clear and concise — one or two sentences works best.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
		<!-- /wp:button -->
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Learn More</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
