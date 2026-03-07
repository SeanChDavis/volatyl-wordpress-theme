<?php

/**
 * All customizer additions related to selective refresh.
 */
$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

$wp_customize->get_setting( 'volatyl_full_width_structure' )->transport = 'postMessage';

$wp_customize->get_setting( 'volatyl_primary_hue' )->transport           = 'postMessage';
$wp_customize->get_setting( 'volatyl_global_hue_saturation' )->transport = 'postMessage';
$wp_customize->get_setting( 'volatyl_color_scheme_type' )->transport     = 'postMessage';

$wp_customize->get_setting( 'volatyl_page_comments' )->transport = 'postMessage';

$wp_customize->get_setting( 'volatyl_front_page_hero_centered' )->transport = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_title' )->transport                     = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_description' )->transport               = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_primary_cta_button_text' )->transport   = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_primary_cta_button_url' )->transport    = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_secondary_cta_button_text' )->transport = 'postMessage';
$wp_customize->get_setting( 'volatyl_front_page_hero_secondary_cta_button_url' )->transport  = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
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
	$wp_customize->selective_refresh->add_partial( 'volatyl_page_comments', array(
		'selector'        => '.page .comments-area',
		'render_callback' => function () {
			if ( 1 == get_theme_mod( 'volatyl_page_comments' ) && ( comments_open() || get_comments_number() ) ) {
				comments_template();
			}
		},
	) );
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
}