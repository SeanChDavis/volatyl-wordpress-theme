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
	'section'     => 'volatyl_structure',
	'priority'    => 10,
	'label'       => __( 'Enable full-width', 'volatyl' ),
	'description' => __( 'When enabled, the HTML element that wraps all major site sections will span the full width of the viewport, allowing section background colors to display across the screen while the content itself is contained within page boundaries. When disabled, commonly referred to as page-width display, the content itself is still contained but the wrapping element also has horizontal boundaries.', 'volatyl' ),
	'type'        => 'checkbox',
) );

/**
 * Color scheme
 */

// Primary hue
$wp_customize->add_setting( 'volatyl_primary_hue_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_primary_hue_area', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 1,
	'label'       => __( 'Primary hue', 'volatyl' ),
	'description' => __( 'Your color scheme is intelligently configured based on your selection of one single hue. A hue (color) is represented as 1 degree of a 360-degree color wheel, with red at the 0/360 point. Use the slider control to choose your desired hue, where the far left represents 0 and the far right represents 360. <a href="https://en.wikipedia.org/wiki/Hue" target="_blank">Learn more about hue</a>.', 'volatyl' ),
) ) );

// Primary hue slider
$wp_customize->add_setting( 'volatyl_primary_hue', array(
	'default'           => DEFAULT_PRIMARY_HUE,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'volatyl_primary_hue', array(
	'section'  => 'volatyl_color_scheme',
	'priority' => 10,
	'label'    => __( 'Choose your preferred hue', 'volatyl' ),
	'mode'     => 'hue',
) ) );

// Global hue saturation
$wp_customize->add_setting( 'volatyl_global_hue_saturation_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_global_hue_saturation_area', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 100,
	'label'       => __( 'Global hue saturation', 'volatyl' ),
	'description' => __( 'While the primary hue selection is used to build your color scheme, this setting controls the saturation of the colors included in your color scheme. Use the slider control to choose your desired saturation, where the far left represents 0% (grayscale) and the far right represents 100% (vibrant hue).', 'volatyl' ),
) ) );

// Global hue saturation slider
$wp_customize->add_setting( 'volatyl_global_hue_saturation', array(
	'default'           => DEFAULT_GLOBAL_HUE_SATURATION,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_global_hue_saturation', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 110,
	'label'       => __( 'Set a global hue saturation', 'volatyl' ),
	'type'        => 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
) );

// Color scheme
$wp_customize->add_setting( 'volatyl_color_scheme_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_color_scheme_area', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 200,
	'label'       => __( 'Color scheme', 'volatyl' ),
	'description' => sprintf( __( 'With your primary hue selected and saturation set, %s will now use your chosen hue to craft <a href="https://en.wikipedia.org/wiki/Color_theory" target="_blank">color schemes</a> based on established color theory.', 'volatyl' ), THEME_NAME ),
) ) );

// Color scheme selector
$wp_customize->add_setting( 'volatyl_color_scheme_type', array(
	'default'           => DEFAULT_COLOR_SCHEME_TYPE,
	'sanitize_callback' => 'volatyl_sanitize_select',
) );
$wp_customize->add_control( 'volatyl_color_scheme_type', array(
	'section'  => 'volatyl_color_scheme',
	'priority' => 210,
	'label'    => __( 'Select a color scheme type', 'volatyl' ),
	'type'     => 'select',
	'choices'  => array(
		'monochromatic' => __( 'Monochromatic', 'volatyl' ),
		'complementary' => __( 'Complementary', 'volatyl' ),
		'analogous'     => __( 'Analogous', 'volatyl' ),
//		'triadic'             => __( 'Triadic', 'volatyl' ),
//		'split_complementary' => __( 'Split-complementary', 'volatyl' ),
//		'tetradic'            => __( 'Tetradic', 'volatyl' ),
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
	'section'  => 'volatyl_content_section',
	'priority' => 10,
	'label'    => __( 'Enable comments on standard pages', 'volatyl' ),
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
	'section'     => 'volatyl_front_page_template',
	'priority'    => 1,
	'label'       => __( 'Hero Area', 'volatyl' ),
	'description' => __( 'The following settings apply to the hero area on the front page.', 'volatyl' ),
) ) );

