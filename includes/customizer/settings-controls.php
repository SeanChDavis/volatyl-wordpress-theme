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
	'priority'    => 1,
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
 * Color scheme
 */

// Color scheme
$wp_customize->add_setting( 'volatyl_primary_brand_color', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'volatyl_primary_brand_color', array(
	'label' => __( 'Choose your primary brand color', 'volatyl' ),
	'section'  => 'volatyl_color_scheme',
) ) );


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
	'priority'    => 1,
	'description' => __( 'The following settings apply to the hero area on the front page.', 'volatyl' ),
) ) );

// Hero color scheme
$wp_customize->add_setting( 'volatyl_front_page_hero_dark', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_front_page_hero_dark', array(
	'label'    => __( 'Enable dark header & hero', 'volatyl' ),
	'section'  => 'volatyl_front_page_template',
	'priority' => 10,
	'type'     => 'checkbox',
) );

// Hero alignment
$wp_customize->add_setting( 'volatyl_front_page_hero_centered', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_front_page_hero_centered', array(
	'label'    => __( 'Center the hero content', 'volatyl' ),
	'section'  => 'volatyl_front_page_template',
	'priority' => 20,
	'type'     => 'checkbox',
) );

// Hero Title
$wp_customize->add_setting( 'volatyl_front_page_hero_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_front_page_hero_title', array(
	'label'       => __( 'Title', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => __( 'By default, your WordPress site tagline is used as the front page hero title. To override that behavior, you may adjust the text here. This text will not change your WordPress site tagline.', 'volatyl' ),
	'priority'    => 30,
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
	'priority'    => 40,
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
	'priority'    => 50,
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
	'priority'    => 60,
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
	'priority'    => 70,
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
	'priority'    => 80,
) );

// Blog settings area
$wp_customize->add_setting( 'volatyl_front_page_blog_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_blog_settings', array(
	'label'       => __( 'Blog Posts Area', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'priority'    => 101,
	'description' => __( 'The following settings apply to the blog posts area on the front page.', 'volatyl' ),
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

// Blog header
$wp_customize->add_setting( 'volatyl_blog_header_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_blog_header_settings', array(
	'label'       => __( 'Header Area', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'priority'    => 1,
	'description' => __( 'The following settings apply to the header area on the blog page.', 'volatyl' ),
) ) );

// Blog title
$wp_customize->add_setting( 'volatyl_blog_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_blog_title', array(
	'label'       => __( 'Title', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'description' => __( 'By default, the standard page title is displayed. To override that title, add text here. This text will not change the actual title of the page or its slug.', 'volatyl' ),
	'priority'    => 10,
) ) );

// Blog description
$wp_customize->add_setting( 'volatyl_blog_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_blog_description', array(
	'label'       => __( 'Description', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'description' => sprintf( __( 'This content displays below the blog title in a paragraph format. 2-3 sentences looks best. Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>, <i>' ),
	'priority'    => 20,
) ) );

// Blog settings area
$wp_customize->add_setting( 'volatyl_blog_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_blog_settings', array(
	'label'       => __( 'Blog Posts Area', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'priority'    => 100,
	'description' => __( 'The following settings apply to the blog posts grid on the blog page.', 'volatyl' ),
) ) );

// Posts per page (linked to core setting)
$wp_customize->add_setting( 'volatyl_blog_posts_grid_columns_rows', array(
	'default'           => 'default',
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_posts_grid_columns_rows', array(
	'label'    => __( 'How should blog posts display?', 'volatyl' ),
	'section'  => 'volatyl_blog_template',
	'priority' => 110,
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

// Blog grid CTA settings
$wp_customize->add_setting( 'volatyl_blog_grid_cta_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_blog_grid_cta_settings', array(
	'label'       => __( 'Blog Grid Call-to-action Area', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'priority'    => 200,
	'description' => __( 'The following settings apply to the call-to-action area inside the blog grid.', 'volatyl' ),
) ) );

// Blog grid CTA
$wp_customize->add_setting( 'volatyl_blog_grid_cta', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta', array(
	'label'    => __( 'Enable call-to-action in blog grid', 'volatyl' ),
	'section'  => 'volatyl_blog_template',
	'priority' => 210,
	'type'     => 'checkbox',
) );

// Blog grid CTA color scheme
$wp_customize->add_setting( 'volatyl_blog_grid_cta_color_scheme', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_color_scheme', array(
	'label'    => __( 'Enable dark call-to-action', 'volatyl' ),
	'section'  => 'volatyl_blog_template',
	'priority' => 220,
	'type'     => 'checkbox',
) );

// Blog grid CTA title
$wp_customize->add_setting( 'volatyl_blog_grid_cta_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_title', array(
	'label'       => __( 'Title', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'description' => __( 'The large title text for the call-to-action area.', 'volatyl' ),
	'priority'    => 230,
) );

// Blog grid CTA description
$wp_customize->add_setting( 'volatyl_blog_grid_cta_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_blog_grid_cta_description', array(
	'label'       => __( 'Description', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'description' => sprintf( __( 'Describe to your visitor the reason for taking this particular action on your site. Consider 1-2 sentences Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>, <i>' ),
	'priority'    => 240,
) ) );

// Blog grid CTA button URL
$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_button_url', array(
	'label'       => __( 'Call-to-action button URL', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'description' => __( 'Set the URL of the call-to-action button.', 'volatyl' ),
	'priority'    => 250,
) );

// Blog grid CTA button text
$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_button_text', array(
	'label'       => __( 'Call-to-action button text', 'volatyl' ),
	'section'     => 'volatyl_blog_template',
	'description' => __( 'Set the text of the call-to-action button.', 'volatyl' ),
	'priority'    => 260,
) );


/**
 * Footer Areas
 */

// Footer Lead area
$wp_customize->add_setting( 'volatyl_footer_lead_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_footer_lead_area', array(
	'label'       => __( 'Footer Lead Area', 'volatyl' ),
	'description' => __( 'This area displays above the Fat Footer (if present) and the Site Footer. It is used as a site-wide call-to-action, displaying on all pages by default.', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'priority'    => 1,
) ) );

// Footer Lead
$wp_customize->add_setting( 'volatyl_footer_lead', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_footer_lead', array(
	'label'       => __( 'Enable Footer Lead area', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'priority'    => 10,
	'description' => __( 'There must also be a title, description, or button in Footer Lead area for it to display.', 'volatyl' ),
	'type'        => 'checkbox',
) );

// Footer Lead title
$wp_customize->add_setting( 'volatyl_footer_lead_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_title', array(
	'label'       => __( 'Title', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'description' => __( 'The large title text for the area.', 'volatyl' ),
	'priority'    => 20,
) );

// Footer Lead description
$wp_customize->add_setting( 'volatyl_footer_lead_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_footer_lead_description', array(
	'label'       => __( 'Description', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'description' => sprintf( __( 'Describe to your visitor the reason for taking this particular action on your site. Consider 1-2 sentences Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>, <i>' ),
	'priority'    => 30,
) ) );

// Footer Lead CTA button URL
$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_cta_button_url', array(
	'label'       => __( 'Call-to-action button URL', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'description' => __( 'Set the URL of the call-to-action button.', 'volatyl' ),
	'priority'    => 40,
) );

// Footer Lead CTA button text
$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_cta_button_text', array(
	'label'       => __( 'Call-to-action button text', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'description' => __( 'Set the text of the call-to-action button.', 'volatyl' ),
	'priority'    => 50,
) );

// Fat Footer area
$wp_customize->add_setting( 'volatyl_fat_footer_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_fat_footer_area', array(
	'label'       => __( 'Fat Footer Area', 'volatyl' ),
	'description' => __( 'This area displays below the Footer Lead (if present) and above the Site Footer. Its content is populated by any one of four widgetized areas.', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'priority'    => 101,
) ) );

// Fat Footer
$wp_customize->add_setting( 'volatyl_fat_footer', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_fat_footer', array(
	'label'       => __( 'Enable Fat Footer area', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'priority'    => 110,
	'description' => __( 'There must also be content in at least one Fat Footer widget area.', 'volatyl' ),
	'type'        => 'checkbox',
) );

// Fat Footer alternate layout
$wp_customize->add_setting( 'volatyl_fat_footer_alternate_layout', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_fat_footer_alternate_layout', array(
	'label'       => __( 'Enable alternate layout', 'volatyl' ),
	'section'     => 'volatyl_footer_areas',
	'priority'    => 110,
	'description' => __( 'When either three or four Fat Footer widget areas are in use, the alternate layout makes the left-most area larger than the others.', 'volatyl' ),
	'type'        => 'checkbox',
) );