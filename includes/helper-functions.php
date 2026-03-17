<?php

/**
 * Should the site header and content header display with a dark background?
 *
 * For singular posts and pages, this checks post meta set via the Page Header meta box.
 * For non-editable contexts (archives, search, 404), this checks Customizer settings.
 * The front page is excluded — it manages its own dark header via front-page.php.
 *
 * @return bool
 */
function volatyl_has_dark_header() {

	if ( is_singular() ) {
		return (bool) get_post_meta( get_the_ID(), '_volatyl_dark_header', true );
	}

	if ( is_archive() || is_home() ) {
		return (bool) get_theme_mod( 'volatyl_archive_dark_header', 0 );
	}

	if ( is_search() ) {
		return (bool) get_theme_mod( 'volatyl_search_dark_header', 0 );
	}

	if ( is_404() ) {
		return (bool) get_theme_mod( 'volatyl_404_dark_header', 0 );
	}

	return false;
}

/**
 * Should the footer render in minimal mode (no Footer Lead, no Fat Footer)?
 *
 * Checks per-page post meta set via the Page Layout meta box.
 * On non-singular contexts (archives, search, etc.) this always returns false.
 *
 * @return bool
 */
function volatyl_has_minimal_footer() {

	if ( is_singular() ) {
		return (bool) get_post_meta( get_the_ID(), '_volatyl_minimal_footer', true );
	}

	return false;
}

/**
 * Does the Footer Lead have a title, description, or button with a target?
 *
 * @return bool
 */
function volatyl_has_footer_lead_content() {

	return get_theme_mod( 'volatyl_footer_lead_title' )
	       || get_theme_mod( 'volatyl_footer_lead_description' )
	       || (
		       get_theme_mod( 'volatyl_footer_lead_cta_button_url' )
		       && get_theme_mod( 'volatyl_footer_lead_cta_button_text' )
	       );
}

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