<?php
/**
 * Title: Feature Grid — Two Columns
 * Slug: volatyl/feature-grid-2col
 * Categories: featured
 * Post Types: page, post
 * Viewport Width: 1400
 * Description: Two-column grid with an optional section heading and description above. Works well for side-by-side feature or comparison layouts.
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:heading {"level":2,"textAlign":"center","className":"section-header-title"} -->
	<h2 class="wp-block-heading has-text-align-center section-header-title">Section Heading</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"section-header-description"} -->
	<p class="has-text-align-center section-header-description">An optional short description or subtitle that provides context for the grid below. Remove it if you don't need it.</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"isStackedOnMobile":true} -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"textAlign":"center","className":"h5"} -->
			<h3 class="wp-block-heading has-text-align-center h5">Feature One</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Describe this feature clearly and concisely. Focus on the benefit to the reader, not just the technical detail.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"textAlign":"center","className":"h5"} -->
			<h3 class="wp-block-heading has-text-align-center h5">Feature Two</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Describe this feature clearly and concisely. Focus on the benefit to the reader, not just the technical detail.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