// Hero color scheme
$wp_customize->add_setting( 'volatyl_front_page_hero_dark', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_front_page_hero_dark', array(
	'section'  => 'volatyl_front_page_template',
	'priority' => 10,
	'label'    => __( 'Enable dark header & hero', 'volatyl' ),
	'type'     => 'checkbox',
) );

// Hero light logo
$wp_customize->add_setting( 'volatyl_front_page_hero_light_logo', array(
	'default'           => 0,
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'volatyl_front_page_hero_light_logo', array(
	'section'         => 'volatyl_front_page_template',
	'priority'        => 20,
	'label'           => __( 'Light logo', 'volatyl' ),
	'description'     => __( 'Upload a light version of your logo to display over the dark header background.', 'volatyl' ),
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
	'section'  => 'volatyl_front_page_template',
	'priority' => 30,
	'label'    => __( 'Center the hero content', 'volatyl' ),
	'type'     => 'checkbox',
) );

// Hero title
$wp_customize->add_setting( 'volatyl_front_page_hero_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_front_page_hero_title', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 40,
	'label'       => __( 'Title', 'volatyl' ),
	'description' => __( 'By default, your WordPress site tagline is used as the front page hero title. To override that behavior, you may adjust the text here. This text will not change your WordPress site tagline.', 'volatyl' ),
) ) );

// Hero subtitle
$wp_customize->add_setting( 'volatyl_front_page_hero_subtitle', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_front_page_hero_subtitle', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 50,
	'label'       => __( 'Subtitle', 'volatyl' ),
	'description' => sprintf( __( 'This content displays below the hero title in a paragraph format. 2-3 sentences looks best. Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
) ) );

// Hero primary CTA button URL
$wp_customize->add_setting( 'volatyl_front_page_hero_primary_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_primary_cta_button_url', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 60,
	'label'       => __( 'Primary call-to-action URL', 'volatyl' ),
	'description' => __( 'Set the URL of the primary call-to-action button.', 'volatyl' ),
) );

// Hero primary CTA button text
$wp_customize->add_setting( 'volatyl_front_page_hero_primary_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_primary_cta_button_text', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 70,
	'label'       => __( 'Primary call-to-action text', 'volatyl' ),
	'description' => __( 'Set the text of the primary call-to-action button.', 'volatyl' ),
) );

// Hero secondary CTA button URL
$wp_customize->add_setting( 'volatyl_front_page_hero_secondary_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_secondary_cta_button_url', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 80,
	'label'       => __( 'Secondary call-to-action URL', 'volatyl' ),
	'description' => __( 'Set the URL of the secondary call-to-action link.', 'volatyl' ),
) );

// Hero secondary CTA button text
$wp_customize->add_setting( 'volatyl_front_page_hero_secondary_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_secondary_cta_button_text', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 90,
	'label'       => __( 'Secondary call-to-action text', 'volatyl' ),
	'description' => __( 'Set the text of the secondary call-to-action link.', 'volatyl' ),
) );

// Blog settings area
$wp_customize->add_setting( 'volatyl_front_page_blog_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_blog_settings', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 101,
	'label'       => __( 'Blog Posts Area', 'volatyl' ),
	'description' => __( 'The following settings apply to the blog posts area on the front page.', 'volatyl' ),
) ) );

// Blog posts grid display
$wp_customize->add_setting( 'volatyl_front_page_blog_posts_grid_columns_rows', array(
	'default'           => '3_1',
	'sanitize_callback' => 'volatyl_sanitize_select',
) );
$wp_customize->add_control( 'volatyl_front_page_blog_posts_grid_columns_rows', array(
	'section'  => 'volatyl_front_page_template',
	'priority' => 110,
	'label'    => __( 'How should blog posts display?', 'volatyl' ),
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

// Featured Page settings area
$wp_customize->add_setting( 'volatyl_front_page_featured_page_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_featured_page_settings', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 201,
	'label'       => __( 'Featured Page Area', 'volatyl' ),
	'description' => __( 'The following settings apply to the Featured Page area on the front page.', 'volatyl' ),
) ) );

