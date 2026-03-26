<?php

/**
 * Design
 */

// Corner radius
$wp_customize->add_setting( 'volatyl_border_radius_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_border_radius_area', array(
	'section'     => 'volatyl_section_backgrounds',
	'priority'    => 10,
	'label'       => __( 'Corner radius', 'volatyl' ),
	'description' => __( 'Controls the roundness of cards, images, code blocks, and other surfaces. At 0 all corners are sharp; higher values create progressively rounder shapes.', 'volatyl' ),
) ) );

$wp_customize->add_setting( 'volatyl_border_radius', array(
	'default'           => DEFAULT_BORDER_RADIUS,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_border_radius', array(
	'section'     => 'volatyl_section_backgrounds',
	'priority'    => 20,
	'label'       => __( 'Corner radius', 'volatyl' ),
	'type'        => 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1,
	),
) );

// Button radius
$wp_customize->add_setting( 'volatyl_button_radius_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_button_radius_area', array(
	'section'     => 'volatyl_section_backgrounds',
	'priority'    => 30,
	'label'       => __( 'Button radius', 'volatyl' ),
	'description' => __( 'Controls button corner roundness. The first half of the range gives fine-grained control; past the midpoint buttons become fully pill-shaped at any size.', 'volatyl' ),
) ) );

$wp_customize->add_setting( 'volatyl_button_radius', array(
	'default'           => DEFAULT_BUTTON_RADIUS,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_button_radius', array(
	'section'     => 'volatyl_section_backgrounds',
	'priority'    => 40,
	'label'       => __( 'Button radius', 'volatyl' ),
	'type'        => 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
) );

// Full-width layout
$wp_customize->add_setting( 'volatyl_full_width_structure', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_full_width_structure', array(
	'section'     => 'volatyl_section_backgrounds',
	'priority'    => 50,
	'label'       => __( 'Enable full-width layout', 'volatyl' ),
	'description' => __( 'Allows section backgrounds to extend edge-to-edge across the viewport. Content remains contained within page boundaries either way.', 'volatyl' ),
	'type'        => 'checkbox',
) );

// Section spacing heading
$wp_customize->add_setting( 'volatyl_section_spacing_heading', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_section_spacing_heading', array(
	'section'     => 'volatyl_section_backgrounds',
	'priority'    => 55,
	'label'       => __( 'Section Spacing', 'volatyl' ),
	'description' => __( 'Controls the vertical breathing room inside all content sections across the site. The footer and site header are not affected.', 'volatyl' ),
) ) );

$wp_customize->add_setting( 'volatyl_section_spacing', array(
	'default'           => 'default',
	'sanitize_callback' => 'volatyl_sanitize_section_spacing',
) );
$wp_customize->add_control( 'volatyl_section_spacing', array(
	'section'  => 'volatyl_section_backgrounds',
	'priority' => 56,
	'label'    => __( 'Section Spacing', 'volatyl' ),
	'type'     => 'select',
	'choices'  => array(
		'compact'  => __( 'Compact', 'volatyl' ),
		'default'  => __( 'Default', 'volatyl' ),
		'spacious' => __( 'Spacious', 'volatyl' ),
	),
) );

// Section backgrounds heading
$wp_customize->add_setting( 'volatyl_section_backgrounds_heading', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_section_backgrounds_heading', array(
	'section'     => 'volatyl_section_backgrounds',
	'priority'    => 60,
	'label'       => __( 'Section Backgrounds', 'volatyl' ),
	'description' => __( 'Choose which page types display with a dark header background. Individual pages and posts can be configured via the Page Layout option in the editor sidebar.', 'volatyl' ),
) ) );

