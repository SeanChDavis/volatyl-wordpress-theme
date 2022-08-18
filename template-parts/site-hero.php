<?php // Site hero inside the #masthead as a sibling to the .site-header

if ( is_front_page() ) {
	$front_page_hero_title = get_bloginfo( 'description' );
	if ( ! empty( get_theme_mod( 'volatyl_front_page_hero_title' ) ) ) {
		$front_page_hero_title = get_theme_mod( 'volatyl_front_page_hero_title' );
	}
	volatyl_hero( array(
		'title'         => $front_page_hero_title,
		'subtitle'      => get_theme_mod( 'volatyl_front_page_hero_subtitle', '' ),
		'light'         => get_theme_mod( 'volatyl_front_page_hero_light', 0 ),
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