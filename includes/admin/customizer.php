<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
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


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'volatyl_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.front-page .hero-title',
				'render_callback' => 'volatyl_customize_partial_blogdescription',
			)
		);
	}


	/** ===============
	 * Design Options
	 */
	$wp_customize->add_section( 'volatyl_design', array(
		'title'         => __( 'Volatyl - Structure', 'volatyl' ),
		'description'   => __( 'Site HTML structure', 'volatyl' ),
		'priority'      => 20,
	) );

	// full-width HTML structure
	$wp_customize->add_setting( 'volatyl_full_width_structure', array(
		'default'           => 0,
		'sanitize_callback' => 'volatyl_sanitize_checkbox'
	) );
	$wp_customize->add_control( 'volatyl_full_width_structure', array(
		'label'     => __( 'Enable full-width HTML structure', 'volatyl' ),
		'section'   => 'volatyl_design',
		'priority'  => 10,
		'type'      => 'checkbox',
	) );


	/** ===============
	 * Content Options
	 */
	$wp_customize->add_section( 'volatyl_content_section', array(
		'title'         => __( 'Volatyl - Content', 'volatyl' ),
		'description'   => __( 'Adjust the display of content on your website.', 'volatyl' ),
		'priority'      => 20,
	) );

	// comments on pages?
	$wp_customize->add_setting( 'volatyl_page_comments', array(
		'default'           => 0,
		'sanitize_callback' => 'volatyl_sanitize_checkbox'
	) );
	$wp_customize->add_control( 'volatyl_page_comments', array(
		'label'     => __( 'Enable Comments on Standard Pages', 'volatyl' ),
		'section'   => 'volatyl_content_section',
		'priority'  => 10,
		'type'      => 'checkbox',
	) );

//	// design color
//	$wp_customize->add_setting( 'volatyl_design_color', array(
//		'default'           => '#313240',
//		'type'              => 'option',
//		'capability'        => 'edit_theme_options',
//		'sanitize_callback'	=> 'volatyl_sanitize_hex_color',
//	) );
//	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'volatyl_design_color', array(
//		'label'     => __( 'Primary Design Color', 'volatyl' ),
//		'section'   => 'volatyl_design',
//		'priority'  => 20
//	) ) );
}
add_action( 'customize_register', 'volatyl_customize_register' );

/**
 * Sanitize checkbox options
 */
function volatyl_sanitize_checkbox( $input ) {
	return 1 == $input ? 1 : 0;
}

/**
 * sanitize hex colors
 */
function volatyl_sanitize_hex_color( $color ) {
	if ( '' === $color ) :
		return '';
	endif;

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) :
		return $color;
	endif;

	return null;
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
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
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
		hr { margin-top: 15px; }
		.settings-heading { margin-bottom: 0; }
		.settings-description { margin-top: 6px; }
		.customize-control-checkbox { margin-bottom: 0; }
		#customize-controls #customize-theme-controls .description { display: block; color: #666;  font-style: italic; margin: 2px 0 15px; }
		#customize-controls #customize-theme-controls .customize-section-description { margin-top: 10px; }
		textarea, input, select,
		.customize-description { font-size: 12px !important; }
		.customize-control-title { font-size: 13px !important; margin: 5px 0 3px !important; }
		.customize-control label { font-size: 12px !important; }
		.customize-control { margin-bottom: 10px; }
		.volatyl-toggle-wrap { display: inline-block; line-height: 1; margin-left: 2px; }
		.volatyl-toggle-wrap a { display: block; background: rgba(0, 0, 0, .2); color: #fff; padding: 2px 6px; border-radius: 3px; margin-left: 6px; }
		.volatyl-toggle-wrap a:hover,
		.volatyl-toggle-wrap .volatyl-description-opened { background: #555; color: #fff; }
		.control-description { color: #666; font-style: italic; margin-bottom: 6px; }
		.volatyl-control-description { display: none; }
		.customize-control-text + .customize-control-checkbox,
		.customize-control-customtext + .customize-control-checkbox,
		.customize-control-image + .customize-control-checkbox { margin-top: 12px; }
		#customize-control-volatyl_empty_cart_downloads_count input { width: 50px; }
	</style>
<?php }
add_action( 'customize_controls_print_styles', 'volatyl_customizer_styles' );
