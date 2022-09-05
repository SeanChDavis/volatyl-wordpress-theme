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
function volatyl_excerpt_more( $more ) {
	return ' [<a class="hellip-link" href="' . get_the_permalink() . '">...</a>]';
}
add_filter( 'excerpt_more', 'volatyl_excerpt_more' );