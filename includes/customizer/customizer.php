<?php

/**
 * Theme Customizer settings
 */
function volatyl_customize_register( $wp_customize ) {

	// Adjust Customizer markup
	include 'extend-class.php';

	// Add Customizer Panels
	include 'panels.php';

	// Add Customizer Sections
	include 'sections.php';

	// Add Customizer Settings & Controls
	include 'settings-controls.php';

	// Improve preview panel experience
	include 'selective-refresh.php';
}
add_action( 'customize_register', 'volatyl_customize_register' );

/**
 * Sanitize Customizer controls
 */
include 'sanitize.php';

/**
 * Conditionally display Blog Grid CTA options
 */
function volatyl_display_blog_grid_cta_settings( $control ) {
	if ( $control->manager->get_setting( 'volatyl_blog_grid_cta' )->value() === 1 ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Conditionally display Footer Lead options
 */
function volatyl_display_footer_lead_settings( $control ) {
	if ( $control->manager->get_setting( 'volatyl_footer_lead' )->value() === 1 ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Conditionally display Fat Footer options
 */
function volatyl_display_fat_footer_settings( $control ) {
	if ( $control->manager->get_setting( 'volatyl_fat_footer' )->value() === 1 ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Custom JS for Customizer controls
 */
function volatyl_customize_controls_enqueue_scripts() {
	wp_enqueue_script( 'volatyl_custom_customizer', get_template_directory_uri() . '/assets/js/custom-customizer.js', array( 'jquery', 'customize-controls' ), THEME_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'volatyl_customize_controls_enqueue_scripts' );

/**
 * Bind JS handlers for Customizer controls
 */
function volatyl_customize_preview_init() {
	wp_enqueue_script( 'volatyl-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'volatyl_customize_preview_init' );

/**
 * Add Customizer styles to <head> only on Customizer page
 */
function volatyl_customize_controls_print_styles() { ?>
	<style type="text/css">
		hr {
			margin-top: 15px;
		}
		.settings-heading {
			margin-bottom: 0;
		}
		.settings-description {
			margin-top: 6px;
		}
		.customize-control-checkbox {
			margin-bottom: 0;
		}
		#customize-controls #customize-theme-controls .description {
			display: block;
			color: #666;
			font-style: italic;
			margin: 8px 0;
		}
		#customize-controls #customize-theme-controls .customize-section-description {
			margin-top: 10px;
		}
		.customize-control-title {
			margin: 8px 0 !important;
		}
		.customize-control label {
		}
		.customize-control {
			margin-bottom: 10px;
		}
		.volatyl-toggle-wrap {
			display: inline-block;
			line-height: 1;
			margin-left: 2px;
		}
		.volatyl-toggle-wrap a {
			display: block;
			background: #888;
			color: #fff;
			padding: 2px 6px;
			border-radius: 3px;
			margin-left: 3px;
			text-decoration: none;
		}
		.volatyl-toggle-wrap a:hover,
		.volatyl-toggle-wrap .volatyl-description-opened {
			background: #444;
			color: #fff;
		}
		.control-description {
			color: #666;
			font-style: italic;
			margin-bottom: 6px;
		}
		.volatyl-control-description {
			display: none;
		}
		.customize-control-text + .customize-control-checkbox,
		.customize-control-customtext + .customize-control-checkbox,
		.customize-control-image + .customize-control-checkbox {
			margin-top: 12px;
		}
		.customize-control-number input[type="number"] {
			width: 100px;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'volatyl_customize_controls_print_styles' );

/**
 * Add color scheme CSS variables to front-end <head>
 */
function volatyl_customizer_head_styles() {

	// This hue controls the entire color scheme
	$primary_hue = get_theme_mod( 'volatyl_primary_hue', 255 );

	// This percentage controls the default saturation of all non-subdued colors
	$global_hue_saturtion = get_theme_mod( 'volatyl_primary_hue_saturation', 43 );

	// Based on global hue saturation percentage, this color sets the
	// luminance of basic text and similar elements against dark backgrounds
	$dark_bg_light_color  = '100';
	if ( $global_hue_saturtion <= 33 ) {
		$dark_bg_light_color = '84';
	} elseif ( ( $global_hue_saturtion >= 34 ) && ( $global_hue_saturtion <= 67 ) ) {
		$dark_bg_light_color = '92';
	}
	?>
	<style>:root{--primary-hue:<?php echo $primary_hue; ?>;--global-hue-saturation:<?php echo $global_hue_saturtion; ?>%;--dark-background-light-color-luminance:<?php echo $dark_bg_light_color; ?>%}</style>
	<?php
}
add_action( 'wp_head', 'volatyl_customizer_head_styles' );