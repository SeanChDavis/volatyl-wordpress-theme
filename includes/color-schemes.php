<?php
/**
 * CSS variables controlling the theme color scheme.
 *
 * These styles are generated based on the primary hue and global hue saturation customizer settings
 * and are used as the basis for all color schemes in the theme. The various color schemes then
 * override the action and accent colors to create different color combinations.
 *
 * The color schemes are:
 * - Monochromatic (default):
 * --- All colors are derived from the primary hue
 * - Complementary:
 * --- Action and accent colors are derived from the complementary hue (primary hue - 180)
 * - Analogous:
 * --- Action and accent colors are derived from the analogous hues (primary hue - 30 and primary hue + 30)
 * - Triadic:
 * --- Action and accent colors are derived from the triadic hues (primary hue - 120 and primary hue + 120)
 * - Split Complementary:
 * --- Action and accent colors are derived from the split complementary hues (primary hue - 150 and primary hue + 150)
 * - Tetradic:
 * --- Action and accent colors are derived from the tetradic hues (primary hue - 90, primary hue + 90, and primary hue + 180)
 *
 * All color schemes use the same primary hue and global hue saturation settings, which means that the overall
 * feel of the color scheme is consistent across all schemes, with the action and accent colors providing the variation.
 *
 * All color schemes included all action and accent colors, even if they are not used in a particular scheme. This
 * allows for flexibility in design and potential future use of different color schemes on different sections of the site.
 *
 * The colors are separated into functions so that they can be output in different contexts (Customizer preview vs.
 * front-end, for example).
 */

/**
 * The root color scheme styles
 */
function volatyl_root_color_scheme_base() {

	// This hue controls the entire color scheme
	$primary_hue = get_theme_mod( 'volatyl_primary_hue', DEFAULT_PRIMARY_HUE );

	// This percentage controls the default saturation of all non-subdued colors
	$global_hue_saturation = get_theme_mod( 'volatyl_global_hue_saturation', DEFAULT_GLOBAL_HUE_SATURATION );

	// OKLCH chroma derived from the saturation setting (0–100 maps to 0–0.25)
	$global_chroma = round( $global_hue_saturation * 0.0025, 4 );

	// Based on global hue saturation, this controls the lightness of text
	// and similar elements rendered against dark backgrounds
	$dark_bg_light_color  = '100';
	if ( $global_hue_saturation <= 33 ) {
		$dark_bg_light_color = '86';
	} elseif ( ( $global_hue_saturation >= 34 ) && ( $global_hue_saturation <= 67 ) ) {
		$dark_bg_light_color = '93';
	}

	return ":root {
		--global-hue-saturation: {$global_hue_saturation}%;
		--global-chroma: {$global_chroma};
		--on-dark-luminance: {$dark_bg_light_color}%;

		/* Primary hue and default colors based on the primary hue */
		--primary-hue: {$primary_hue};
		--primary: oklch(55% .25 var(--primary-hue));
		--primary-light: oklch(75% .25 var(--primary-hue));
		--primary-dark: oklch(30% .25 var(--primary-hue));
		--primary-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--primary-hue));
		--text: oklch(20% var(--global-chroma) var(--primary-hue));

		/* Backgrounds */
		--dark: oklch(15% var(--global-chroma) var(--primary-hue));
		--darker: oklch(12% var(--global-chroma) var(--primary-hue));

		/* Subdued colors */
		--subdued-light: oklch(91% 0.015 var(--primary-hue));
		--subdued-dark: oklch(44% 0.04 var(--primary-hue));

		/* Miscellaneous */
		--on-dark: oklch(var(--on-dark-luminance) calc(var(--global-chroma) * 0.5) var(--primary-hue));
--white: #fff;
		--translucent-light: rgba(255,255,255,.05);
		--translucent-dark: rgba(0,0,0,.05);

		/* Action and Accent Colors derived from the primary hue - overridden by different color schemes */
		/* Technically, this is the monochromatic color scheme */
		--action: oklch(55% .25 var(--primary-hue));
		--action-light: oklch(75% .25 var(--primary-hue));
		--action-dark: oklch(30% .25 var(--primary-hue));
		--action-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--primary-hue));
		--accent: oklch(55% .25 var(--primary-hue));
		--accent-light: oklch(75% .25 var(--primary-hue));
		--accent-dark: oklch(30% .25 var(--primary-hue));
		--accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--primary-hue));
		--extra-accent: oklch(55% .25 var(--primary-hue));
		--extra-accent-light: oklch(75% .25 var(--primary-hue));
		--extra-accent-dark: oklch(30% .25 var(--primary-hue));
		--extra-accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--primary-hue));

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
 * Root color scheme complementary
 */
function volatyl_root_color_scheme_complementary( $scheme_wrapper = true ): string {
	$scheme = ":root {";
	$scheme .= $scheme_wrapper ? '.complementary-color-scheme {' : '';
	$scheme .= "
			--action: oklch(55% .25 var(--complementary-accent-hue));
			--action-light: oklch(75% .25 var(--complementary-accent-hue));
			--action-dark: oklch(30% .25 var(--complementary-accent-hue));
			--action-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--complementary-accent-hue));
			--accent: oklch(55% .25 var(--complementary-accent-hue));
			--accent-light: oklch(75% .25 var(--complementary-accent-hue));
			--accent-dark: oklch(30% .25 var(--complementary-accent-hue));
			--accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--complementary-accent-hue));
			--extra-accent: oklch(55% .25 var(--complementary-accent-hue));
			--extra-accent-light: oklch(75% .25 var(--complementary-accent-hue));
			--extra-accent-dark: oklch(30% .25 var(--complementary-accent-hue));
			--extra-accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--complementary-accent-hue));";
	$scheme .= $scheme_wrapper ? '}' : '';
	$scheme .= "}";
	return $scheme;
}

