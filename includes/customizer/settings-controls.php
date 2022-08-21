<?php

/**
 * HTML Structure
 */

// Full-width HTML structure
$wp_customize->add_setting( 'volatyl_full_width_structure', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_full_width_structure', array(
	'label'    => __( 'Enable full-width', 'volatyl' ),
	'description'    => __( 'When enabled, the HTML element that wraps all major site sections will span the full width of the viewport, allowing background colors to display across the screen while the content itself is contained within page boundaries. When disabled, commonly referred to as page-width display, the content itself is still contained but the wrapping element also has horizontal limits.', 'volatyl' ),
	'section'  => 'volatyl_structure',
	'priority' => 10,
	'type'     => 'checkbox',
) );

/**
 * Color scheme
 */

// Primary hue slider
$wp_customize->add_setting( 'volatyl_primary_hue', array(
	'default'           => 255,
	'type'              => 'theme_mod',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'volatyl_primary_hue', array(
	'label'           => __( 'Primary hue slider', 'volatyl' ),
	'section'         => 'volatyl_color_scheme',
	'description'     => sprintf( __( 'Your color scheme is intelligently configured based on your selection of one single hue. A hue (color) is represented as 1 degree of a 360-degree color wheel, with red at the 0/360 point. Use the slider control to choose your desired hue, where the far left represents 0 and the far right represents 360. %s will then use your chosen hue to craft color schemes based on established color theory. Learn more about <a href="https://en.wikipedia.org/wiki/Hue" target="_blank">hue</a> and <a href="https://en.wikipedia.org/wiki/Color_theory" target="_blank">color theory</a>.', 'volatyl' ), THEME_NAME ),
	'mode'            => 'hue',
	'priority'        => 10,
) ) );

// Global hue saturation
$wp_customize->add_setting( 'volatyl_primary_hue_saturation', array(
	'default'           => 43,
	'type'              => 'theme_mod',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_primary_hue_saturation', array(
	'type' => 'range',
	'section' => 'volatyl_color_scheme',
	'label' => __( 'Global hue saturation' ),
	'description' => __( 'While the primary hue selection builds your color scheme, this setting controls the saturation of the colors included in your color scheme. Use the slider control to choose your desired saturation, where the far left represents 0% (grayscale) and the far right represents 100% (vibrant hue).' ),
	'input_attrs' => array(
		'min' => 0,
		'max' => 100,
		'step' => 1,
	),
) );

/**
 * Content Configuration
 */

// Comments on pages?
$wp_customize->add_setting( 'volatyl_page_comments', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_page_comments', array(
	'label'    => __( 'Enable comments on standard pages', 'volatyl' ),
	'section'  => 'volatyl_content_section',
	'priority' => 10,
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

// Hero light logo
$wp_customize->add_setting( 'volatyl_front_page_hero_light_logo', array(
	'default'           => 0,
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'volatyl_front_page_hero_light_logo', array(
	'label'           => __( 'Light logo', 'volatyl' ),
	'description'     => __( 'Upload a light version of your logo to display over the dark header background.', 'volatyl' ),
	'section'         => 'volatyl_front_page_template',
	'priority'        => 20,
	'mime_type'       => 'image',
	'active_callback' => function ( $control ) {
		if ( $control->manager->get_setting( 'volatyl_front_page_hero_dark' )->value() === 1 ) {
			return true;
		} else {
			return false;
		}
	},
) ) );

// Hero alignment
$wp_customize->add_setting( 'volatyl_front_page_hero_centered', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_front_page_hero_centered', array(
	'label'    => __( 'Center the hero content', 'volatyl' ),
	'section'  => 'volatyl_front_page_template',
	'priority' => 30,
	'type'     => 'checkbox',
) );

// Hero title
$wp_customize->add_setting( 'volatyl_front_page_hero_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_front_page_hero_title', array(
	'label'       => __( 'Title', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => __( 'By default, your WordPress site tagline is used as the front page hero title. To override that behavior, you may adjust the text here. This text will not change your WordPress site tagline.', 'volatyl' ),
	'priority'    => 40,
) ) );

