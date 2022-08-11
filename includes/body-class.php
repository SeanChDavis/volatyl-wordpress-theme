<?php
/**
 * Conditionally add body classes
 *
 * @param $classes
 *
 * @return mixed
 */
function volatyl_body_class( $classes ) {

	// Adds class based on HTML structure
	if ( 1 == get_theme_mod( 'volatyl_full_width_structure', 0 ) ) {
		$classes[] = 'full-width-structure';
	}

	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
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