// Logo display width
$wp_customize->add_setting( 'volatyl_logo_width', array(
	'default'           => DEFAULT_LOGO_WIDTH,
	'sanitize_callback' => 'absint',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( 'volatyl_logo_width', array(
	'section'     => 'title_tagline',
	'priority'    => 8,
	'type'        => 'range',
	'label'       => __( 'Logo width', 'volatyl' ),
	'description' => __( 'Maximum display width of your logo in pixels. Adjust to match your logo\'s proportions and the available header space.', 'volatyl' ),
	'input_attrs' => array(
		'min'  => 60,
		'max'  => 250,
		'step' => 5,
	),
) );

// Light logo (used whenever any dark background is active)
$wp_customize->add_setting( 'volatyl_light_logo', array(
	'default'           => 0,
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'volatyl_light_logo', array(
	'section'     => 'title_tagline',
	'priority'    => 9,
	'label'       => __( 'Light logo', 'volatyl' ),
	'description' => __( 'Upload a light version of your logo to display over any dark background section. If no light logo is uploaded, the standard logo will be used instead.', 'volatyl' ),
	'mime_type'   => 'image',
) ) );

// Dark header on archive and blog index pages
$wp_customize->add_setting( 'volatyl_archive_dark_header', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox',
) );
$wp_customize->add_control( 'volatyl_archive_dark_header', array(
	'section'     => 'volatyl_section_backgrounds',
	'priority'    => 70,
	'label'       => __( 'Dark header on archive pages', 'volatyl' ),
	'description' => __( 'Applies to category, tag, author, date, and blog index pages.', 'volatyl' ),
	'type'        => 'checkbox',
) );

// Dark header on search results
$wp_customize->add_setting( 'volatyl_search_dark_header', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox',
) );
$wp_customize->add_control( 'volatyl_search_dark_header', array(
	'section'  => 'volatyl_section_backgrounds',
	'priority' => 80,
	'label'    => __( 'Dark header on search results', 'volatyl' ),
	'type'     => 'checkbox',
) );

// Dark header on 404
$wp_customize->add_setting( 'volatyl_404_dark_header', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox',
) );
$wp_customize->add_control( 'volatyl_404_dark_header', array(
	'section'  => 'volatyl_section_backgrounds',
	'priority' => 90,
	'label'    => __( 'Dark header on 404 page', 'volatyl' ),
	'type'     => 'checkbox',
) );

/**
 * Color scheme
 */

// Color palette preview toggle
$wp_customize->add_setting( 'volatyl_palette_preview_toggle_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_palette_preview_toggle_area', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 5,
	'label'       => '',
	'description' => '<label class="volatyl-palette-toggle-label"><input type="checkbox" id="volatyl-palette-preview-toggle"> ' . __( 'Show color palette preview', 'volatyl' ) . '</label>',
) ) );

// Primary hue
$wp_customize->add_setting( 'volatyl_primary_hue_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_primary_hue_area', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 1,
	'label'       => __( 'Brand & action hue', 'volatyl' ),
	'description' => __( 'This is your brand color — it always drives your action colors (buttons, links, and primary UI elements). In multi-color schemes, accent colors (accent-1, accent-2, and accent-3) are derived from this hue using color theory relationships. <a href="https://en.wikipedia.org/wiki/Hue" target="_blank">Learn more about hue</a>.', 'volatyl' ),
) ) );

// Primary hue slider
$wp_customize->add_setting( 'volatyl_primary_hue', array(
	'default'           => DEFAULT_PRIMARY_HUE,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_primary_hue', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 10,
	'label'       => __( 'Brand hue', 'volatyl' ),
	'type'        => 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 360,
		'step' => 1,
	),
) );

// Hex-to-hue helper — UI only, not a real persisted setting
$wp_customize->add_setting( 'volatyl_hex_to_hue', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Hex_To_Hue_Control( $wp_customize, 'volatyl_hex_to_hue', array(
	'section'  => 'volatyl_color_scheme',
	'priority' => 11,
) ) );

