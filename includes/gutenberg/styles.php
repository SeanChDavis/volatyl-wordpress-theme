<?php // Gutenberg style functions

/**
 * Add editor styles
 */
function volatyl_editor_style() {
	add_editor_style();
	wp_enqueue_style( 'volatyl-editor-style', get_theme_file_uri( 'editor-style.css' ), false, THEME_VERSION, 'all' );
	$scheme          = get_theme_mod( 'volatyl_color_scheme_type', DEFAULT_COLOR_SCHEME_TYPE );
	$editor_css      = volatyl_root_color_scheme_base() . volatyl_get_scheme_overrides( $scheme );
	wp_add_inline_style( 'volatyl-editor-style', $editor_css );
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
			'color' => 'var(--primary)'
		),
		array(
			'name'  => __( 'Primary Hue Light', 'volatyl' ),
			'slug'  => 'primary-light',
			'color' => 'var(--primary-light)'
		),
		array(
			'name'  => __( 'Primary Hue Dark', 'volatyl' ),
			'slug'  => 'primary-dark',
			'color' => 'var(--primary-dark)',
		),
		array(
			'name'  => __( 'Primary Hue Tint', 'volatyl' ),
			'slug'  => 'primary-tint',
			'color' => 'var(--primary-tint)',
		),
		array(
			'name'  => __( 'Action Color', 'volatyl' ),
			'slug'  => 'action',
			'color' => 'var(--action)',
		),
		array(
			'name'  => __( 'Action Color Light', 'volatyl' ),
			'slug'  => 'action-light',
			'color' => 'var(--action-light)',
		),
		array(
			'name'  => __( 'Action Color Dark', 'volatyl' ),
			'slug'  => 'action-dark',
			'color' => 'var(--action-dark)',
		),
		array(
			'name'  => __( 'Action Color Tint', 'volatyl' ),
			'slug'  => 'action-tint',
			'color' => 'var(--action-tint)',
		),
		array(
			'name'  => __( 'Accent Color', 'volatyl' ),
			'slug'  => 'accent',
			'color' => 'var(--accent)',
		),
		array(
			'name'  => __( 'Accent Color Light', 'volatyl' ),
			'slug'  => 'accent-light',
			'color' => 'var(--accent-light)',
		),
		array(
			'name'  => __( 'Accent Color Dark', 'volatyl' ),
			'slug'  => 'accent-dark',
			'color' => 'var(--accent-dark)',
		),
		array(
			'name'  => __( 'Accent Color Tint', 'volatyl' ),
			'slug'  => 'accent-tint',
			'color' => 'var(--accent-tint)',
		),
		array(
			'name'  => __( 'Extra Accent Color', 'volatyl' ),
			'slug'  => 'extra-accent',
			'color' => 'var(--extra-accent)',
		),
		array(
			'name'  => __( 'Extra Accent Color Light', 'volatyl' ),
			'slug'  => 'extra-accent-light',
			'color' => 'var(--extra-accent-light)',
		),
		array(
			'name'  => __( 'Extra Accent Color Dark', 'volatyl' ),
			'slug'  => 'extra-accent-dark',
			'color' => 'var(--extra-accent-dark)',
		),
		array(
			'name'  => __( 'Extra Accent Color Tint', 'volatyl' ),
			'slug'  => 'extra-accent-tint',
			'color' => 'var(--extra-accent-tint)',
		),
		array(
			'name'  => __( 'Dark', 'volatyl' ),
			'slug'  => 'dark',
			'color' => 'var(--dark)',
		),
		array(
			'name'  => __( 'Darker', 'volatyl' ),
			'slug'  => 'darker',
			'color' => 'var(--darker)',
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
			'name'  => __( 'On Dark', 'volatyl' ),
			'slug'  => 'on-dark',
			'color' => 'var(--on-dark)',
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