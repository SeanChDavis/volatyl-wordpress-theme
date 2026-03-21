<?php // Gutenberg style functions

/**
 * Register editor-style.css via add_editor_style() so WordPress automatically
 * scopes all selectors to .editor-styles-wrapper — keeping theme styles out of
 * the admin UI and inside the editor canvas only.
 */
function volatyl_register_editor_style() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'volatyl_register_editor_style' );

/**
 * Inject OKLCH color variables into the block editor iframe via
 * block_editor_settings_all — the correct way to get dynamic CSS
 * into the iframed editing canvas (WordPress 6.2+).
 */
function volatyl_editor_color_vars( $settings ) {
	$scheme     = get_theme_mod( 'volatyl_color_scheme_type', DEFAULT_COLOR_SCHEME_TYPE );
	$editor_css = volatyl_root_color_scheme_base() . volatyl_get_scheme_overrides( $scheme );
	$settings['styles'][] = array( 'css' => $editor_css );
	return $settings;
}
add_filter( 'block_editor_settings_all', 'volatyl_editor_color_vars' );

/**
 * Resolve computed OKLCH palette colors from the current theme mods.
 *
 * The block editor renders color swatches in the controls pane, which has no
 * access to the CSS variables defined inside the editor iframe. We must pass
 * real, resolved color strings so the swatches display correctly.
 *
 * @return array[]
 */