// Featured Page select
$wp_customize->add_setting( 'volatyl_front_page_featured_page_select', array(
	'default' => '',
) );
$wp_customize->add_control( 'volatyl_front_page_featured_page_select', array(
	'section'        => 'volatyl_front_page_template',
	'priority'       => 210,
	'label'          => __( 'Choose an existing page to feature.', 'volatyl' ),
	'description'    => __( 'The title and complete content of the selected page will display on your front page. If needed, create a page specific for this section. If an excerpt is added to the page, it will display below the title.', 'volatyl' ),
	'type'           => 'dropdown-pages',
	'allow_addition' => true,
) );

/**
 * Template - Blog
 */

// Blog header
$wp_customize->add_setting( 'volatyl_blog_header_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_blog_header_settings', array(
	'section'     => 'volatyl_blog_template',
	'priority'    => 1,
	'label'       => __( 'Header Area', 'volatyl' ),
	'description' => __( 'The following settings apply to the header area on the blog page.', 'volatyl' ),
) ) );

// Blog title
$wp_customize->add_setting( 'volatyl_blog_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_blog_title', array(
	'section'     => 'volatyl_blog_template',
	'priority'    => 10,
	'label'       => __( 'Title', 'volatyl' ),
	'description' => __( 'By default, the standard page title is displayed. To override that title, add text here. This text will not change the actual title of the page or its slug.', 'volatyl' ),
) ) );

// Blog description
$wp_customize->add_setting( 'volatyl_blog_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_blog_description', array(
	'section'     => 'volatyl_blog_template',
	'priority'    => 20,
	'label'       => __( 'Description', 'volatyl' ),
	'description' => sprintf( __( 'This content displays below the blog title in a paragraph format. 2-3 sentences looks best. Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
) ) );

// Blog search form
$wp_customize->add_setting( 'volatyl_blog_search_form', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_blog_search_form', array(
	'section'  => 'volatyl_blog_template',
	'priority' => 30,
	'label'    => __( 'Enable search form', 'volatyl' ),
	'type'     => 'checkbox',
) );

// Blog settings area
$wp_customize->add_setting( 'volatyl_blog_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_blog_settings', array(
	'section'     => 'volatyl_blog_template',
	'priority'    => 100,
	'label'       => __( 'Blog Posts Area', 'volatyl' ),
	'description' => __( 'The following settings apply to the blog posts grid on the blog page.', 'volatyl' ),
) ) );

// Posts per page (linked to core setting)
$wp_customize->add_setting( 'volatyl_blog_posts_grid_columns_rows', array(
	'default'           => '3_3',
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_posts_grid_columns_rows', array(
	'section'  => 'volatyl_blog_template',
	'priority' => 110,
	'label'    => __( 'How many blog posts should display?', 'volatyl' ),
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
	'section'     => 'volatyl_blog_template',
	'priority'    => 200,
	'label'       => __( 'Blog Grid Call-to-action Area', 'volatyl' ),
	'description' => __( 'The following settings apply to the call-to-action area inside the blog grid.', 'volatyl' ),
) ) );

// Blog grid CTA
$wp_customize->add_setting( 'volatyl_blog_grid_cta', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta', array(
	'section'  => 'volatyl_blog_template',
	'priority' => 210,
	'label'    => __( 'Enable call-to-action in blog grid', 'volatyl' ),
	'type'     => 'checkbox',
) );

// Blog grid CTA color scheme
$wp_customize->add_setting( 'volatyl_blog_grid_cta_color_scheme', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_color_scheme', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 220,
	'label'           => __( 'Enable dark call-to-action', 'volatyl' ),
	'type'            => 'checkbox',
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) );

// Blog grid CTA title
$wp_customize->add_setting( 'volatyl_blog_grid_cta_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_title', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 230,
	'label'           => __( 'Title', 'volatyl' ),
	'description'     => __( 'The large title text for the call-to-action area.', 'volatyl' ),
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) );

