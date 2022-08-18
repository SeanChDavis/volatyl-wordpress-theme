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