// Palette vibrancy
$wp_customize->add_setting( 'volatyl_palette_vibrancy_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_palette_vibrancy_area', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 100,
	'label'       => __( 'Palette vibrancy', 'volatyl' ),
	'description' => __( 'Controls how vivid your brand colors are — buttons, links, headings, and the core color palette. At 0% palette colors are near-gray regardless of hue; at 100% they reach full vibrancy.', 'volatyl' ),
) ) );

// Palette vibrancy slider
$wp_customize->add_setting( 'volatyl_palette_vibrancy', array(
	'default'           => DEFAULT_PALETTE_VIBRANCY,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_palette_vibrancy', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 110,
	'label'       => __( 'Palette vibrancy', 'volatyl' ),
	'type'        => 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
) );

// Background & text tint
$wp_customize->add_setting( 'volatyl_background_tint_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_background_tint_area', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 120,
	'label'       => __( 'Background & text tint', 'volatyl' ),
	'description' => __( 'Controls how much of your selected hue bleeds into dark backgrounds and body text. This is intentionally a subtle effect — dark sections stay dark and readable even at high values. At 0%, backgrounds are neutral black and text is neutral dark gray.', 'volatyl' ),
) ) );

// Background & text tint slider
$wp_customize->add_setting( 'volatyl_background_tint', array(
	'default'           => DEFAULT_BACKGROUND_TINT,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_background_tint', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 130,
	'label'       => __( 'Background & text tint', 'volatyl' ),
	'type'        => 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
) );

// Dark section lightness
$wp_customize->add_setting( 'volatyl_dark_lightness_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_dark_lightness_area', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 140,
	'label'       => __( 'Dark section depth', 'volatyl' ),
	'description' => __( 'Controls how deep the dark background color appears on dark sections. Lower values are near-black; higher values reveal more of your chosen hue at a readable depth.', 'volatyl' ),
) ) );

$wp_customize->add_setting( 'volatyl_dark_lightness', array(
	'default'           => DEFAULT_DARK_LIGHTNESS,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_dark_lightness', array(
	'section'     => 'volatyl_color_scheme',
	'priority'    => 150,
	'label'       => __( 'Dark section depth', 'volatyl' ),
	'type'        => 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 45,
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
	'description' => sprintf( __( 'With your primary hue and color settings configured, %s will now use your chosen hue to craft <a href="https://en.wikipedia.org/wiki/Color_theory" target="_blank">color schemes</a> based on established color theory.', 'volatyl' ), THEME_NAME ),
) ) );

// Color scheme selector
$wp_customize->add_setting( 'volatyl_color_scheme_type', array(
	'default'           => DEFAULT_COLOR_SCHEME_TYPE,
	'sanitize_callback' => 'volatyl_sanitize_select',
) );
$wp_customize->add_control( 'volatyl_color_scheme_type', array(
	'section'  => 'volatyl_color_scheme',
	'priority' => 210,
	'label'    => __( 'Color scheme type', 'volatyl' ),
	'type'     => 'radio',
	'choices'  => array(
		'monochromatic' => __( 'Monochromatic', 'volatyl' ),
		'complementary' => __( 'Complementary', 'volatyl' ),
		'analogous'     => __( 'Analogous', 'volatyl' ),
		'triadic'             => __( 'Triadic', 'volatyl' ),
		'split_complementary' => __( 'Split-complementary', 'volatyl' ),
		'tetradic'            => __( 'Tetradic', 'volatyl' ),
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

// Header search icon
$wp_customize->add_setting( 'volatyl_header_search', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox',
) );
$wp_customize->add_control( 'volatyl_header_search', array(
	'section'  => 'volatyl_content_section',
	'priority' => 20,
	'label'    => __( 'Enable header search icon', 'volatyl' ),
	'type'     => 'checkbox',
) );

/**
 * Template - Front Page
 */

// Front page setup notice — shown only when latest posts is the front page
$wp_customize->add_setting( 'volatyl_front_page_setup_notice', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_setup_notice', array(
	'section'         => 'volatyl_front_page_template',
	'priority'        => 0,
	'label'           => __( 'Optional: Set a Static Front Page', 'volatyl' ),
	'description'     => __( 'Your site is showing latest posts on the front page. To unlock the Page Content Area — which lets you display WordPress editor content on your front page — assign a static page as your homepage in the <a href="#" class="volatyl-section-link" data-section="static_front_page">Homepage Settings</a> panel.', 'volatyl' ),
	'active_callback' => 'volatyl_show_on_front_is_posts',
) ) );

