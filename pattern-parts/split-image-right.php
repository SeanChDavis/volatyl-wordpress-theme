<?php
/**
 * Title: Split Section — Image Right
 * Slug: volatyl/split-image-right
 * Categories: featured, text
 * Post Types: page, post
 * Viewport Width: 1400
 * Description: Two-column section with text content on the left and an image on the right. Columns are vertically centered.
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:columns {"isStackedOnMobile":true,"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading">Section Heading</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>Supporting content that expands on the heading. Use this space to explain, persuade, or provide context for the image alongside it.</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Learn More</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="" alt="" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
