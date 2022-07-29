<?php
/**
 * Set the post excerpt length on the front end only
 *
 * @param $length
 *
 * @return int|mixed
 */
function volatyl_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 20;
}
add_filter( 'excerpt_length', 'volatyl_excerpt_length', 999 );

/**
 * Adjust the trailing text for truncated excerpts
 *
 * @param $more
 *
 * @return string
 */
function my_theme_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'my_theme_excerpt_more' );