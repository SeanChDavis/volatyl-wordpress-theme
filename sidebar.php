<?php // Theme sidebars based on page loaded

if ( is_single() ) {
	if ( is_active_sidebar( 'Single Post Sidebar' ) ) {
		dynamic_sidebar( 'Single Post Sidebar' );
	}
} elseif ( is_page() ) {
	if ( is_active_sidebar( 'Single Page Sidebar' ) ) {
		dynamic_sidebar( 'Single Page Sidebar' );
	}
} else {
	if ( is_active_sidebar( 'Default Sidebar' ) ) {
		dynamic_sidebar( 'Default Sidebar' );
	}
}