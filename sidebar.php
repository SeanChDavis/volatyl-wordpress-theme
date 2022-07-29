<?php
/**
 * Theme sidebars based on page
 */
?>

<div class="sidebar">
	<?php
	if ( is_single() ) {
		dynamic_sidebar( 'Single Post Sidebar' );
	} elseif ( is_page() ) {
		dynamic_sidebar( 'Single Page Sidebar' );
	} else {
		dynamic_sidebar( 'Default Sidebar' );
	}
	?>
</div>