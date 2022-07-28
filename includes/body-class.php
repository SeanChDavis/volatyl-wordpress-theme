<?php
/**
 * Conditionally add body classes
 */
function volatyl_body_class( $classes ) {

	if (
		// single blog posts
		( is_singular( 'post' ) && ! is_active_sidebar( 'single-post-sidebar' ) )

		// single pages
		|| ( is_singular( 'page' ) && ! is_active_sidebar( 'single-page-sidebar' ) )

		// standard archives
//		|| ( is_archive() && ! is_active_sidebar( 'post-archive-sidebar' ) )

		// blog home
		|| ( is_home() && ! is_front_page() && ! is_active_sidebar( 'default-sidebar' ) )
	) {
		$classes[] = 'no-sidebar';
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