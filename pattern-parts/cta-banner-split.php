<?php
/**
 * CTA Banner — Split pattern markup.
 * Text left, button right, columns vertically centered.
 * Registered via includes/patterns.php.
 */
?>
<!-- wp:group {"align":"full","className":"cta-banner cta-banner-split","backgroundColor":"dark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull cta-banner cta-banner-split has-dark-background-color has-background">

	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

			<!-- wp:paragraph {"className":"h3 cta-title"} -->
			<p class="h3 cta-title">Ready to Get Started?</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"cta-description"} -->
			<p class="cta-description">A short supporting statement that reinforces the call to action and gives visitors the confidence to take the next step.</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

			<!-- wp:buttons {"className":"v-large","layout":{"type":"flex","justifyContent":"right"}} -->
			<div class="wp-block-buttons v-large is-content-justification-right is-layout-flex wp-block-buttons-is-layout-flex">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Take Action</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
