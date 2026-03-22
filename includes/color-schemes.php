<?php
/**
 * CSS variables controlling the theme color scheme.
 *
 * The palette is split into two independently controlled chroma ranges:
 *
 * - --palette-chroma (0–0.25): driven by the Palette Vibrancy setting.
 *   Affects buttons, links, headings, and all Base/Light/Dark palette slots.
 *   At 0% these colors are near-gray; at 100% they are fully vivid.
 *
 * - --tint-chroma (0–0.06): driven by the Background & Text Tint setting.
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

	// Palette chroma: 0–100 maps to 0–0.25 (buttons, links, brand colors)
	$palette_chroma = round( $palette_vibrancy * 0.0025, 4 );

	// Tint chroma: 0–100 maps to 0–0.10 (dark backgrounds, text)
	$tint_chroma = round( $background_tint * 0.001, 5 );

	return ":root {
		--palette-chroma: {$palette_chroma};
		--tint-chroma: {$tint_chroma};
		--on-dark-luminance: 100%;

		/* Primary hue — drives all color slots by default */
		--primary-hue: {$primary_hue};
		--accent-3-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--accent-3-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--accent-3: oklch(55% var(--palette-chroma) var(--primary-hue));
		--accent-3-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--accent-3-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--accent-3-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));
		--text: oklch(20% var(--tint-chroma) var(--primary-hue));

		/* Backgrounds */
		--dark: oklch(15% var(--tint-chroma) var(--primary-hue));
		--darker: oklch(12% var(--tint-chroma) var(--primary-hue));

		/* Subdued colors */
		--subdued-light: oklch(91% calc(var(--tint-chroma) * 0.15) var(--primary-hue));
		--subdued-dark: oklch(44% calc(var(--tint-chroma) * 0.4) var(--primary-hue));

		/* Miscellaneous */
		--on-dark: oklch(var(--on-dark-luminance) calc(var(--tint-chroma) * 0.5) var(--primary-hue));
		--white: #fff;
		--translucent-light: rgba(255,255,255,.05);
		--translucent-dark: rgba(0,0,0,.05);

		/* Recessed surface — used for pre, code, dl, table stripes, etc.
		   Derives from currentColor so it adapts to any background automatically */
		--recessed-bg: color-mix(in oklch, currentColor 8%, transparent);

		/* Action, accent-1, accent-2, accent-3 — derived from the primary hue; overridden by color schemes */
		/* Technically, this is the monochromatic color scheme */
		--action-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--action-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--action: oklch(55% var(--palette-chroma) var(--primary-hue));
		--action-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--action-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--action-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));
		--accent-1-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--accent-1-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--accent-1: oklch(55% var(--palette-chroma) var(--primary-hue));
		--accent-1-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--accent-1-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--accent-1-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));
		--accent-2-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--accent-2-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--accent-2: oklch(55% var(--palette-chroma) var(--primary-hue));
		--accent-2-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--accent-2-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--accent-2-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));

		/* Complementary Color Scheme */
		--complementary-accent-hue: calc(var(--primary-hue) - 180);

		/* Analogous Color Scheme */
		--analogous-accent-hue-1: calc(var(--primary-hue) - 30);
		--analogous-accent-hue-2: calc(var(--primary-hue) + 30);

		/* Triadic Color Scheme */
		--triadic-accent-hue-1: calc(var(--primary-hue) - 120);
		--triadic-accent-hue-2: calc(var(--primary-hue) + 120);

		/* Split Complementary Color Scheme */
		--split-complementary-accent-hue-1: calc(var(--primary-hue) - 150);
		--split-complementary-accent-hue-2: calc(var(--primary-hue) + 150);

		/* Tetradic Color Scheme */
		--tetradic-accent-hue-1: calc(var(--primary-hue) - 90);
		--tetradic-accent-hue-2: calc(var(--primary-hue) + 90);
		--tetradic-accent-hue-3: calc(var(--primary-hue) + 180);
	}";
}