// Dark hero — shown only when latest posts is the front page (no page meta available)
$wp_customize->add_setting( 'volatyl_front_page_hero_dark', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_dark', array(
	'section'         => 'volatyl_front_page_template',
	'priority'        => 2,
	'label'           => __( 'Use dark hero background', 'volatyl' ),
	'type'            => 'checkbox',
	'active_callback' => 'volatyl_show_on_front_is_posts',
) );

// Hero settings
$wp_customize->add_setting( 'volatyl_front_page_hero_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_hero_settings', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 1,
	'label'       => __( 'Hero Area', 'volatyl' ),
	'description' => '',
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

// Hero eyebrow
$wp_customize->add_setting( 'volatyl_front_page_hero_eyebrow', array(
	'default'           => NULL,
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_front_page_hero_eyebrow', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 30,
	'label'       => __( 'Eyebrow', 'volatyl' ),
	'description' => __( 'Small label displayed above the hero title.', 'volatyl' ),
) ) );

// Hero custom title
$wp_customize->add_setting( 'volatyl_front_page_hero_use_custom_title', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_front_page_hero_use_custom_title', array(
	'section'  => 'volatyl_front_page_template',
	'priority' => 35,
	'label'    => __( 'Use custom title instead of tagline', 'volatyl' ),
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
	'description' => __( 'Overrides the site tagline as the hero title. Does not affect the actual WordPress tagline setting.', 'volatyl' ),
	'active_callback' => 'volatyl_display_front_page_hero_title_settings'
) ) );

// Hero description
$wp_customize->add_setting( 'volatyl_front_page_hero_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_front_page_hero_description', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 50,
	'label'       => __( 'Description', 'volatyl' ),
	'description' => sprintf( __( 'Displays below the hero title. 1–2 sentences. Allowed HTML: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
) ) );

// Hero primary CTA button text
$wp_customize->add_setting( 'volatyl_front_page_hero_primary_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_front_page_hero_primary_cta_button_text', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 60,
	'label'       => __( 'Primary call-to-action text', 'volatyl' ),
) ) );

// Hero primary CTA button URL
$wp_customize->add_setting( 'volatyl_front_page_hero_primary_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_front_page_hero_primary_cta_button_url', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 70,
	'label'       => __( 'Primary call-to-action URL', 'volatyl' ),
) ) );

$wp_customize->add_setting( 'volatyl_front_page_hero_primary_cta_button_new_tab', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_primary_cta_button_new_tab', array(
	'section'  => 'volatyl_front_page_template',
	'priority' => 75,
	'label'    => __( 'Open in new tab', 'volatyl' ),
	'type'     => 'checkbox',
) );

// Hero secondary CTA button text
$wp_customize->add_setting( 'volatyl_front_page_hero_secondary_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_front_page_hero_secondary_cta_button_text', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 80,
	'label'       => __( 'Secondary call-to-action text', 'volatyl' ),
) ) );

// Hero secondary CTA button URL
$wp_customize->add_setting( 'volatyl_front_page_hero_secondary_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_front_page_hero_secondary_cta_button_url', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 90,
	'label'       => __( 'Secondary call-to-action URL', 'volatyl' ),
) ) );

$wp_customize->add_setting( 'volatyl_front_page_hero_secondary_cta_button_new_tab', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_secondary_cta_button_new_tab', array(
	'section'  => 'volatyl_front_page_template',
	'priority' => 91,
	'label'    => __( 'Open in new tab', 'volatyl' ),
	'type'     => 'checkbox',
) );