// Blog grid CTA description
$wp_customize->add_setting( 'volatyl_blog_grid_cta_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_blog_grid_cta_description', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 240,
	'label'           => __( 'Description', 'volatyl' ),
	'description'     => sprintf( __( 'Describe to your visitor the reason for taking this particular action on your site. Consider 1-2 sentences Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) ) );

// Blog grid CTA button URL
$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_button_url', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 250,
	'label'           => __( 'Call-to-action button URL', 'volatyl' ),
	'description'     => __( 'Set the URL of the call-to-action button.', 'volatyl' ),
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) );

// Blog grid CTA button text
$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_button_text', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 260,
	'label'           => __( 'Call-to-action button text', 'volatyl' ),
	'description'     => __( 'Set the text of the call-to-action button.', 'volatyl' ),
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
	'section'     => 'volatyl_footer_areas',
	'priority'    => 1,
	'label'       => __( 'Footer Lead Area', 'volatyl' ),
	'description' => __( 'This area displays above the Fat Footer (if present) and the Site Footer. It is used as a site-wide call-to-action, displaying on all pages by default.', 'volatyl' ),
) ) );

// Footer Lead
$wp_customize->add_setting( 'volatyl_footer_lead', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_footer_lead', array(
	'section'     => 'volatyl_footer_areas',
	'priority'    => 10,
	'label'       => __( 'Enable Footer Lead area', 'volatyl' ),
	'description' => __( 'There must be a title, description, or button in Footer Lead area for it to display.', 'volatyl' ),
	'type'        => 'checkbox',
) );

// Footer Lead title
$wp_customize->add_setting( 'volatyl_footer_lead_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_title', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 20,
	'label'           => __( 'Title', 'volatyl' ),
	'description'     => __( 'The large title text for the area.', 'volatyl' ),
	'active_callback' => 'volatyl_display_footer_lead_settings',
) );

// Footer Lead description
$wp_customize->add_setting( 'volatyl_footer_lead_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_footer_lead_description', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 30,
	'label'           => __( 'Description', 'volatyl' ),
	'description'     => sprintf( __( 'Describe to your visitor the reason for taking this particular action on your site. Consider 1-2 sentences Allowed HTML tags: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
	'active_callback' => 'volatyl_display_footer_lead_settings',
) ) );

// Footer Lead CTA button URL
$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_cta_button_url', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 40,
	'label'           => __( 'Call-to-action button URL', 'volatyl' ),
	'description'     => __( 'Set the URL of the call-to-action button.', 'volatyl' ),
	'active_callback' => 'volatyl_display_footer_lead_settings',
) );

// Footer Lead CTA button text
$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_footer_lead_cta_button_text', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 50,
	'label'           => __( 'Call-to-action button text', 'volatyl' ),
	'description'     => __( 'Set the text of the call-to-action button.', 'volatyl' ),
	'active_callback' => 'volatyl_display_footer_lead_settings',
) );

// Fat Footer area
$wp_customize->add_setting( 'volatyl_fat_footer_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_fat_footer_area', array(
	'section'     => 'volatyl_footer_areas',
	'priority'    => 101,
	'label'       => __( 'Fat Footer Area', 'volatyl' ),
	'description' => __( 'This area displays below the Footer Lead (if present) and above the Site Footer. Its content is populated by any one of four widgetized areas.', 'volatyl' ),
) ) );

// Fat Footer
$wp_customize->add_setting( 'volatyl_fat_footer', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_fat_footer', array(
	'section'     => 'volatyl_footer_areas',
	'priority'    => 110,
	'label'       => __( 'Enable Fat Footer area', 'volatyl' ),
	'description' => __( 'There must be content in at least one Fat Footer widget area.', 'volatyl' ),
	'type'        => 'checkbox',
) );

// Fat Footer alternate layout
$wp_customize->add_setting( 'volatyl_fat_footer_alternate_layout', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_fat_footer_alternate_layout', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 110,
	'label'           => __( 'Enable alternate layout', 'volatyl' ),
	'description'     => __( 'When either three or four Fat Footer widget areas are in use, the alternate layout makes the left-most area wider than the others.', 'volatyl' ),
	'type'            => 'checkbox',
	'active_callback' => 'volatyl_display_fat_footer_settings',
) );