<?php
/**
 * Title: Feature Grid — Three Columns
 * Slug: volatyl/feature-grid-3col
 * Categories: featured
 * Post Types: page, post
 * Viewport Width: 1400
 * Description: Three-column grid with an optional section heading and description above. Great for features, services, or any repeating three-up layout.
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:heading {"level":2,"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">Section Heading</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">An optional short description or subtitle that provides context for the grid below. Remove it if you don't need it.</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"isStackedOnMobile":true} -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Feature One</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>Describe this feature clearly and concisely. Focus on the benefit to the reader, not just the technical detail.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Feature Two</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>Describe this feature clearly and concisely. Focus on the benefit to the reader, not just the technical detail.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Feature Three</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>Describe this feature clearly and concisely. Focus on the benefit to the reader, not just the technical detail.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
