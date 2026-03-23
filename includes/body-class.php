<?php
/**
 * Conditionally add body classes
 *
 * @param $classes
 *
 * @return mixed
 */
function volatyl_body_class( $classes ) {
	global $post;

	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	switch ( get_theme_mod( 'volatyl_color_scheme_type', DEFAULT_COLOR_SCHEME_TYPE ) ) {

		case 'monochromatic':
			$classes[] = 'monochromatic-color-scheme';
			break;

		case 'complementary':
			$classes[] = 'complementary-color-scheme';
			break;

		case 'analogous':
			$classes[] = 'analogous-color-scheme';
			break;

		case 'triadic':
			$classes[] = 'triadic-color-scheme';
			break;

		case 'split_complementary':
			$classes[] = 'split_complementary-color-scheme';
			break;

		case 'tetradic':
			$classes[] = 'tetradic-color-scheme';
			break;

		default:
			$classes[] = 'analogous-color-scheme';
	}

	if ( get_theme_mod( 'volatyl_full_width_structure', 0 ) ) {
		$classes[] = 'full-width-structure';
	}

	if ( is_singular( array( 'post', 'page' ) ) && has_post_thumbnail( $post->ID ) ) {
		$classes[] = 'has-post-thumbnail';
	} else {
		$classes[] = 'has-no-post-thumbnail';
	}

	$hide_sidebar = is_singular() && get_post_meta( $post->ID, '_volatyl_hide_sidebar', true );

	if (
		// single blog posts
		( is_singular( 'post' ) && ( ! is_active_sidebar( 'single-post-sidebar' ) || $hide_sidebar ) )

		// single pages
		|| ( is_singular( 'page' ) && ( ! is_active_sidebar( 'single-page-sidebar' ) || $hide_sidebar ) && ! is_page_template( 'page-templates/canvas-full-width.php' ) )
	) {
		$classes[] = 'no-sidebar';
	}

	if ( is_page_template( 'page-templates/canvas-full-width.php' ) ) {
		$classes[] = 'canvas-full-width-template';
	}

	if ( is_page_template( 'page-templates/canvas-page-width.php' ) ) {
		$classes[] = 'canvas-page-width-template';
	}

	if ( is_home() && is_front_page() ) {
		$classes[] = 'front-page-blog';
	}

	if ( ! is_home() && is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}

add_filter( 'body_class', 'volatyl_body_class' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments
 *
 * @return void
 */
function volatyl_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'wp_head', 'volatyl_pingback_header' );