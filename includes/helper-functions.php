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