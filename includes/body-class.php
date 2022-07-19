<?php
/**
 * Conditionally add body classes
 */
function volatyl_body_class( $classes ) {

	if (
		( is_single( 'post' ) && ! is_active_sidebar( 'single-post-sidebar' ) )
	) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'volatyl_body_class' );