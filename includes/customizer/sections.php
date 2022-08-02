<?php

/**
 * HTML Structure
 */
$wp_customize->add_section( 'volatyl_structure', array(
	'title'       => __( 'HTML Structure', 'volatyl' ),
	'description' => __( 'Control your site HTML structure. When enabled, the HTML element that wraps all major site sections will span the full width of the viewport. This means section background colors will display across the screen while the content itself is contained. When disabled, commonly referred to as page-width display, the content itself is still contained but the wrapping element also has horizontal limits. This layout exposes the HTML body element as the wrapper of all content, which allows the body to have a separate background color, creating distinction between the page structure and the site background. The difference isn\'t noticeable unless the device viewport is wide enough to display the page structure.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 10,
) );

/**
 * Content Configuration
 */
$wp_customize->add_section( 'volatyl_content_section', array(
	'title'       => __( 'Content Configuration', 'volatyl' ),
	'description' => __( 'Adjust the display of content on your website.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 20,
) );

/**
 * Template - Front Page
 */
$wp_customize->add_section( 'volatyl_front_page_template', array(
	'title'       => __( 'Template - Front Page', 'volatyl' ),
	'description' => __( 'Configure the Front Page settings.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 30,
) );