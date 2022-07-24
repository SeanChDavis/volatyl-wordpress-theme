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
 * Conditional tag used when determining if a post type archive should display a
 * "lite" version of content.
 *
 * Example: display content using "the_excerpt()" instead of "the_content()"
 *
 * @return bool
 */
function volatyl_is_lite_archive() {
	return is_home() || is_search() || is_archive();
}