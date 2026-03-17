<?php // Theme sidebars based on page loaded

if ( is_single() ) {
	if ( is_active_sidebar( 'single-post-sidebar' ) ) {
		dynamic_sidebar( 'single-post-sidebar' );
	}
} elseif ( is_page() ) {
	if ( is_active_sidebar( 'single-page-sidebar' ) ) {
		dynamic_sidebar( 'single-page-sidebar' );
	}
} else {
	if ( is_active_sidebar( 'default-sidebar' ) ) {
		dynamic_sidebar( 'default-sidebar' );
	}
}