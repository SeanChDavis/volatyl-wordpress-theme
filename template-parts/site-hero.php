<?php
/**
 * Hero element, nested within the site header, shared by multiple pages.
 *
 * Use conditionals to set different content for the hero based on page.
 *
 * Duplicate the ".inner.medium" & ".hero" elements for each conditional to
 * prevent having to use the same conditionals to check if content exists first
 * and then using the same conditionals to output the page-specific hero content.
 *
 * We'd rather have duplicate, easy-to-maintain HTML than duplicate PHP logic.
 */
if ( ( is_front_page() && ! is_home() ) && ! empty( get_bloginfo( 'description' ) ) ) {
	?>

	<div class="site-hero">

		<div class="inner medium">

			<div class="hero">
				<h1 class="hero-title"><?php echo bloginfo( 'description' ); ?></h1>
			</div>

		</div>

	</div>

	<?php
}