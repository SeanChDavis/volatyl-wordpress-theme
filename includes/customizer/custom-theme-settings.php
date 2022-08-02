<?php

/** ===============
 * Volatyl Settings
 */
$wp_customize->add_panel( 'volatyl_settings', array(
	'title'       => sprintf( __( '%s Settings', 'volatyl' ), THEME_NAME ),
	'description' => sprintf( __( 'Thank you for choosing %s. 🎉 All theme customization settings are below. Enjoy.', 'volatyl' ), THEME_NAME ),
	'priority'    => 10,
) );

/** ===============
 * Structure Options
 */
$wp_customize->add_section( 'volatyl_structure', array(
	'title'       => __( 'HTML Structure', 'volatyl' ),
	'description' => __( 'Control your site HTML structure. When enabled, the HTML element that wraps all major site sections will span the full width of the viewport. This means section background colors will display across the screen while the content itself is contained. When disabled, commonly referred to as page-width display, the content itself is still contained but the wrapping element also has horizontal limits. This layout exposes the HTML body element as the wrapper of all content, which allows the body to have a separate background color, creating distinction between the page structure and the site background. The difference isn\'t noticeable unless the device viewport is wide enough to display the page structure.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 10,
) );

// full-width HTML structure
$wp_customize->add_setting( 'volatyl_full_width_structure', array(
	'default'           => 0,
	'sanitize_callback' => 'volatyl_sanitize_checkbox'
) );
$wp_customize->add_control( 'volatyl_full_width_structure', array(
	'label'    => __( 'Enable full-width HTML structure', 'volatyl' ),
	'section'  => 'volatyl_structure',
	'priority' => 10,
	'type'     => 'checkbox',
) );

/** ===============
 * Content Options
 */
$wp_customize->add_section( 'volatyl_content_section', array(
	'title'       => __( 'Content Configuration', 'volatyl' ),
	'description' => __( 'Adjust the display of content on your website.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 20,
) );

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
	'label'    => __( 'Enable Comments on Standard Pages', 'volatyl' ),
	'section'  => 'volatyl_content_section',
	'priority' => 20,
	'type'     => 'checkbox',
) );

/** ===============
 * Front Page Template
 */
$wp_customize->add_section( 'volatyl_front_page_template', array(
	'title'       => __( 'Template - Front Page', 'volatyl' ),
	'description' => __( 'Configure the Front Page settings.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 30,
) );

// Hero Title
$wp_customize->add_setting( 'volatyl_front_page_hero_title', array(
	'default'           => NULL,
	'sanitize_callback' => 'volatyl_sanitize_text',
) );
$wp_customize->add_control( 'volatyl_front_page_hero_title', array(
	'label'       => __( 'Hero Title Text', 'volatyl' ),
	'section'     => 'volatyl_front_page_template',
	'description' => __( 'By default, your WordPress site tagline is used as the front page hero title. To override that behavior, you may adjust the text here. This text <strong>will not</strong> change your WordPress site tagline.', 'volatyl' ),
	'priority'    => 10,
) );

// Blog area post count
$wp_customize->add_setting( 'volatyl_front_page_blog_post_count', array(
	'default'           => 'nine',
	'sanitize_callback' => 'volatyl_sanitize_select',
) );
$wp_customize->add_control( 'volatyl_front_page_blog_post_count', array(
	'label'    => __( 'How many blog posts should display in the blog section?', 'volatyl' ),
	'section'  => 'volatyl_front_page_template',
	'priority' => 20,
	'type'     => 'select',
	'choices'  => array(
		'3'  => 3,
		'6'  => 6,
		'9'  => 9,
		'12' => 12,
		'15' => 15,
	),
) );