/**
 * Root color scheme complementary — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_complementary(): string {
	return "
		--action-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--action-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--action: oklch(55% var(--palette-chroma) var(--primary-hue));
		--action-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--action-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--action-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));
		--accent-1-darker: oklch(18% var(--palette-chroma) var(--complementary-accent-hue));
		--accent-1-dark: oklch(30% var(--palette-chroma) var(--complementary-accent-hue));
		--accent-1: oklch(55% var(--palette-chroma) var(--complementary-accent-hue));
		--accent-1-light: oklch(80% var(--palette-chroma) var(--complementary-accent-hue));
		--accent-1-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--complementary-accent-hue));
		--accent-1-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--complementary-accent-hue));
		--accent-2-darker: oklch(18% var(--palette-chroma) var(--complementary-accent-hue));
		--accent-2-dark: oklch(30% var(--palette-chroma) var(--complementary-accent-hue));
		--accent-2: oklch(55% var(--palette-chroma) var(--complementary-accent-hue));
		--accent-2-light: oklch(80% var(--palette-chroma) var(--complementary-accent-hue));
		--accent-2-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--complementary-accent-hue));
		--accent-2-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--complementary-accent-hue));";
}

/**
 * Root color scheme analogous — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_analogous(): string {
	return "
		--action-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--action-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--action: oklch(55% var(--palette-chroma) var(--primary-hue));
		--action-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--action-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--action-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));
		--accent-1-darker: oklch(18% var(--palette-chroma) var(--analogous-accent-hue-1));
		--accent-1-dark: oklch(30% var(--palette-chroma) var(--analogous-accent-hue-1));
		--accent-1: oklch(55% var(--palette-chroma) var(--analogous-accent-hue-1));
		--accent-1-light: oklch(80% var(--palette-chroma) var(--analogous-accent-hue-1));
		--accent-1-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--analogous-accent-hue-1));
		--accent-1-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--analogous-accent-hue-1));
		--accent-2-darker: oklch(18% var(--palette-chroma) var(--analogous-accent-hue-2));
		--accent-2-dark: oklch(30% var(--palette-chroma) var(--analogous-accent-hue-2));
		--accent-2: oklch(55% var(--palette-chroma) var(--analogous-accent-hue-2));
		--accent-2-light: oklch(80% var(--palette-chroma) var(--analogous-accent-hue-2));
		--accent-2-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--analogous-accent-hue-2));
		--accent-2-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--analogous-accent-hue-2));";
}

/**
 * Root color scheme triadic — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_triadic(): string {
	return "
		--action-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--action-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--action: oklch(55% var(--palette-chroma) var(--primary-hue));
		--action-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--action-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--action-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));
		--accent-1-darker: oklch(18% var(--palette-chroma) var(--triadic-accent-hue-1));
		--accent-1-dark: oklch(30% var(--palette-chroma) var(--triadic-accent-hue-1));
		--accent-1: oklch(55% var(--palette-chroma) var(--triadic-accent-hue-1));
		--accent-1-light: oklch(80% var(--palette-chroma) var(--triadic-accent-hue-1));
		--accent-1-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--triadic-accent-hue-1));
		--accent-1-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--triadic-accent-hue-1));
		--accent-2-darker: oklch(18% var(--palette-chroma) var(--triadic-accent-hue-2));
		--accent-2-dark: oklch(30% var(--palette-chroma) var(--triadic-accent-hue-2));
		--accent-2: oklch(55% var(--palette-chroma) var(--triadic-accent-hue-2));
		--accent-2-light: oklch(80% var(--palette-chroma) var(--triadic-accent-hue-2));
		--accent-2-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--triadic-accent-hue-2));
		--accent-2-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--triadic-accent-hue-2));";
}

/**
 * Root color scheme split_complementary — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_split_complementary(): string {
	return "
		--action-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--action-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--action: oklch(55% var(--palette-chroma) var(--primary-hue));
		--action-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--action-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--action-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));
		--accent-1-darker: oklch(18% var(--palette-chroma) var(--split-complementary-accent-hue-1));
		--accent-1-dark: oklch(30% var(--palette-chroma) var(--split-complementary-accent-hue-1));
		--accent-1: oklch(55% var(--palette-chroma) var(--split-complementary-accent-hue-1));
		--accent-1-light: oklch(80% var(--palette-chroma) var(--split-complementary-accent-hue-1));
		--accent-1-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--split-complementary-accent-hue-1));
		--accent-1-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--split-complementary-accent-hue-1));
		--accent-2-darker: oklch(18% var(--palette-chroma) var(--split-complementary-accent-hue-2));
		--accent-2-dark: oklch(30% var(--palette-chroma) var(--split-complementary-accent-hue-2));
		--accent-2: oklch(55% var(--palette-chroma) var(--split-complementary-accent-hue-2));
		--accent-2-light: oklch(80% var(--palette-chroma) var(--split-complementary-accent-hue-2));
		--accent-2-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--split-complementary-accent-hue-2));
		--accent-2-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--split-complementary-accent-hue-2));";
}

/**
 * Root color scheme tetradic — returns CSS declarations only (no wrapper)
 */
function volatyl_root_color_scheme_tetradic(): string {
	return "
		--action-darker: oklch(18% var(--palette-chroma) var(--primary-hue));
		--action-dark: oklch(30% var(--palette-chroma) var(--primary-hue));
		--action: oklch(55% var(--palette-chroma) var(--primary-hue));
		--action-light: oklch(80% var(--palette-chroma) var(--primary-hue));
		--action-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--primary-hue));
		--action-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--primary-hue));
		--accent-1-darker: oklch(18% var(--palette-chroma) var(--tetradic-accent-hue-2));
		--accent-1-dark: oklch(30% var(--palette-chroma) var(--tetradic-accent-hue-2));
		--accent-1: oklch(55% var(--palette-chroma) var(--tetradic-accent-hue-2));
		--accent-1-light: oklch(80% var(--palette-chroma) var(--tetradic-accent-hue-2));
		--accent-1-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--tetradic-accent-hue-2));
		--accent-1-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--tetradic-accent-hue-2));
		--accent-2-darker: oklch(18% var(--palette-chroma) var(--tetradic-accent-hue-3));
		--accent-2-dark: oklch(30% var(--palette-chroma) var(--tetradic-accent-hue-3));
		--accent-2: oklch(55% var(--palette-chroma) var(--tetradic-accent-hue-3));
		--accent-2-light: oklch(80% var(--palette-chroma) var(--tetradic-accent-hue-3));
		--accent-2-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--tetradic-accent-hue-3));
		--accent-2-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--tetradic-accent-hue-3));
		--accent-3-darker: oklch(18% var(--palette-chroma) var(--tetradic-accent-hue-1));
		--accent-3-dark: oklch(30% var(--palette-chroma) var(--tetradic-accent-hue-1));
		--accent-3: oklch(55% var(--palette-chroma) var(--tetradic-accent-hue-1));
		--accent-3-light: oklch(80% var(--palette-chroma) var(--tetradic-accent-hue-1));
		--accent-3-lighter: oklch(93% calc(var(--palette-chroma) * 0.3) var(--tetradic-accent-hue-1));
		--accent-3-tint: oklch(97.5% calc(var(--palette-chroma) * 0.025) var(--tetradic-accent-hue-1));";
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
