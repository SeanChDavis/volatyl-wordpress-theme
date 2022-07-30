<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function volatyl_customize_register( $wp_customize ) {
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
