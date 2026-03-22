<?php

/**
 * Color Scheme
 */
$wp_customize->add_section( 'volatyl_color_scheme', array(
	'title'       => __( 'Color Scheme', 'volatyl' ),
	'description' => __( 'Set your brand hue, color vibrancy, and multi-color scheme type.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 20,
) );

/**
 * Design
 */
$wp_customize->add_section( 'volatyl_section_backgrounds', array(
	'title'       => __( 'Design', 'volatyl' ),
	'description' => __( 'Configure corner shapes, full-width layout, and dark backgrounds for archive, search, and 404 pages. For individual page backgrounds, use the Page Layout option in the editor sidebar.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 25,
) );

/**
 * Content
 */
$wp_customize->add_section( 'volatyl_content_section', array(
	'title'       => __( 'Content', 'volatyl' ),
	'description' => __( 'Configure content display options.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 30,
) );

/**
 * Front Page
 */
$wp_customize->add_section( 'volatyl_front_page_template', array(
	'title'       => __( 'Front Page', 'volatyl' ),
	'description' => __( 'Configure the front page hero, content area, and blog grid.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 40,
) );

/**
 * Blog
 */
$wp_customize->add_section( 'volatyl_blog_template', array(
	'title'       => __( 'Blog', 'volatyl' ),
	'description' => __( 'Configure the blog page header, posts grid, and call-to-action.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 50,
) );

/**
 * Footer Areas
 */
$wp_customize->add_section( 'volatyl_footer_areas', array(
	'title'       => __( 'Footer Areas', 'volatyl' ),
	'description' => __( 'Configure footer lead, fat footer, and footer background settings.', 'volatyl' ),
	'panel'       => 'volatyl_settings',
	'priority'    => 60,
) );
