<?php
/**
 * Are any of the fat footer areas in use? If at least one, then yes.
 *
 * @return bool
 */
function volatyl_has_fat_footer_content() {

	return is_active_sidebar('fat-footer-area-one' )
	       || is_active_sidebar('fat-footer-area-two' )
	       || is_active_sidebar('fat-footer-area-three' )
	       || is_active_sidebar('fat-footer-area-four' );
}

/**
 * Get the number of posts per page
 *
 * By default, this function returns the value of get_option( 'posts_per_page' ),
 * which comes from core WordPress settings.
 *
 * If the name of an existing theme mod (Customizer) is passed to the function,
 * it will attempt to calculate the number of posts per page based on the value
 * of the referenced theme mod. If the name is incorrect, or it is set to default,
 * the core setting value is used as a fallback.
 *
 * @param $option_name
 *
 * @return false|float|int|mixed|void
 */
function volatyl_get_posts_per_page( $option_name = 'posts_per_page' ) {

	if ( false !== get_theme_mod( $option_name ) && 'default' !== get_theme_mod( $option_name ) ) {

		// Get the number of columns in the grid
		$blog_post_grid_columns = (int) substr( get_theme_mod( $option_name ), 0, 1 );

		// Get the number of rows in the grid
		$blog_post_grid_rows = (int) substr( get_theme_mod( $option_name ), -1, 1 );

		// Return the number total posts in the grid
		return $blog_post_grid_columns * $blog_post_grid_rows;

	} else {

		// Return the default posts per page setting value
		return get_option( 'posts_per_page' );
	}
}