<?php
/**
 * Site search feature.
 *
 * Appends a search toggle icon to the primary navigation menu and outputs
 * the full-screen search overlay via wp_footer. Both are conditional on
 * the volatyl_header_search theme mod.
 */

/**
 * Append the search toggle icon as the last item in the primary nav menu.
 *
 * @param string   $items Menu items HTML.
 * @param stdClass $args  wp_nav_menu() args object.
 * @return string
 */
function volatyl_search_nav_item( $items, $args ) {
	if ( ! get_theme_mod( 'volatyl_header_search', 0 ) ) {
		return $items;
	}
	if ( isset( $args->theme_location ) && 'primary-menu' === $args->theme_location ) {
		$label   = esc_attr__( 'Open search', 'volatyl' );
		$items  .= '<li class="menu-item menu-item-search">';
		$items  .= '<span class="search-toggle" role="button" tabindex="0" aria-expanded="false" aria-controls="search-overlay" aria-label="' . $label . '">';
		$items  .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>';
		$items  .= '</span>';
		$items  .= '</li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'volatyl_search_nav_item', 10, 2 );

/**
 * Output the search overlay before </body>.
 */
function volatyl_render_search_overlay() {
	if ( ! get_theme_mod( 'volatyl_header_search', 0 ) ) {
		return;
	}
	get_template_part( 'template-parts/search', 'overlay' );
}
add_action( 'wp_footer', 'volatyl_render_search_overlay' );
