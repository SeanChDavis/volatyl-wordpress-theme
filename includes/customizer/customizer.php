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
			font-size: 13px !important;
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
		#customize-control-volatyl_empty_cart_downloads_count input {
			width: 50px;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'volatyl_customize_controls_print_styles' );
