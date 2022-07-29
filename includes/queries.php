<?php
/**
 * Modify the query in various ways
 *
 * @param $query
 *
 * @return void
 */
function volatyl_pre_get_posts( $query ) {

	/**
	 * Control the number of posts per page based on the presence of sticky posts
	 */
	if ( $query->is_main_query() && $query->is_home() ) {

		$sticky_count = count( get_option( 'sticky_posts' ) );
		$post_count = get_option( 'posts_per_page' );

		$offset = ( $sticky_count <= $post_count ) ? ( $post_count - ( $post_count - $sticky_count ) ) : $post_count;

		if ( ! $query->is_paged() ) {
			$query->set('posts_per_page', ( $post_count - $offset ) );
		} else {
			$offset = ( ( $query->query_vars['paged']-1 ) * $post_count ) - $offset;
			$query->set( 'posts_per_page',$post_count );
			$query->set( 'offset',$offset );
		}
	}

	/**
	 * Adjust the number of search results
	 */
	if ( $query->is_search && ! is_admin() ) {
		$query->set( 'posts_per_page', 99999 );
	}
}
add_action( 'pre_get_posts', 'volatyl_pre_get_posts' );


/**
 * Count the number of found posts, including stickies
 *
 * @param $found_posts
 * @param $query
 *
 * @return int|mixed|void
 */
function volatyl_found_posts( $found_posts, $query  ) {

	if ( $query->is_main_query() && $query->is_home() ) {

		$sticky_count = count( get_option( 'sticky_posts' ) );
		$post_count = get_option( 'posts_per_page' );
		$offset = ( $sticky_count <= $post_count ) ? ( $post_count - ( $post_count - $sticky_count ) ) : $post_count;

		$found_posts = $found_posts + $offset;
	}

	return $found_posts;
}
add_action( 'found_posts', 'volatyl_found_posts', 10, 2 );