// Hero featured image style
$wp_customize->add_setting( 'volatyl_front_page_hero_image_style', array(
	'default'           => 'flush',
	'sanitize_callback' => 'volatyl_sanitize_select',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_image_style', array(
	'section'         => 'volatyl_front_page_template',
	'priority'        => 92,
	'label'           => __( 'Featured image display', 'volatyl' ),
	'description'     => __( 'When a featured image is set on the front page, controls how it anchors to the bottom of the hero. Has no effect if no featured image is set.', 'volatyl' ),
	'type'            => 'select',
	'choices'         => array(
		'flush'  => __( 'Flush — image sits at the bottom edge of the hero', 'volatyl' ),
		'padded' => __( 'Padded — image displays with standard section spacing below it', 'volatyl' ),
		'bleed'  => __( 'Bleed — image overlaps slightly into the next section', 'volatyl' ),
	),
	'active_callback' => 'volatyl_show_on_front_is_page',
) );

// Page content area
$wp_customize->add_setting( 'volatyl_front_page_content_area', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_content_area', array(
	'section'         => 'volatyl_front_page_template',
	'priority'        => 95,
	'label'           => __( 'Page Content Area', 'volatyl' ),
	'description'     => '',
	'active_callback' => 'volatyl_show_on_front_is_page',
) ) );

// Display post_content
$wp_customize->add_setting( 'volatyl_front_page_display_post_content', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_front_page_display_post_content', array(
	'section'         => 'volatyl_front_page_template',
	'priority'        => 96,
	'label'           => __( 'Display page editor content below hero', 'volatyl' ),
	'type'            => 'checkbox',
	'active_callback' => 'volatyl_show_on_front_is_page',
) );

// Full-width post_content
$wp_customize->add_setting( 'volatyl_front_page_full_width_content', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_front_page_full_width_content', array(
	'section'  => 'volatyl_front_page_template',
	'priority' => 97,
	'label'    => __( 'Allow full-width content', 'volatyl' ),
	'description' => __( 'Removes the default content wrapper, allowing Group blocks to each define their own full-width sections.', 'volatyl' ),
	'type'     => 'checkbox',
	'active_callback' => 'volatyl_display_front_page_post_content_settings',
) );

// Blog settings area
$wp_customize->add_setting( 'volatyl_front_page_blog_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_front_page_blog_settings', array(
	'section'     => 'volatyl_front_page_template',
	'priority'    => 101,
	'label'       => __( 'Blog Posts Area', 'volatyl' ),
	'description' => '',
) ) );

// Blog posts grid display
$wp_customize->add_setting( 'volatyl_front_page_blog_posts_grid_columns_rows', array(
	'default'           => '3_1',
	'sanitize_callback' => 'volatyl_sanitize_select',
) );
$wp_customize->add_control( 'volatyl_front_page_blog_posts_grid_columns_rows', array(
	'section'  => 'volatyl_front_page_template',
	'priority' => 110,
	'label'    => __( 'Blog posts layout', 'volatyl' ),
	'type'     => 'select',
	'choices'  => array(
		'2_1'  => __( '2 columns, 1 row (2 posts)', 'volatyl' ),
		'2_2'  => __( '2 columns, 2 rows (4 posts)', 'volatyl' ),
		'2_3'  => __( '2 columns, 3 rows (6 posts)', 'volatyl' ),
		'3_1'  => __( '3 columns, 1 row (3 posts)', 'volatyl' ),
		'3_2'  => __( '3 columns, 2 rows (6 posts)', 'volatyl' ),
		'3_3'  => __( '3 columns, 3 rows (9 posts)', 'volatyl' ),
		'none' => __( 'Hidden', 'volatyl' ),
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
	'description' => '',
) ) );

