<?php
/**
 * CSS variables controlling the theme color scheme.
 *
 * The palette is split into two independently controlled chroma ranges:
 *
 * - --v-palette-chroma (0–0.25): driven by the Palette Vibrancy setting.
 *   Affects buttons, links, headings, and all Base/Light/Dark palette slots.
 *   At 0% these colors are near-gray; at 100% they are fully vivid.
 *
 * - --v-tint-chroma (0–0.06): driven by the Background & Text Tint setting.
 *   Affects dark section backgrounds, body text, on-dark text, and tint washes.
 *   Intentionally capped low — dark backgrounds stay dark and readable even
 *   at high values. At 0% all backgrounds and text are neutral black/gray.
 *
 * The color schemes are:
 * - Monochromatic (default): all colors derived from the primary hue
 * - Complementary: action/accent from the complementary hue (primary − 180)
 * - Analogous: action/accent from ±30° hues
 * - Triadic: action/accent from ±120° hues
 * - Split Complementary: action/accent from ±150° hues
 * - Tetradic: action/accent from ±90° and +180° hues
 *
 * Only the active scheme's overrides are output as a single :root {} block —
 * no CSS nesting, no wasted CSS for inactive schemes.
 */

/**
 * The root color scheme styles.
 */
function volatyl_root_color_scheme_base() {

	$primary_hue      = get_theme_mod( 'volatyl_primary_hue', DEFAULT_PRIMARY_HUE );
	$palette_vibrancy = get_theme_mod( 'volatyl_palette_vibrancy', DEFAULT_PALETTE_VIBRANCY );
	$background_tint  = get_theme_mod( 'volatyl_background_tint', DEFAULT_BACKGROUND_TINT );
	$border_radius    = absint( get_theme_mod( 'volatyl_border_radius', DEFAULT_BORDER_RADIUS ) );
	// Button radius: slider 0-100; 0-50 maps to 0-20px (fine control), 51-100 snaps to 9999px (pill).
	$button_radius_raw = absint( get_theme_mod( 'volatyl_button_radius', DEFAULT_BUTTON_RADIUS ) );
	$button_radius     = $button_radius_raw <= 50
		? round( $button_radius_raw * 0.4, 1 ) . 'px'
		: '9999px';

	// Palette chroma: 0–100 maps to 0–0.25 (buttons, links, brand colors)
	$palette_chroma = round( $palette_vibrancy * 0.0025, 4 );

	// Tint chroma: 0–100 maps to 0–0.10 (dark backgrounds, text)
	$tint_chroma = round( $background_tint * 0.001, 5 );

	return ":root {
		--v-palette-chroma: {$palette_chroma};
		--v-tint-chroma: {$tint_chroma};
		--v-radius: {$border_radius}px;
		--v-radius-button: {$button_radius};
		--v-on-dark-luminance: 100%;

		/* Per-family hue references — consumed by per-context --v-on-dark overrides in SCSS */
		--v-accent-1-hue: var(--v-primary-hue);
		--v-accent-2-hue: var(--v-primary-hue);
		--v-accent-3-hue: var(--v-primary-hue);

		/* Primary hue — drives all color slots by default */
		--v-primary-hue: {$primary_hue};
		--v-accent-3-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-3-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-3: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-3-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-3-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-accent-3-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));
		--v-text: oklch(20% var(--v-tint-chroma) var(--v-primary-hue));

		/* Backgrounds */
		--v-dark: oklch(15% var(--v-tint-chroma) var(--v-primary-hue));
		--v-darker: oklch(12% var(--v-tint-chroma) var(--v-primary-hue));

		/* Subdued colors */
		--v-subdued-light: oklch(91% calc(var(--v-tint-chroma) * 0.15) var(--v-primary-hue));
		--v-subdued-dark: oklch(44% calc(var(--v-tint-chroma) * 0.4) var(--v-primary-hue));

		/* Miscellaneous */
		--v-on-dark: oklch(var(--v-on-dark-luminance) calc(var(--v-tint-chroma) * 0.5) var(--v-primary-hue));
		--v-white: #fff;
		--v-translucent-light: rgba(255,255,255,.05);
		--v-translucent-dark: rgba(0,0,0,.05);

		/* Recessed surface — used for pre, code, dl, table stripes, etc.
		   Derives from currentColor so it adapts to any background automatically */
		--v-recessed-bg: color-mix(in oklch, currentColor 8%, transparent);

		/* Error / validation color */
		--v-error: oklch(45% 0.2 25);

		/* Action, accent-1, accent-2, accent-3 — derived from the primary hue; overridden by color schemes */
		/* Technically, this is the monochromatic color scheme */
		--v-action-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-action-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));
		--v-accent-1-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-1-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-1: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-1-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-1-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-accent-1-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));
		--v-accent-2-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-2-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-2: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-2-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-accent-2-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-accent-2-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));

		/* Complementary Color Scheme */
		--v-complementary-accent-hue: calc(var(--v-primary-hue) - 180);

		/* Analogous Color Scheme */
		--v-analogous-accent-hue-1: calc(var(--v-primary-hue) - 30);
		--v-analogous-accent-hue-2: calc(var(--v-primary-hue) + 30);

		/* Triadic Color Scheme */
		--v-triadic-accent-hue-1: calc(var(--v-primary-hue) - 120);
		--v-triadic-accent-hue-2: calc(var(--v-primary-hue) + 120);

		/* Split Complementary Color Scheme */
		--v-split-complementary-accent-hue-1: calc(var(--v-primary-hue) - 150);
		--v-split-complementary-accent-hue-2: calc(var(--v-primary-hue) + 150);

		/* Tetradic Color Scheme */
		--v-tetradic-accent-hue-1: calc(var(--v-primary-hue) - 90);
		--v-tetradic-accent-hue-2: calc(var(--v-primary-hue) + 90);
		--v-tetradic-accent-hue-3: calc(var(--v-primary-hue) + 180);
	}";
}

