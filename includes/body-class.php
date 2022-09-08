<?php
/**
 * Conditionally add body classes
 *
 * @param $classes
 *
 * @return mixed
 */
function volatyl_body_class( $classes ) {

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

	if ( 1 == get_theme_mod( 'volatyl_full_width_structure', 0 ) ) {
		$classes[] = 'full-width-structure';
	}

	if (
		// single blog posts
		( is_singular( 'post' ) && ! is_active_sidebar( 'single-post-sidebar' ) && ! is_page_template( 'page-templates/full-width.php' ) )

		// single pages
		|| ( is_singular( 'page' ) && ! is_active_sidebar( 'single-page-sidebar' ) && ! is_page_template( 'page-templates/full-width.php' ) )
	) {
		$classes[] = 'no-sidebar';
	}

	if ( is_page_template( 'page-templates/full-width.php' ) ) {
		$classes[] = 'full-width-template';
	}

	if ( is_page_template( 'page-templates/page-width.php' ) ) {
		$classes[] = 'page-width-template';
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