// Featured Page select
$wp_customize->add_setting( 'volatyl_front_page_featured_page_select', array(
	'default'           => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_front_page_featured_page_select', array(
	'section'        => 'volatyl_front_page_template',
	'priority'       => 210,
	'label'          => __( 'Featured page', 'volatyl' ),
	'description'    => __( 'Displays the title and content of the selected page. Add an excerpt to the page to show a description below the title.', 'volatyl' ),
	'type'           => 'dropdown-pages',
	'allow_addition' => true,
) );

/**
 * Template - Blog
 */

// Blog setup notice — shown when no dedicated blog posts page is configured
$wp_customize->add_setting( 'volatyl_blog_setup_notice', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_blog_setup_notice', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 0,
	'label'           => __( 'Blog Page Not Configured', 'volatyl' ),
	'description'     => __( 'These settings apply to a dedicated blog posts page. To activate the blog template, assign a static homepage and a separate Posts page in the <a href="#" class="volatyl-section-link" data-section="static_front_page">Homepage Settings</a> panel.', 'volatyl' ),
	'active_callback' => 'volatyl_no_dedicated_blog_page',
) ) );

// Blog header
$wp_customize->add_setting( 'volatyl_blog_header_settings', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_blog_header_settings', array(
	'section'     => 'volatyl_blog_template',
	'priority'    => 1,
	'label'       => __( 'Header Area', 'volatyl' ),
	'description' => '',
) ) );

// Blog eyebrow
$wp_customize->add_setting( 'volatyl_blog_eyebrow', array(
	'default'           => NULL,
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_blog_eyebrow', array(
	'section'     => 'volatyl_blog_template',
	'priority'    => 5,
	'label'       => __( 'Eyebrow', 'volatyl' ),
	'description' => __( 'Small label displayed above the blog title.', 'volatyl' ),
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
	'description' => __( 'Overrides the page title. Does not affect the page slug or actual title.', 'volatyl' ),
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
	'description' => sprintf( __( 'Displays below the blog title. 2–3 sentences. Allowed HTML: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
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
	'description' => '',
) ) );

// Posts per page (linked to core setting)
$wp_customize->add_setting( 'volatyl_blog_posts_grid_columns_rows', array(
	'default'           => '3_3',
	'sanitize_callback' => 'volatyl_sanitize_select',
) );
$wp_customize->add_control( 'volatyl_blog_posts_grid_columns_rows', array(
	'section'  => 'volatyl_blog_template',
	'priority' => 110,
	'label'    => __( 'Posts per page', 'volatyl' ),
	'type'     => 'select',
	'choices'  => array(
		'default' => __( 'Default (Settings → Reading)', 'volatyl' ),
		'2_1'     => __( '2 columns, 1 row (2 posts)', 'volatyl' ),
		'2_2'     => __( '2 columns, 2 rows (4 posts)', 'volatyl' ),
		'2_3'     => __( '2 columns, 3 rows (6 posts)', 'volatyl' ),
		'2_4'     => __( '2 columns, 4 rows (8 posts)', 'volatyl' ),
		'2_5'     => __( '2 columns, 5 rows (10 posts)', 'volatyl' ),
		'3_1'     => __( '3 columns, 1 row (3 posts)', 'volatyl' ),
		'3_2'     => __( '3 columns, 2 rows (6 posts)', 'volatyl' ),
		'3_3'     => __( '3 columns, 3 rows (9 posts)', 'volatyl' ),
		'3_4'     => __( '3 columns, 4 rows (12 posts)', 'volatyl' ),
		'3_5'     => __( '3 columns, 5 rows (15 posts)', 'volatyl' ),
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
	'description' => '',
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
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_blog_grid_cta_title', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 230,
	'label'           => __( 'Title', 'volatyl' ),
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) ) );

// Blog grid CTA description
$wp_customize->add_setting( 'volatyl_blog_grid_cta_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_blog_grid_cta_description', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 240,
	'label'           => __( 'Description', 'volatyl' ),
	'description'     => sprintf( __( '1–2 sentences. Allowed HTML: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) ) );

// Blog grid CTA button text
$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_blog_grid_cta_button_text', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 250,
	'label'           => __( 'Call-to-action button text', 'volatyl' ),
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) ) );

// Blog grid CTA button URL
$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_blog_grid_cta_button_url', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 260,
	'label'           => __( 'Call-to-action button URL', 'volatyl' ),
	'active_callback' => 'volatyl_display_blog_grid_cta_settings',
) ) );