// Hero subtitle
$wp_customize->add_setting( 'volatyl_front_page_hero_subtitle', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_front_page_hero_subtitle', array(
	'label'       => __( 'Subtitle', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => sprintf( __( 'This content displays below the hero title in a paragraph format. 2-3 sentences looks best. Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
	'priority'    => 50,
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
	'priority'    => 60,
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
	'priority'    => 70,
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
	'priority'    => 80,
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
	'priority'    => 90,
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
	'default'           => '3_1',
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
	'description' => sprintf( __( 'This content displays below the blog title in a paragraph format. 2-3 sentences looks best. Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
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
	'default'           => '3_3',
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_posts_grid_columns_rows', array(
	'label'    => __( 'How many blog posts should display?', 'volatyl' ),
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
	'label'           => __( 'Enable dark call-to-action', 'volatyl' ),
	'section'         => 'volatyl_blog_template',
	'priority'        => 220,
	'type'            => 'checkbox',
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) );

// Blog grid CTA title
$wp_customize->add_setting( 'volatyl_blog_grid_cta_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_title', array(
	'label'           => __( 'Title', 'volatyl' ),
	'section'         => 'volatyl_blog_template',
	'description'     => __( 'The large title text for the call-to-action area.', 'volatyl' ),
	'priority'        => 230,
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) );

// Blog grid CTA description
$wp_customize->add_setting( 'volatyl_blog_grid_cta_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_blog_grid_cta_description', array(
	'label'           => __( 'Description', 'volatyl' ),
	'section'         => 'volatyl_blog_template',
	'description'     => sprintf( __( 'Describe to your visitor the reason for taking this particular action on your site. Consider 1-2 sentences Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
	'priority'        => 240,
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) ) );

// Blog grid CTA button URL
$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_button_url', array(
	'label'           => __( 'Call-to-action button URL', 'volatyl' ),
	'section'         => 'volatyl_blog_template',
	'description'     => __( 'Set the URL of the call-to-action button.', 'volatyl' ),
	'priority'        => 250,
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) );

// Blog grid CTA button text
$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_button_text', array(
	'label'           => __( 'Call-to-action button text', 'volatyl' ),
	'section'         => 'volatyl_blog_template',
	'description'     => __( 'Set the text of the call-to-action button.', 'volatyl' ),
	'priority'        => 260,
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
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
	'description' => __( 'There must be a title, description, or button in Footer Lead area for it to display.', 'volatyl' ),
	'type'        => 'checkbox',
) );

// Footer Lead title
$wp_customize->add_setting( 'volatyl_footer_lead_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_title', array(
	'label'           => __( 'Title', 'volatyl' ),
	'section'         => 'volatyl_footer_areas',
	'description'     => __( 'The large title text for the area.', 'volatyl' ),
	'priority'        => 20,
	'active_callback' => 'volatyl_display_footer_lead_settings',
) );

// Footer Lead description
$wp_customize->add_setting( 'volatyl_footer_lead_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_footer_lead_description', array(
	'label'           => __( 'Description', 'volatyl' ),
	'section'         => 'volatyl_footer_areas',
	'description'     => sprintf( __( 'Describe to your visitor the reason for taking this particular action on your site. Consider 1-2 sentences Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
	'priority'        => 30,
	'active_callback' => 'volatyl_display_footer_lead_settings',
) ) );

// Footer Lead CTA button URL
$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_cta_button_url', array(
	'label'           => __( 'Call-to-action button URL', 'volatyl' ),
	'section'         => 'volatyl_footer_areas',
	'description'     => __( 'Set the URL of the call-to-action button.', 'volatyl' ),
	'priority'        => 40,
	'active_callback' => 'volatyl_display_footer_lead_settings',
) );

// Footer Lead CTA button text
$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_cta_button_text', array(
	'label'           => __( 'Call-to-action button text', 'volatyl' ),
	'section'         => 'volatyl_footer_areas',
	'description'     => __( 'Set the text of the call-to-action button.', 'volatyl' ),
	'priority'        => 50,
	'active_callback' => 'volatyl_display_footer_lead_settings',
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
	'description' => __( 'There must be content in at least one Fat Footer widget area.', 'volatyl' ),
	'type'        => 'checkbox',
) );

// Fat Footer alternate layout
$wp_customize->add_setting( 'volatyl_fat_footer_alternate_layout', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_fat_footer_alternate_layout', array(
	'label'           => __( 'Enable alternate layout', 'volatyl' ),
	'section'         => 'volatyl_footer_areas',
	'priority'        => 110,
	'description'     => __( 'When either three or four Fat Footer widget areas are in use, the alternate layout makes the left-most area wider than the others.', 'volatyl' ),
	'type'            => 'checkbox',
	'active_callback' => 'volatyl_display_fat_footer_settings',
) );