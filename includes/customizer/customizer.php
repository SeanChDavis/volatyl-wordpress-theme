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
 * Conditionally display Front Page Hero Title options
 */
function volatyl_display_front_page_hero_title_settings( $control ) {
	if ( $control->manager->get_setting( 'volatyl_front_page_hero_use_custom_title' )->value() === 1 ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Returns true only when WordPress is configured to use a static front page.
 */
function volatyl_show_on_front_is_page(): bool {
	return 'page' === get_option( 'show_on_front' );
}

/**
 * Returns true when the front page is set to show latest posts (no static front page).
 */
function volatyl_show_on_front_is_posts(): bool {
	return 'posts' === get_option( 'show_on_front' );
}

/**
 * Returns true when no dedicated blog posts page is configured.
 * This covers both the "latest posts as front page" case and
 * the "static front page but no posts page assigned" case.
 */
function volatyl_no_dedicated_blog_page(): bool {
	return ! ( volatyl_show_on_front_is_page() && get_option( 'page_for_posts' ) > 0 );
}

/**
 * Conditionally display Front Page post_content options.
 * Requires both a static front page AND the display toggle to be enabled.
 */
function volatyl_display_front_page_post_content_settings( $control ): bool {
	if ( ! volatyl_show_on_front_is_page() ) {
		return false;
	}
	return (bool) $control->manager->get_setting( 'volatyl_front_page_display_post_content' )->value();
}

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
	wp_enqueue_script( 'volatyl_custom_customizer', get_template_directory_uri() . '/assets/js/custom-customizer.js', array( 'jquery', 'customize-controls' ), filemtime( get_template_directory() . '/assets/js/custom-customizer.js' ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'volatyl_customize_controls_enqueue_scripts' );

/**
 * Bind JS handlers for Customizer controls
 */
function volatyl_customize_preview_init() {
	wp_enqueue_script( 'volatyl-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), filemtime( get_template_directory() . '/assets/js/customizer.js' ), true );
}
add_action( 'customize_preview_init', 'volatyl_customize_preview_init' );

/**
 * Add Customizer styles to <head> only on the Customizer page
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
		.volatyl-palette-toggle-label {
			display: flex;
			align-items: center;
			gap: 7px;
			cursor: pointer;
			font-size: 12px;
			color: #444;
		}
		#customize-control-volatyl_primary_hue input[type="range"] {
			-webkit-appearance: none;
			appearance: none;
			width: 100%;
			height: 28px;
			border-radius: 4px;
			background: linear-gradient(to right,
				oklch(65% 0.2 0),
				oklch(65% 0.2 30),
				oklch(65% 0.2 60),
				oklch(65% 0.2 90),
				oklch(65% 0.2 120),
				oklch(65% 0.2 150),
				oklch(65% 0.2 180),
				oklch(65% 0.2 210),
				oklch(65% 0.2 240),
				oklch(65% 0.2 270),
				oklch(65% 0.2 300),
				oklch(65% 0.2 330),
				oklch(65% 0.2 360)
			);
			cursor: pointer;
			outline: none;
			border: 1px solid rgba(0,0,0,.15);
		}
		#customize-control-volatyl_primary_hue input[type="range"]::-webkit-slider-thumb {
			-webkit-appearance: none;
			width: 12px;
			height: 32px;
			border-radius: 3px;
			background: transparent;
			border: 2px solid rgba(255,255,255,1);
			box-shadow: 0 1px 3px rgba(0,0,0,.3);
			cursor: pointer;
		}
		#customize-control-volatyl_primary_hue input[type="range"]::-moz-range-thumb {
			width: 12px;
			height: 32px;
			border-radius: 3px;
			background: transparent;
			border: 2px solid rgba(255,255,255,1);
			box-shadow: 0 1px 3px rgba(0,0,0,.3);
			cursor: pointer;
		}
		/* Hex-to-hue helper */
		.volatyl-hex-to-hue {
			margin-top: 4px;
		}
		.volatyl-hex-input-row {
			display: flex;
			align-items: center;
			gap: 8px;
			margin-bottom: 10px;
		}
		.volatyl-hex-swatch {
			flex-shrink: 0;
			width: 32px;
			height: 32px;
			border-radius: 4px;
			background: #e0e0e0;
			border: 1px solid rgba(0,0,0,.15);
		}
		.volatyl-hex-input {
			flex: 1 1 auto;
			font-family: monospace;
			font-size: 12px;
			height: 32px;
			padding: 0 8px;
			border: 1px solid #ddd;
			border-radius: 4px;
			box-sizing: border-box;
		}
		.volatyl-hex-input.is-valid {
			border-color: #46b450;
		}
		.volatyl-hex-input.is-invalid {
			border-color: #d63638;
		}
		.volatyl-hex-apply {
			display: block;
			width: 100%;
			text-align: center;
		}
		.volatyl-hex-warning {
			display: none;
			color: #d63638;
			font-size: 11px;
			font-style: italic;
			margin: 6px 0 0;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'volatyl_customize_controls_print_styles' );

/**
 * Add color scheme CSS variables to front-end <head> as a single <style> block.
 * Only the active scheme's overrides are output — no wasted CSS for inactive schemes.
 */
function volatyl_customizer_head_styles() {
	$scheme     = get_theme_mod( 'volatyl_color_scheme_type', DEFAULT_COLOR_SCHEME_TYPE );
	$logo_width = absint( get_theme_mod( 'volatyl_logo_width', DEFAULT_LOGO_WIDTH ) );
	$css        = volatyl_root_color_scheme_base() . volatyl_get_scheme_overrides( $scheme );
	$css       .= ":root { --v-logo-width: {$logo_width}px; }";
	echo '<style>' . $css . '</style>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_head', 'volatyl_customizer_head_styles' );