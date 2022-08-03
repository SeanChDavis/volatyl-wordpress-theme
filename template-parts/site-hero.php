<?php
/**
 * Hero element, nested within the site header, shared by multiple pages.
 *
 * Use conditionals to set different content for the hero based on page.
 * See volatyl_hero().
 */

// Front page template
if ( ( is_front_page() && ! is_home() ) ) {

	// Make sure the title is always set.
	$front_page_hero_title = get_bloginfo( 'description' );
	if ( ! empty( get_theme_mod( 'volatyl_front_page_hero_title' ) ) ) {
		$front_page_hero_title = get_theme_mod( 'volatyl_front_page_hero_title' );
	}

	volatyl_hero( array(
		'title'         => $front_page_hero_title,
		'subtitle'      => get_theme_mod( 'volatyl_front_page_hero_subtitle', '' ),
		'alignment'     => get_theme_mod( 'volatyl_front_page_hero_centered', 0 ),
		'primary_cta'   => array(
			'url'  => get_theme_mod( 'volatyl_front_page_hero_primary_cta_button_url', '' ),
			'text' => get_theme_mod( 'volatyl_front_page_hero_primary_cta_button_text', '' ),
		),
		'secondary_cta' => array(
			'url'  => get_theme_mod( 'volatyl_front_page_hero_secondary_cta_button_url', '' ),
			'text' => get_theme_mod( 'volatyl_front_page_hero_secondary_cta_button_text', '' ),
		),
	) );
}