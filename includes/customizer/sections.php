<?php

/**
 * HTML Structure
 */
$wp_customize->add_section( 'volatyl_structure', array(
	'title'       => __( 'HTML Structure', 'volatyl' ),
	'description' => __( 'Control your site HTML structure.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 10,
) );

/**
 * Color Scheme
 */
$wp_customize->add_section( 'volatyl_color_scheme', array(
	'title'       => __( 'Color Scheme', 'volatyl' ),
	'description' => __( 'Configure your site color scheme.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 20,
) );

/**
 * Content Configuration
 */
$wp_customize->add_section( 'volatyl_content_section', array(
	'title'       => __( 'Content Configuration', 'volatyl' ),
	'description' => __( 'Adjust the display of content on your website.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 30,
) );

/**
 * Template - Front Page
 */
$wp_customize->add_section( 'volatyl_front_page_template', array(
	'title'       => __( 'Template - Front Page', 'volatyl' ),
	'description' => __( 'Configure the Front Page template settings.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 40,
) );

/**
 * Template - Blog
 */
$wp_customize->add_section( 'volatyl_blog_template', array(
	'title'       => __( 'Template - Blog', 'volatyl' ),
	'description' => __( 'Configure the Blog template settings.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 50,
) );

/**
 * Footer Areas
 */
$wp_customize->add_section( 'volatyl_footer_areas', array(
	'title'       => __( 'Footer Areas', 'volatyl' ),
	'description' => __( 'Configure the footer areas.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 60,
) );