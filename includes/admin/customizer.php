<?php
/**
 * Theme Customizer settings
 */
function volatyl_customize_register( $wp_customize ) {

	/** ===============
	 * Allow arbitrary HTML controls
	 */
	class Volatyl_Customizer_HTML extends WP_Customize_Control {

		public $content = '';

		public function render_content() {
			if ( isset( $this->label ) ) {
				echo '<hr><h3 class="settings-heading">' . $this->label . '</h3>';
			}
			if ( isset( $this->description ) ) {
				echo '<div class="description customize-control-description settings-description">' . $this->description . '</div>';
			}
		}
	}


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
		'description' => __( 'Control your site HTML structure. When enabled, the HTML element that wraps all major site sections will span the full width of the viewport. This means section background colors will display across the screen while the content itself is contained. When disabled, commonly referred to as page-width display, the content itself is still contained but the wrapping element also has horizontal limits. This layout exposes the HTML body element as the wrapper of all content, which allows the body to have a separate background color, creating distinction between the page structure and the site background.', 'volatyl' ),
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
		'title'       => __( 'Content', 'volatyl' ),
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
	 * Footer Options
	 */
	$wp_customize->add_section( 'volatyl_footer_section', array(
		'title'       => __( 'Footer', 'volatyl' ),
		'description' => __( 'Control various footer elements, including the fat footer.', 'volatyl' ),
		'panel'       => 'volatyl_settings',
		'priority'    => 30,
	) );

	// Display alternate fat footer layout
	$wp_customize->add_setting( 'volatyl_fat_footer_layout', array(
		'default'           => 0,
		'sanitize_callback' => 'volatyl_sanitize_checkbox'
	) );
	$wp_customize->add_control( 'volatyl_fat_footer_layout', array(
		'label'       => __( 'Display alternate fate footer layout', 'volatyl' ),
		'description' => __( 'Only when three fat footer areas are in use, make the first fat footer area twice as wide as the remaining fat footer areas. 2 : 1 : 1', 'volatyl' ),
		'section'     => 'volatyl_footer_section',
		'priority'    => 10,
		'type'        => 'checkbox',
	) );

	/** ===============
	 * Site Identity
	 */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'volatyl_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.front-page .hero-title',
			'render_callback' => 'volatyl_customize_partial_blogdescription',
		) );
	}
}

add_action( 'customize_register', 'volatyl_customize_register' );

/**
 * Sanitize checkbox options
 */
function volatyl_sanitize_checkbox( $input ) {
	return 1 == $input ? 1 : 0;
}

/**
 * Placeholder sanitization callback for custom HTML that has no actual settings
 */
function volatyl_sanitize_arbitrary_html() {
	// nothing to see here
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
			margin: 8px 0 0;
		}

		#customize-controls #customize-theme-controls .customize-section-description {
			margin-top: 10px;
		}

		textarea, input, select,
		.customize-description {
			font-size: 12px !important;
		}

		.customize-control-title {
			font-size: 13px !important;
			margin: 5px 0 3px !important;
		}

		.customize-control label {
			font-size: 12px !important;
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
<?php }

add_action( 'customize_controls_print_styles', 'volatyl_customizer_styles' );
