<?php // Gutenberg style functions

/**
 * Add editor styles
 */
function volatyl_editor_style() {
	add_editor_style();
	wp_enqueue_style( 'volatyl-editor-style', get_theme_file_uri( 'editor-style.css' ), false, THEME_VERSION, 'all' );
	wp_add_inline_style( 'volatyl-editor-style', volatyl_root_color_scheme_base() );

	// Override the default color scheme based on the chosen color scheme
	$color_scheme = get_theme_mod( 'volatyl_color_scheme_type', 'monochromatic' );
	$color_scheme_variables = '';
	if ( 'complementary' === $color_scheme ) {
		$color_scheme_variables = volatyl_root_color_scheme_complementary( false );
	} elseif ( 'analogous' === $color_scheme ) {
		$color_scheme_variables = volatyl_root_color_scheme_analogous( false );
	} elseif ( 'triadic' === $color_scheme ) {
		$color_scheme_variables = volatyl_root_color_scheme_triadic( false );
	} elseif ( 'split_complementary' === $color_scheme ) {
		$color_scheme_variables = volatyl_root_color_scheme_split_complementary( false );
	} elseif ( 'tetradic' === $color_scheme ) {
		$color_scheme_variables = volatyl_root_color_scheme_tetradic( false );
	}
	wp_add_inline_style( 'volatyl-editor-style', $color_scheme_variables );
}
add_action( 'enqueue_block_editor_assets', 'volatyl_editor_style' );

/**
 * Adjust editor styles
 */
function volatyl_editor_color_palette() {

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Primary Hue', 'volatyl' ),
			'slug'  => 'primary',
			'color' => 'hsl(var(--primary-hue) var(--global-hue-saturation) 50%)',
		),
		array(
			'name'  => __( 'Primary Hue Dark', 'volatyl' ),
			'slug'  => 'primary-dark',
			'color' => 'var(--primary-hue_dark)',
		),
		array(
			'name'  => __( 'Action Color', 'volatyl' ),
			'slug'  => 'action',
			'color' => 'var(--action)',
		),
		array(
			'name'  => __( 'Action Color Dark', 'volatyl' ),
			'slug'  => 'action-dark',
			'color' => 'var(--action-dark)',
		),
		array(
			'name'  => __( 'Accent Color', 'volatyl' ),
			'slug'  => 'accent',
			'color' => 'var(--accent)',
		),
		array(
			'name'  => __( 'Accent Color Dark', 'volatyl' ),
			'slug'  => 'accent-dark',
			'color' => 'var(--accent-dark)',
		),
		array(
			'name'  => __( 'Extra Accent Color', 'volatyl' ),
			'slug'  => 'extra-accent',
			'color' => 'var(--extra-accent)',
		),
		array(
			'name'  => __( 'Extra Accent Color Dark', 'volatyl' ),
			'slug'  => 'extra-accent-dark',
			'color' => 'var(--extra-accent-dark)',
		),
		array(
			'name'  => __( 'Gray', 'volatyl' ),
			'slug'  => 'gray',
			'color' => 'var(--gray-background)',
		),
		array(
			'name'  => __( 'Dark', 'volatyl' ),
			'slug'  => 'dark',
			'color' => 'var(--dark-background)',
		),
		array(
			'name'  => __( 'Darker', 'volatyl' ),
			'slug'  => 'darker',
			'color' => 'var(--darker-background)',
		),
		array(
			'name'  => __( 'Subdued Light', 'volatyl' ),
			'slug'  => 'subdued-light',
			'color' => 'var(--subdued-light)',
		),
		array(
			'name'  => __( 'Subdued Dark', 'volatyl' ),
			'slug'  => 'subdued-dark',
			'color' => 'var(--subdued-dark)',
		),
		array(
			'name'  => __( 'Light Text Over Dark Background', 'volatyl' ),
			'slug'  => 'light-text-over-dark',
			'color' => 'var(--light-text-over-dark)',
		),
		array(
			'name'  => __( 'White', 'volatyl' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => __( 'Translucent Background - Light', 'volatyl' ),
			'slug'  => 'translucent-light',
			'color' => 'rgba(255,255,255,0.1)',
		),
		array(
			'name'  => __( 'Translucent Background - Dark', 'volatyl' ),
			'slug'  => 'translucent-dark',
			'color' => 'rgba(0,0,0,0.1)',
		),
	) );
}
add_action( 'after_setup_theme', 'volatyl_editor_color_palette' );