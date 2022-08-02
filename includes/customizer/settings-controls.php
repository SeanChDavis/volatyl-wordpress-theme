<?php

/**
 * HTML Structure
 */

// full-width HTML structure
$wp_customize->add_setting( 'volatyl_full_width_structure', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_full_width_structure', array(
	'label'    => __( 'Enable full-width', 'volatyl' ),
	'section'  => 'volatyl_structure',
	'priority' => 10,
	'type'     => 'checkbox',
) );

/**
 * Content Configuration
 */

// Page settings area
$wp_customize->add_setting( 'volatyl_page_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_page_settings', array(
	'label'       => __( 'Pages', 'volatyl' ),
	'description' => __( 'The following settings are specific to standard WordPress Pages.', 'volatyl' ),
	'section'     => 'volatyl_content_section',
	'priority'    => 10,
) ) );

// Comments on pages?
$wp_customize->add_setting( 'volatyl_page_comments', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_page_comments', array(
	'label'    => __( 'Enable comments on standard pages', 'volatyl' ),
	'section'  => 'volatyl_content_section',
	'priority' => 20,
	'type'     => 'checkbox',
) );

/**
 * Template - Front Page
 */

// Hero settings
$wp_customize->add_setting( 'volatyl_front_page_hero_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_hero_settings', array(
	'label'       => __( 'Hero Area', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'priority'    => 10,
	'description' => __( 'The following settings apply to the hero area on the front page.', 'vendd' ),
) ) );

// Hero Title
$wp_customize->add_setting( 'volatyl_front_page_hero_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_front_page_hero_title', array(
	'label'       => __( 'Title', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => __( 'By default, your WordPress site tagline is used as the front page hero title. To override that behavior, you may adjust the text here. This text will not change your WordPress site tagline.', 'volatyl' ),
	'priority'    => 20,
) ) );

// Hero Subtitle
$wp_customize->add_setting( 'volatyl_front_page_hero_subtitle', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_front_page_hero_subtitle', array(
	'label'       => __( 'Subtitle', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => sprintf( __( 'This content displays below the hero title in a paragraph format. 2-3 sentences looks best. Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>, <i>' ),
	'priority'    => 30,
) ) );

// Hero primary CTA button URL
$wp_customize->add_setting( 'volatyl_front_page_hero_primary_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_primary_cta_button_url', array(
	'label'       => __( 'Primary call-to-action URL', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => __( 'Set the URL of the primary call-to-action button.', 'volatyl' ),
	'priority'    => 40,
) );

// Hero primary CTA button text
$wp_customize->add_setting( 'volatyl_front_page_hero_primary_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_primary_cta_button_text', array(
	'label'       => __( 'Primary call-to-action text', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => __( 'Set the text of the primary call-to-action button.', 'volatyl' ),
	'priority'    => 50,
) );

// Hero secondary CTA button URL
$wp_customize->add_setting( 'volatyl_front_page_hero_secondary_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_secondary_cta_button_url', array(
	'label'       => __( 'Secondary call-to-action URL', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => __( 'Set the URL of the secondary call-to-action link.', 'volatyl' ),
	'priority'    => 60,
) );

// Hero secondary CTA button text
$wp_customize->add_setting( 'volatyl_front_page_hero_secondary_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_secondary_cta_button_text', array(
	'label'       => __( 'Secondary call-to-action text', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => __( 'Set the text of the secondary call-to-action link.', 'volatyl' ),
	'priority'    => 70,
) );

// Blog settings area
$wp_customize->add_setting( 'volatyl_front_page_blog_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_blog_settings', array(
	'label'       => __( 'Blog Posts Area', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'priority'    => 100,
	'description' => __( 'The following settings apply to the blog posts area on the front page.', 'vendd' ),
) ) );

// Blog posts grid display
$wp_customize->add_setting( 'volatyl_front_page_blog_posts_grid_columns_rows', array(
	'default'           => '2_2',
	'sanitize_callback' => 'volatyl_sanitize_select',
) );
$wp_customize->add_control( 'volatyl_front_page_blog_posts_grid_columns_rows', array(
	'label'    => __( 'How should blog posts display?', 'volatyl' ),
	'section'  => 'volatyl_front_page_template',
	'priority' => 110,
	'type'     => 'select',
	'choices'  => array(
		'2_1' => __( '2 columns / 1 row -- ( 2 total )', 'volatyl' ),
		'2_2' => __( '2 columns / 2 rows -- ( 4 total )', 'volatyl' ),
		'2_3' => __( '2 columns / 3 rows -- ( 6 total )', 'volatyl' ),
		'3_1' => __( '3 columns / 1 row -- ( 3 total )', 'volatyl' ),
		'3_2' => __( '3 columns / 2 rows -- ( 6 total )', 'volatyl' ),
		'3_3' => __( '3 columns / 3 rows -- ( 9 total )', 'volatyl' ),
	),
) );

/**
 * Template - Blog
 */

// Posts per page (linked to core setting)
$wp_customize->add_setting( 'volatyl_blog_posts_grid_columns_rows', array(
	'default'           => 'default',
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_posts_grid_columns_rows', array(
	'label'    => __( 'How should blog posts display?', 'volatyl' ),
	'section'  => 'volatyl_blog_template',
	'priority' => 10,
	'type'     => 'select',
	'choices'  => array(
		'default' => __( 'Default (Settings -> Reading)', 'volatyl' ),
		'2_1'     => __( '2 columns / 1 row -- ( 2 total )', 'volatyl' ),
		'2_2'     => __( '2 columns / 2 rows -- ( 4 total )', 'volatyl' ),
		'2_3'     => __( '2 columns / 3 rows -- ( 6 total )', 'volatyl' ),
		'2_4'     => __( '2 columns / 4 rows -- ( 8 total )', 'volatyl' ),
		'2_5'     => __( '2 columns / 5 rows -- ( 10 total )', 'volatyl' ),
		'3_1'     => __( '3 columns / 1 row -- ( 3 total )', 'volatyl' ),
		'3_2'     => __( '3 columns / 2 rows -- ( 6 total )', 'volatyl' ),
		'3_3'     => __( '3 columns / 3 rows -- ( 9 total )', 'volatyl' ),
		'3_4'     => __( '3 columns / 4 rows -- ( 12 total )', 'volatyl' ),
		'3_5'     => __( '3 columns / 5 rows -- ( 15 total )', 'volatyl' ),
	),
) );