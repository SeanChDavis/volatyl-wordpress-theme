<?php
/**
 * Block pattern registration.
 *
 * Pattern markup lives in pattern-parts/ as standalone PHP files.
 * Registration is explicit here so WordPress does not attempt auto-discovery,
 * which can be unreliable in some environments.
 */

/**
 * Capture and return the rendered output of a pattern-parts file as a string.
 *
 * @param string $slug  Filename without extension, e.g. 'hero-section'.
 * @return string       Block markup string for use in register_block_pattern().
 */
function volatyl_pattern_content( $slug ) {
	$file = get_theme_file_path( "pattern-parts/{$slug}.php" );
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

/**
 * Register all theme block patterns.
 */
function volatyl_register_block_patterns() {

	register_block_pattern(
		'volatyl/hero-section',
		array(
			'title'         => __( 'Hero Section', 'volatyl' ),
			'description'   => __( 'Full-width hero with headline, supporting text, and two call-to-action buttons. Best suited for Canvas page templates.', 'volatyl' ),
			'categories'    => array( 'banner', 'featured' ),
			'postTypes'     => array( 'page' ),
			'viewportWidth' => 1400,
			'content'       => volatyl_pattern_content( 'hero-section' ),
		)
	);

	register_block_pattern(
		'volatyl/cta-banner-centered',
		array(
			'title'         => __( 'CTA Banner — Centered', 'volatyl' ),
			'description'   => __( 'Full-width call-to-action with heading, description, and a centered button. Mirrors the blog grid CTA layout.', 'volatyl' ),
			'categories'    => array( 'call-to-action', 'banner' ),
			'postTypes'     => array( 'page', 'post' ),
			'viewportWidth' => 1400,
			'content'       => volatyl_pattern_content( 'cta-banner-centered' ),
		)
	);

	register_block_pattern(
		'volatyl/cta-banner-split',
		array(
			'title'         => __( 'CTA Banner — Split', 'volatyl' ),
			'description'   => __( 'Full-width call-to-action with text on the left and a button on the right. Mirrors the footer lead CTA layout.', 'volatyl' ),
			'categories'    => array( 'call-to-action', 'banner' ),
			'postTypes'     => array( 'page', 'post' ),
			'viewportWidth' => 1400,
			'content'       => volatyl_pattern_content( 'cta-banner-split' ),
		)
	);

	register_block_pattern(
		'volatyl/feature-grid-3col',
		array(
			'title'         => __( 'Feature Grid — Three Columns', 'volatyl' ),
			'description'   => __( 'Three-column grid with an optional section heading and description above. Great for features, services, or any repeating three-up layout.', 'volatyl' ),
			'categories'    => array( 'featured' ),
			'postTypes'     => array( 'page', 'post' ),
			'viewportWidth' => 1400,
			'content'       => volatyl_pattern_content( 'feature-grid-3col' ),
		)
	);

	register_block_pattern(
		'volatyl/feature-grid-2col',
		array(
			'title'         => __( 'Feature Grid — Two Columns', 'volatyl' ),
			'description'   => __( 'Two-column grid with an optional section heading and description above. Works well for side-by-side feature or comparison layouts.', 'volatyl' ),
			'categories'    => array( 'featured' ),
			'postTypes'     => array( 'page', 'post' ),
			'viewportWidth' => 1400,
			'content'       => volatyl_pattern_content( 'feature-grid-2col' ),
		)
	);

	register_block_pattern(
		'volatyl/split-image-left',
		array(
			'title'         => __( 'Split Section — Image Left', 'volatyl' ),
			'description'   => __( 'Two-column section with an image on the left and text content on the right. Columns are vertically centered.', 'volatyl' ),
			'categories'    => array( 'featured', 'text' ),
			'postTypes'     => array( 'page', 'post' ),
			'viewportWidth' => 1400,
			'content'       => volatyl_pattern_content( 'split-image-left' ),
		)
	);

	register_block_pattern(
		'volatyl/split-image-right',
		array(
			'title'         => __( 'Split Section — Image Right', 'volatyl' ),
			'description'   => __( 'Two-column section with text content on the left and an image on the right. Columns are vertically centered.', 'volatyl' ),
			'categories'    => array( 'featured', 'text' ),
			'postTypes'     => array( 'page', 'post' ),
			'viewportWidth' => 1400,
			'content'       => volatyl_pattern_content( 'split-image-right' ),
		)
	);
}
add_action( 'init', 'volatyl_register_block_patterns' );

/**
 * Register custom block styles used by theme patterns.
 */
function volatyl_register_block_styles() {

	register_block_style(
		'core/heading',
		array(
			'name'  => 'jumbo',
			'label' => __( 'Jumbo', 'volatyl' ),
		)
	);
}
add_action( 'init', 'volatyl_register_block_styles' );