/**
 * Root color scheme complementary — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_complementary(): string {
	return "
		--v-accent-1-hue: var(--v-complementary-accent-hue);
		--v-accent-2-hue: var(--v-complementary-accent-hue);
		--v-action-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-action-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));
		--v-accent-1-darker: oklch(18% var(--v-palette-chroma) var(--v-complementary-accent-hue));
		--v-accent-1-dark: oklch(30% var(--v-palette-chroma) var(--v-complementary-accent-hue));
		--v-accent-1: oklch(55% var(--v-palette-chroma) var(--v-complementary-accent-hue));
		--v-accent-1-light: oklch(80% var(--v-palette-chroma) var(--v-complementary-accent-hue));
		--v-accent-1-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-complementary-accent-hue));
		--v-accent-1-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-complementary-accent-hue));
		--v-accent-2-darker: oklch(18% var(--v-palette-chroma) var(--v-complementary-accent-hue));
		--v-accent-2-dark: oklch(30% var(--v-palette-chroma) var(--v-complementary-accent-hue));
		--v-accent-2: oklch(55% var(--v-palette-chroma) var(--v-complementary-accent-hue));
		--v-accent-2-light: oklch(80% var(--v-palette-chroma) var(--v-complementary-accent-hue));
		--v-accent-2-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-complementary-accent-hue));
		--v-accent-2-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-complementary-accent-hue));";
}

/**
 * Root color scheme analogous — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_analogous(): string {
	return "
		--v-accent-1-hue: var(--v-analogous-accent-hue-1);
		--v-accent-2-hue: var(--v-analogous-accent-hue-2);
		--v-action-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-action-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));
		--v-accent-1-darker: oklch(18% var(--v-palette-chroma) var(--v-analogous-accent-hue-1));
		--v-accent-1-dark: oklch(30% var(--v-palette-chroma) var(--v-analogous-accent-hue-1));
		--v-accent-1: oklch(55% var(--v-palette-chroma) var(--v-analogous-accent-hue-1));
		--v-accent-1-light: oklch(80% var(--v-palette-chroma) var(--v-analogous-accent-hue-1));
		--v-accent-1-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-analogous-accent-hue-1));
		--v-accent-1-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-analogous-accent-hue-1));
		--v-accent-2-darker: oklch(18% var(--v-palette-chroma) var(--v-analogous-accent-hue-2));
		--v-accent-2-dark: oklch(30% var(--v-palette-chroma) var(--v-analogous-accent-hue-2));
		--v-accent-2: oklch(55% var(--v-palette-chroma) var(--v-analogous-accent-hue-2));
		--v-accent-2-light: oklch(80% var(--v-palette-chroma) var(--v-analogous-accent-hue-2));
		--v-accent-2-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-analogous-accent-hue-2));
		--v-accent-2-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-analogous-accent-hue-2));";
}

/**
 * Root color scheme triadic — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_triadic(): string {
	return "
		--v-accent-1-hue: var(--v-triadic-accent-hue-1);
		--v-accent-2-hue: var(--v-triadic-accent-hue-2);
		--v-action-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-action-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));
		--v-accent-1-darker: oklch(18% var(--v-palette-chroma) var(--v-triadic-accent-hue-1));
		--v-accent-1-dark: oklch(30% var(--v-palette-chroma) var(--v-triadic-accent-hue-1));
		--v-accent-1: oklch(55% var(--v-palette-chroma) var(--v-triadic-accent-hue-1));
		--v-accent-1-light: oklch(80% var(--v-palette-chroma) var(--v-triadic-accent-hue-1));
		--v-accent-1-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-triadic-accent-hue-1));
		--v-accent-1-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-triadic-accent-hue-1));
		--v-accent-2-darker: oklch(18% var(--v-palette-chroma) var(--v-triadic-accent-hue-2));
		--v-accent-2-dark: oklch(30% var(--v-palette-chroma) var(--v-triadic-accent-hue-2));
		--v-accent-2: oklch(55% var(--v-palette-chroma) var(--v-triadic-accent-hue-2));
		--v-accent-2-light: oklch(80% var(--v-palette-chroma) var(--v-triadic-accent-hue-2));
		--v-accent-2-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-triadic-accent-hue-2));
		--v-accent-2-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-triadic-accent-hue-2));";
}

/**
 * Root color scheme split_complementary — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_split_complementary(): string {
	return "
		--v-accent-1-hue: var(--v-split-complementary-accent-hue-1);
		--v-accent-2-hue: var(--v-split-complementary-accent-hue-2);
		--v-action-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-action-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));
		--v-accent-1-darker: oklch(18% var(--v-palette-chroma) var(--v-split-complementary-accent-hue-1));
		--v-accent-1-dark: oklch(30% var(--v-palette-chroma) var(--v-split-complementary-accent-hue-1));
		--v-accent-1: oklch(55% var(--v-palette-chroma) var(--v-split-complementary-accent-hue-1));
		--v-accent-1-light: oklch(80% var(--v-palette-chroma) var(--v-split-complementary-accent-hue-1));
		--v-accent-1-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-split-complementary-accent-hue-1));
		--v-accent-1-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-split-complementary-accent-hue-1));
		--v-accent-2-darker: oklch(18% var(--v-palette-chroma) var(--v-split-complementary-accent-hue-2));
		--v-accent-2-dark: oklch(30% var(--v-palette-chroma) var(--v-split-complementary-accent-hue-2));
		--v-accent-2: oklch(55% var(--v-palette-chroma) var(--v-split-complementary-accent-hue-2));
		--v-accent-2-light: oklch(80% var(--v-palette-chroma) var(--v-split-complementary-accent-hue-2));
		--v-accent-2-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-split-complementary-accent-hue-2));
		--v-accent-2-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-split-complementary-accent-hue-2));";
}

/**
 * Root color scheme tetradic — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_tetradic(): string {
	return "
		--v-accent-1-hue: var(--v-tetradic-accent-hue-2);
		--v-accent-2-hue: var(--v-tetradic-accent-hue-3);
		--v-accent-3-hue: var(--v-tetradic-accent-hue-1);
		--v-action-darker: oklch(18% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-dark: oklch(30% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action: oklch(55% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-light: oklch(80% var(--v-palette-chroma) var(--v-primary-hue));
		--v-action-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-primary-hue));
		--v-action-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-primary-hue));
		--v-accent-1-darker: oklch(18% var(--v-palette-chroma) var(--v-tetradic-accent-hue-2));
		--v-accent-1-dark: oklch(30% var(--v-palette-chroma) var(--v-tetradic-accent-hue-2));
		--v-accent-1: oklch(55% var(--v-palette-chroma) var(--v-tetradic-accent-hue-2));
		--v-accent-1-light: oklch(80% var(--v-palette-chroma) var(--v-tetradic-accent-hue-2));
		--v-accent-1-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-tetradic-accent-hue-2));
		--v-accent-1-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-tetradic-accent-hue-2));
		--v-accent-2-darker: oklch(18% var(--v-palette-chroma) var(--v-tetradic-accent-hue-3));
		--v-accent-2-dark: oklch(30% var(--v-palette-chroma) var(--v-tetradic-accent-hue-3));
		--v-accent-2: oklch(55% var(--v-palette-chroma) var(--v-tetradic-accent-hue-3));
		--v-accent-2-light: oklch(80% var(--v-palette-chroma) var(--v-tetradic-accent-hue-3));
		--v-accent-2-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-tetradic-accent-hue-3));
		--v-accent-2-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-tetradic-accent-hue-3));
		--v-accent-3-darker: oklch(18% var(--v-palette-chroma) var(--v-tetradic-accent-hue-1));
		--v-accent-3-dark: oklch(30% var(--v-palette-chroma) var(--v-tetradic-accent-hue-1));
		--v-accent-3: oklch(55% var(--v-palette-chroma) var(--v-tetradic-accent-hue-1));
		--v-accent-3-light: oklch(80% var(--v-palette-chroma) var(--v-tetradic-accent-hue-1));
		--v-accent-3-lighter: oklch(93% calc(var(--v-palette-chroma) * 0.3) var(--v-tetradic-accent-hue-1));
		--v-accent-3-tint: oklch(97.5% calc(var(--v-palette-chroma) * 0.025) var(--v-tetradic-accent-hue-1));";
}

/**
 * Returns the active scheme's CSS declarations wrapped in :root {}, or empty string for monochromatic.
 */
function volatyl_get_scheme_overrides( string $scheme ): string {
	switch ( $scheme ) {
		case 'complementary':
			$declarations = volatyl_root_color_scheme_complementary();
			break;
		case 'analogous':
			$declarations = volatyl_root_color_scheme_analogous();
			break;
		case 'triadic':
			$declarations = volatyl_root_color_scheme_triadic();
			break;
		case 'split_complementary':
			$declarations = volatyl_root_color_scheme_split_complementary();
			break;
		case 'tetradic':
			$declarations = volatyl_root_color_scheme_tetradic();
			break;
		default:
			return '';
	}
	return ":root {{$declarations}}";
}
