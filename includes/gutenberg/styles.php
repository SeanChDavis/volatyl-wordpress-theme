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

	// Resolve action / accent / extra-accent hues for the active scheme.
	$primary_slot_hue = $hue; // equals action in all schemes except tetradic

	switch ( $scheme ) {
		case 'complementary':
			$action_hue       = $hue;
			$accent_hue       = $hue - 180;
			$extra_accent_hue = $hue - 180;
			break;
		case 'analogous':
			$action_hue       = $hue;
			$accent_hue       = $hue - 30;
			$extra_accent_hue = $hue + 30;
			break;
		case 'triadic':
			$action_hue       = $hue;
			$accent_hue       = $hue - 120;
			$extra_accent_hue = $hue + 120;
			break;
		case 'split_complementary':
			$action_hue       = $hue;
			$accent_hue       = $hue - 150;
			$extra_accent_hue = $hue + 150;
			break;
		case 'tetradic':
			$action_hue       = $hue;
			$accent_hue       = $hue + 90;
			$extra_accent_hue = $hue + 180;
			$primary_slot_hue = $hue - 90; // 4th tetradic color
			break;
		default: // monochromatic
			$action_hue       = $hue;
			$accent_hue       = $hue;
			$extra_accent_hue = $hue;
			break;
	}

	$tint_wash      = round( $palette_chroma * 0.05, 5 );
	$on_dark_chroma = round( $tint_chroma * 0.5, 5 );

	// Shorthand builders.
	$vivid = fn( $l, $h ) => "oklch({$l}% {$palette_chroma} {$h})";
	$tint  = fn( $h ) => "oklch(97.5% {$tint_wash} {$h})";

	return array(
		array( 'name' => __( 'Primary Hue',                       'volatyl' ), 'slug' => 'primary',              'color' => $vivid( 55, $primary_slot_hue ) ),
		array( 'name' => __( 'Primary Hue Light',                  'volatyl' ), 'slug' => 'primary-light',        'color' => $vivid( 75, $primary_slot_hue ) ),
		array( 'name' => __( 'Primary Hue Dark',                   'volatyl' ), 'slug' => 'primary-dark',         'color' => $vivid( 30, $primary_slot_hue ) ),
		array( 'name' => __( 'Primary Hue Tint',                   'volatyl' ), 'slug' => 'primary-tint',         'color' => $tint( $primary_slot_hue ) ),
		array( 'name' => __( 'Action Color',                       'volatyl' ), 'slug' => 'action',               'color' => $vivid( 55, $action_hue ) ),
		array( 'name' => __( 'Action Color Light',                 'volatyl' ), 'slug' => 'action-light',         'color' => $vivid( 75, $action_hue ) ),
		array( 'name' => __( 'Action Color Dark',                  'volatyl' ), 'slug' => 'action-dark',          'color' => $vivid( 30, $action_hue ) ),
		array( 'name' => __( 'Action Color Tint',                  'volatyl' ), 'slug' => 'action-tint',          'color' => $tint( $action_hue ) ),
		array( 'name' => __( 'Accent Color',                       'volatyl' ), 'slug' => 'accent',               'color' => $vivid( 55, $accent_hue ) ),
		array( 'name' => __( 'Accent Color Light',                 'volatyl' ), 'slug' => 'accent-light',         'color' => $vivid( 75, $accent_hue ) ),
		array( 'name' => __( 'Accent Color Dark',                  'volatyl' ), 'slug' => 'accent-dark',          'color' => $vivid( 30, $accent_hue ) ),
		array( 'name' => __( 'Accent Color Tint',                  'volatyl' ), 'slug' => 'accent-tint',          'color' => $tint( $accent_hue ) ),
		array( 'name' => __( 'Extra Accent Color',                 'volatyl' ), 'slug' => 'extra-accent',         'color' => $vivid( 55, $extra_accent_hue ) ),
		array( 'name' => __( 'Extra Accent Color Light',           'volatyl' ), 'slug' => 'extra-accent-light',   'color' => $vivid( 75, $extra_accent_hue ) ),
		array( 'name' => __( 'Extra Accent Color Dark',            'volatyl' ), 'slug' => 'extra-accent-dark',    'color' => $vivid( 30, $extra_accent_hue ) ),
		array( 'name' => __( 'Extra Accent Color Tint',            'volatyl' ), 'slug' => 'extra-accent-tint',    'color' => $tint( $extra_accent_hue ) ),
		array( 'name' => __( 'Dark',                               'volatyl' ), 'slug' => 'dark',                 'color' => "oklch(15% {$tint_chroma} {$hue})" ),
		array( 'name' => __( 'Darker',                             'volatyl' ), 'slug' => 'darker',               'color' => "oklch(12% {$tint_chroma} {$hue})" ),
		array( 'name' => __( 'Subdued Light',                      'volatyl' ), 'slug' => 'subdued-light',        'color' => "oklch(91% 0.015 {$hue})" ),
		array( 'name' => __( 'Subdued Dark',                       'volatyl' ), 'slug' => 'subdued-dark',         'color' => "oklch(44% 0.04 {$hue})" ),
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