/**
 * Root color scheme analogous
 */
function volatyl_root_color_scheme_analogous( $scheme_wrapper = true ): string {
	$scheme = ":root {";
	$scheme .= $scheme_wrapper ? '.analogous-color-scheme {' : '';
	$scheme .= "
			--action: oklch(55% .25 var(--analogous-accent-hue-1));
			--action-light: oklch(75% .25 var(--analogous-accent-hue-1));
			--action-dark: oklch(30% .25 var(--analogous-accent-hue-1));
			--action-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--analogous-accent-hue-1));
			--accent: oklch(55% .25 var(--analogous-accent-hue-2));
			--accent-light: oklch(75% .25 var(--analogous-accent-hue-2));
			--accent-dark: oklch(30% .25 var(--analogous-accent-hue-2));
			--accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--analogous-accent-hue-2));
			--extra-accent: oklch(55% .25 var(--analogous-accent-hue-2));
			--extra-accent-light: oklch(75% .25 var(--analogous-accent-hue-2));
			--extra-accent-dark: oklch(30% .25 var(--analogous-accent-hue-2));
			--extra-accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--analogous-accent-hue-2));";
	$scheme .= $scheme_wrapper ? '}' : '';
	$scheme .= "}";
	return $scheme;
}

/**
 * Root color scheme triadic
 */
function volatyl_root_color_scheme_triadic( $scheme_wrapper = true ): string {
	$scheme = ":root {";
	$scheme .= $scheme_wrapper ? '.triadic-color-scheme {' : '';
	$scheme .= "
			--action: oklch(55% .25 var(--triadic-accent-hue-1));
			--action-light: oklch(75% .25 var(--triadic-accent-hue-1));
			--action-dark: oklch(30% .25 var(--triadic-accent-hue-1));
			--action-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--triadic-accent-hue-1));
			--accent: oklch(55% .25 var(--triadic-accent-hue-2));
			--accent-light: oklch(75% .25 var(--triadic-accent-hue-2));
			--accent-dark: oklch(30% .25 var(--triadic-accent-hue-2));
			--accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--triadic-accent-hue-2));
			--extra-accent: oklch(55% .25 var(--triadic-accent-hue-2));
			--extra-accent-light: oklch(75% .25 var(--triadic-accent-hue-2));
			--extra-accent-dark: oklch(30% .25 var(--triadic-accent-hue-2));
			--extra-accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--triadic-accent-hue-2));";
	$scheme .= $scheme_wrapper ? '}' : '';
	$scheme .= "}";
	return $scheme;
}

/**
 * Root color scheme split_complementary
 */
function volatyl_root_color_scheme_split_complementary( $scheme_wrapper = true ): string {
	$scheme = ":root {";
	$scheme .= $scheme_wrapper ? '.split_complementary-color-scheme {' : '';
	$scheme .= "
			--action: oklch(55% .25 var(--split-complementary-accent-hue-1));
			--action-light: oklch(75% .25 var(--split-complementary-accent-hue-1));
			--action-dark: oklch(30% .25 var(--split-complementary-accent-hue-1));
			--action-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--split-complementary-accent-hue-1));
			--accent: oklch(55% .25 var(--split-complementary-accent-hue-2));
			--accent-light: oklch(75% .25 var(--split-complementary-accent-hue-2));
			--accent-dark: oklch(30% .25 var(--split-complementary-accent-hue-2));
			--accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--split-complementary-accent-hue-2));
			--extra-accent: oklch(55% .25 var(--split-complementary-accent-hue-2));
			--extra-accent-light: oklch(75% .25 var(--split-complementary-accent-hue-2));
			--extra-accent-dark: oklch(30% .25 var(--split-complementary-accent-hue-2));
			--extra-accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--split-complementary-accent-hue-2));";
	$scheme .= $scheme_wrapper ? '}' : '';
	$scheme .= "}";
	return $scheme;
}

/**
 * Root color scheme tetradic
 */
function volatyl_root_color_scheme_tetradic( $scheme_wrapper = true ): string {
	$scheme = ":root {";
	$scheme .= $scheme_wrapper ? '.tetradic-color-scheme {' : '';
	$scheme .= "
			--action: oklch(55% .25 var(--tetradic-accent-hue-1));
			--action-light: oklch(75% .25 var(--tetradic-accent-hue-1));
			--action-dark: oklch(30% .25 var(--tetradic-accent-hue-1));
			--action-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--tetradic-accent-hue-1));
			--accent: oklch(55% .25 var(--tetradic-accent-hue-2));
			--accent-light: oklch(75% .25 var(--tetradic-accent-hue-2));
			--accent-dark: oklch(30% .25 var(--tetradic-accent-hue-2));
			--accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--tetradic-accent-hue-2));
			--extra-accent: oklch(55% .25 var(--tetradic-accent-hue-3));
			--extra-accent-light: oklch(75% .25 var(--tetradic-accent-hue-3));
			--extra-accent-dark: oklch(30% .25 var(--tetradic-accent-hue-3));
			--extra-accent-tint: oklch(97.5% calc(var(--global-chroma) * 0.05) var(--tetradic-accent-hue-3));";
	$scheme .= $scheme_wrapper ? '}' : '';
	$scheme .= "}";
	return $scheme;
}