$wp_customize->add_setting( 'volatyl_blog_grid_cta_button_new_tab', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_blog_grid_cta_button_new_tab', array(
	'section'         => 'volatyl_blog_template',
	'priority'        => 265,
	'label'           => __( 'Open in new tab', 'volatyl' ),
	'type'            => 'checkbox',
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
	'description' => __( 'A site-wide call-to-action area that displays above the Fat Footer and Site Footer on all pages.', 'volatyl' ),
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
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_footer_lead_title', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 20,
	'label'           => __( 'Title', 'volatyl' ),
	'active_callback' => 'volatyl_display_footer_lead_settings',
) ) );

// Footer Lead description
$wp_customize->add_setting( 'volatyl_footer_lead_description', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_textarea_lite',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Textarea_Control( $wp_customize, 'volatyl_footer_lead_description', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 30,
	'label'           => __( 'Description', 'volatyl' ),
	'description'     => sprintf( __( '1–2 sentences. Allowed HTML: %s', 'volatyl' ), '<a>, <span>, <em>, <strong>' ),
	'active_callback' => 'volatyl_display_footer_lead_settings',
) ) );

// Footer Lead CTA button text
$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_text', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_footer_lead_cta_button_text', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 40,
	'label'           => __( 'Call-to-action button text', 'volatyl' ),
	'active_callback' => 'volatyl_display_footer_lead_settings',
) ) );

// Footer Lead CTA button URL
$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_url', array(
	'default'           => NULL,
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new Volatyl_WP_Customize_Text_Control( $wp_customize, 'volatyl_footer_lead_cta_button_url', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 50,
	'label'           => __( 'Call-to-action button URL', 'volatyl' ),
	'active_callback' => 'volatyl_display_footer_lead_settings',
) ) );

$wp_customize->add_setting( 'volatyl_footer_lead_cta_button_new_tab', array(
	'default'           => 0,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( 'volatyl_footer_lead_cta_button_new_tab', array(
	'section'         => 'volatyl_footer_areas',
	'priority'        => 55,
	'label'           => __( 'Open in new tab', 'volatyl' ),
	'type'            => 'checkbox',
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

// Footer backgrounds heading
$wp_customize->add_setting( 'volatyl_footer_backgrounds_heading', array(
	'sanitize_callback' => 'volatyl_sanitize_arbitrary_html',
) );
$wp_customize->add_control( new Volatyl_Customizer_HTML( $wp_customize, 'volatyl_footer_backgrounds_heading', array(
	'section'     => 'volatyl_footer_areas',
	'priority'    => 200,
	'label'       => __( 'Footer Backgrounds', 'volatyl' ),
	'description' => '',
) ) );

// Dark footer lead
$wp_customize->add_setting( 'volatyl_footer_lead_color_scheme', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_footer_lead_color_scheme', array(
	'section'  => 'volatyl_footer_areas',
	'priority' => 210,
	'label'    => __( 'Dark Footer Lead background', 'volatyl' ),
	'type'     => 'checkbox',
) );

// Dark general footer (Fat Footer, Social Navigation, Copyright)
$wp_customize->add_setting( 'volatyl_footer_general_color_scheme', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_footer_general_color_scheme', array(
	'section'  => 'volatyl_footer_areas',
	'priority' => 220,
	'label'    => __( 'Dark footer background', 'volatyl' ),
	'type'     => 'checkbox',
) );