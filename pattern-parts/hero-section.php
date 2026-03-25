<?php
/**
 * Title: Hero Section
 * Slug: volatyl/hero-section
 * Categories: banner, featured
 * Post Types: page
 * Viewport Width: 1400
 * Description: Full-width hero matching the theme content header — same title constraints, description width, and button configuration. Best used at the top of a Canvas page template.
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"dark","className":"content-header","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull content-header has-dark-background-color has-background">

	<!-- wp:heading {"level":1,"textAlign":"center","className":"content-header-title"} -->
	<h1 class="wp-block-heading has-text-align-center content-header-title">Your Compelling Headline</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"content-header-description"} -->
	<p class="has-text-align-center content-header-description">Supporting text that communicates your core value proposition. Keep it clear and concise — one or two sentences works best.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"className":"content-header-primary-cta","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-buttons content-header-primary-cta is-content-justification-center is-layout-flex">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get Started</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:paragraph {"align":"center","className":"content-header-secondary-cta"} -->
	<p class="has-text-align-center content-header-secondary-cta"><a href="#">Learn More</a></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
