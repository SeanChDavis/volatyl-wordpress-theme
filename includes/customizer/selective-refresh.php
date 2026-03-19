<?php
/**
 * This works together with the core customizer's live previewing for a better user experience.
 * It allows for selective refresh of parts of the page when certain settings are changed,
 * without needing to refresh the entire page.
 *
 * Between binding in customizer.js and the render callbacks defined here, we achieve a better
 * live preview experience. Not all settings are set to use selective refresh.
 */

// Site Identity.
$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

// HTML Structure.
$wp_customize->get_setting( 'volatyl_full_width_structure' )->transport = 'postMessage';

// Color Scheme.
$wp_customize->get_setting( 'volatyl_primary_hue' )->transport           = 'postMessage';
$wp_customize->get_setting( 'volatyl_global_hue_saturation' )->transport = 'postMessage';
$wp_customize->get_setting( 'volatyl_color_scheme_type' )->transport     = 'postMessage';

// Content Configuration.
$wp_customize->get_setting( 'volatyl_page_comments' )->transport = 'postMessage';

// Front Page.
$wp_customize->get_setting( 'volatyl_front_page_hero_dark' )->transport        = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_centered' )->transport                  = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_title' )->transport                     = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_description' )->transport               = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_primary_cta_button_text' )->transport   = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_primary_cta_button_url' )->transport    = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_secondary_cta_button_text' )->transport = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_secondary_cta_button_url' )->transport  = 'postMessage';

// Blog Page.
$wp_customize->get_setting( 'volatyl_blog_title' )->transport                 = 'postMessage';
$wp_customize->get_setting( 'volatyl_blog_description' )->transport           = 'postMessage';
$wp_customize->get_setting( 'volatyl_blog_search_form' )->transport           = 'postMessage';
$wp_customize->get_setting( 'volatyl_blog_grid_cta_color_scheme' )->transport = 'postMessage';
$wp_customize->get_setting( 'volatyl_blog_grid_cta_title' )->transport        = 'postMessage';
$wp_customize->get_setting( 'volatyl_blog_grid_cta_description' )->transport  = 'postMessage';
$wp_customize->get_setting( 'volatyl_blog_grid_cta_button_text' )->transport  = 'postMessage';
$wp_customize->get_setting( 'volatyl_blog_grid_cta_button_url' )->transport   = 'postMessage';

// Footer areas.
$wp_customize->get_setting( 'volatyl_footer_lead_color_scheme' )->transport    = 'postMessage';
$wp_customize->get_setting( 'volatyl_footer_lead_title' )->transport           = 'postMessage';
$wp_customize->get_setting( 'volatyl_footer_lead_description' )->transport     = 'postMessage';
$wp_customize->get_setting( 'volatyl_footer_lead_cta_button_text' )->transport = 'postMessage';
$wp_customize->get_setting( 'volatyl_footer_lead_cta_button_url' )->transport  = 'postMessage';
$wp_customize->get_setting( 'volatyl_footer_general_color_scheme' )->transport = 'postMessage';
$wp_customize->get_setting( 'volatyl_fat_footer_alternate_layout' )->transport = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {

	// Site Identity Partials.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => function () {
			bloginfo( 'name' );
		},
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.front-page .content-header-title',
		'render_callback' => function () {
			bloginfo( 'description' );
		},
	) );

	// Content Configuration Partials.
	$wp_customize->selective_refresh->add_partial( 'volatyl_page_comments', array(
		'selector'        => '.page .comments-area',
		'render_callback' => function () {
			if ( 1 == get_theme_mod( 'volatyl_page_comments' ) && ( comments_open() || get_comments_number() ) ) {
				comments_template();
			}
		},
	) );

	// Front Page Partials.
	$wp_customize->selective_refresh->add_partial( 'volatyl_front_page_hero_title', array(
		'selector'        => '.front-page .content-header-title',
		'render_callback' => function () {
			echo get_theme_mod( 'volatyl_front_page_hero_title', '' );
		},
	) );
	$wp_customize->selective_refresh->add_partial( 'volatyl_front_page_hero_description', array(
		'selector'        => '.front-page .content-header-description',
		'render_callback' => function () {
			echo get_theme_mod( 'volatyl_front_page_hero_description', '' );
		},
	) );
	$wp_customize->selective_refresh->add_partial( 'volatyl_front_page_hero_primary_cta_button_text', array(
		'selector'        => '.front-page .content-header-primary-cta a',
		'render_callback' => function () {
			echo get_theme_mod( 'volatyl_front_page_hero_primary_cta_button_text', '' );
		},
	) );
	$wp_customize->selective_refresh->add_partial( 'volatyl_front_page_hero_secondary_cta_button_text', array(
		'selector'        => '.front-page .content-header-secondary-cta a',
		'render_callback' => function () {
			echo get_theme_mod( 'volatyl_front_page_hero_secondary_cta_button_text', '' );
		},
	) );

	// Blog Page Partials.
	$wp_customize->selective_refresh->add_partial( 'volatyl_blog_search_form', array(
		'selector'        => '.blog .content-header-description + *',
		'render_callback' => function () {
			if ( get_theme_mod( 'volatyl_blog_search_form', '' ) ) {
				get_search_form();
			}
		},
	) );
	$wp_customize->selective_refresh->add_partial( 'volatyl_blog_grid_cta_button_text', array(
		'selector'        => '.blog .blog-grid-cta .cta-action a',
		'render_callback' => function () {
			echo get_theme_mod( 'volatyl_blog_grid_cta_button_text', '' );
		},
	) );

	// Footer Areas Partials.
	$wp_customize->selective_refresh->add_partial( 'volatyl_footer_lead_cta_button_text', array(
		'selector'        => '.footer-lead .cta-action a',
		'render_callback' => function () {
			echo get_theme_mod( 'volatyl_footer_lead_cta_button_text', '' );
		},
	) );
}