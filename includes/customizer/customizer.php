<?php
/**
 * Theme Customizer settings
 */
function volatyl_customize_register( $wp_customize ) {

	// Make adjustments to the Customizer UI
	include 'extend-class.php';

	// Add custom theme settings
	include 'custom-theme-settings.php';

	// Add custom theme settings
	include 'selective-refresh.php';
}
add_action( 'customize_register', 'volatyl_customize_register' );

/**
 * Sanitize checkbox options
 */
function volatyl_sanitize_checkbox( $input ) {
	return 1 == $input ? 1 : 0;
}

/** ===============
 * Sanitize integer input
 */
function volatyl_sanitize_integer( $input ) {
	return absint( $input );
}

/**
 * Placeholder sanitization callback for custom HTML that has no actual settings
 */
function volatyl_sanitize_arbitrary_html() {
	// nothing to see here
}

/**
 * Sanitize text input
 */
function volatyl_sanitize_text( $input ) {
	return strip_tags( stripslashes( $input ) );
}

/**
 * Sanitize select menus
 */
function volatyl_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function volatyl_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function volatyl_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes
 * asynchronously.
 */
function volatyl_customize_preview_js() {
	wp_enqueue_script( 'volatyl-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), THEME_VERSION, true );
}

add_action( 'customize_preview_init', 'volatyl_customize_preview_js' );

/**
 * Add Customizer UI styles to the <head> only on Customizer page
 */
function volatyl_customizer_styles() { ?>
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
			margin: 5px 0 3px !important;
		}

		.customize-control label {
			font-weight: 600;
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
			background: rgba(0, 0, 0, .2);
			color: #fff;
			padding: 2px 6px;
			border-radius: 3px;
			margin-left: 6px;
		}

		.volatyl-toggle-wrap a:hover,
		.volatyl-toggle-wrap .volatyl-description-opened {
			background: #555;
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

add_action( 'customize_controls_print_styles', 'volatyl_customizer_styles' );