function volatyl_palette_colors(): array {
	$hue              = get_theme_mod( 'volatyl_primary_hue', DEFAULT_PRIMARY_HUE );
	$palette_vibrancy = get_theme_mod( 'volatyl_palette_vibrancy', DEFAULT_PALETTE_VIBRANCY );
	$background_tint  = get_theme_mod( 'volatyl_background_tint', DEFAULT_BACKGROUND_TINT );
	$palette_chroma   = round( $palette_vibrancy * 0.0025, 4 );
	$tint_chroma      = round( $background_tint * 0.001, 5 );
	$scheme           = get_theme_mod( 'volatyl_color_scheme_type', DEFAULT_COLOR_SCHEME_TYPE );

	// Resolve hues for each color slot in the active scheme.
	$accent_3_hue = $hue; // accent-3 equals action in all schemes except tetradic

	switch ( $scheme ) {
		case 'complementary':
			$action_hue   = $hue;
			$accent_1_hue = $hue - 180;
			$accent_2_hue = $hue - 180;
			break;
		case 'analogous':
			$action_hue   = $hue;
			$accent_1_hue = $hue - 30;
			$accent_2_hue = $hue + 30;
			break;
		case 'triadic':
			$action_hue   = $hue;
			$accent_1_hue = $hue - 120;
			$accent_2_hue = $hue + 120;
			break;
		case 'split_complementary':
			$action_hue   = $hue;
			$accent_1_hue = $hue - 150;
			$accent_2_hue = $hue + 150;
			break;
		case 'tetradic':
			$action_hue   = $hue;
			$accent_1_hue = $hue + 90;
			$accent_2_hue = $hue + 180;
			$accent_3_hue = $hue - 90; // 4th tetradic color
			break;
		default: // monochromatic
			$action_hue   = $hue;
			$accent_1_hue = $hue;
			$accent_2_hue = $hue;
			break;
	}

	$tint_wash      = round( $palette_chroma * 0.025, 5 );
	$on_dark_chroma = round( $tint_chroma * 0.5, 5 );

	// Shorthand builders.
	$vivid = fn( $l, $h ) => "oklch({$l}% {$palette_chroma} {$h})";
	$tint  = fn( $h ) => "oklch(97.5% {$tint_wash} {$h})";

	return array(
		array( 'name' => __( 'Action',                             'volatyl' ), 'slug' => 'action',               'color' => $vivid( 55, $action_hue ) ),
		array( 'name' => __( 'Action Light',                       'volatyl' ), 'slug' => 'action-light',         'color' => $vivid( 75, $action_hue ) ),
		array( 'name' => __( 'Action Dark',                        'volatyl' ), 'slug' => 'action-dark',          'color' => $vivid( 30, $action_hue ) ),
		array( 'name' => __( 'Action Tint',                        'volatyl' ), 'slug' => 'action-tint',          'color' => $tint( $action_hue ) ),
		array( 'name' => __( 'Accent 1',                           'volatyl' ), 'slug' => 'accent-1',             'color' => $vivid( 55, $accent_1_hue ) ),
		array( 'name' => __( 'Accent 1 Light',                     'volatyl' ), 'slug' => 'accent-1-light',       'color' => $vivid( 75, $accent_1_hue ) ),
		array( 'name' => __( 'Accent 1 Dark',                      'volatyl' ), 'slug' => 'accent-1-dark',        'color' => $vivid( 30, $accent_1_hue ) ),
		array( 'name' => __( 'Accent 1 Tint',                      'volatyl' ), 'slug' => 'accent-1-tint',        'color' => $tint( $accent_1_hue ) ),
		array( 'name' => __( 'Accent 2',                           'volatyl' ), 'slug' => 'accent-2',             'color' => $vivid( 55, $accent_2_hue ) ),
		array( 'name' => __( 'Accent 2 Light',                     'volatyl' ), 'slug' => 'accent-2-light',       'color' => $vivid( 75, $accent_2_hue ) ),
		array( 'name' => __( 'Accent 2 Dark',                      'volatyl' ), 'slug' => 'accent-2-dark',        'color' => $vivid( 30, $accent_2_hue ) ),
		array( 'name' => __( 'Accent 2 Tint',                      'volatyl' ), 'slug' => 'accent-2-tint',        'color' => $tint( $accent_2_hue ) ),
		array( 'name' => __( 'Accent 3',                           'volatyl' ), 'slug' => 'accent-3',             'color' => $vivid( 55, $accent_3_hue ) ),
		array( 'name' => __( 'Accent 3 Light',                     'volatyl' ), 'slug' => 'accent-3-light',       'color' => $vivid( 75, $accent_3_hue ) ),
		array( 'name' => __( 'Accent 3 Dark',                      'volatyl' ), 'slug' => 'accent-3-dark',        'color' => $vivid( 30, $accent_3_hue ) ),
		array( 'name' => __( 'Accent 3 Tint',                      'volatyl' ), 'slug' => 'accent-3-tint',        'color' => $tint( $accent_3_hue ) ),
		array( 'name' => __( 'Dark',                               'volatyl' ), 'slug' => 'dark',                 'color' => "oklch(15% {$tint_chroma} {$hue})" ),
		array( 'name' => __( 'Darker',                             'volatyl' ), 'slug' => 'darker',               'color' => "oklch(12% {$tint_chroma} {$hue})" ),
		array( 'name' => __( 'Subdued Light',                      'volatyl' ), 'slug' => 'subdued-light',        'color' => "oklch(91% " . round( $tint_chroma * 0.15, 5 ) . " {$hue})" ),
		array( 'name' => __( 'Subdued Dark',                       'volatyl' ), 'slug' => 'subdued-dark',         'color' => "oklch(44% " . round( $tint_chroma * 0.4, 5 ) . " {$hue})" ),
		array( 'name' => __( 'On Dark',                            'volatyl' ), 'slug' => 'on-dark',              'color' => "oklch(100% {$on_dark_chroma} {$hue})" ),
		array( 'name' => __( 'White',                              'volatyl' ), 'slug' => 'white',                'color' => '#ffffff' ),
		array( 'name' => __( 'Translucent Background - Light',     'volatyl' ), 'slug' => 'translucent-light',    'color' => 'rgba(255,255,255,0.1)' ),
		array( 'name' => __( 'Translucent Background - Dark',      'volatyl' ), 'slug' => 'translucent-dark',     'color' => 'rgba(0,0,0,0.1)' ),
	);
}

/**
 * Register the editor color palette using resolved OKLCH values.
 */
function volatyl_editor_color_palette() {
	add_theme_support( 'editor-color-palette', volatyl_palette_colors() );
}
add_action( 'after_setup_theme', 'volatyl_editor_color_palette' );
