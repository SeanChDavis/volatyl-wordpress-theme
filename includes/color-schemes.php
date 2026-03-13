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

	// Based on global hue saturation percentage, this color sets the
	// luminance of basic text and similar elements against dark backgrounds
	$dark_bg_light_color  = '100';
	if ( $global_hue_saturation <= 33 ) {
		$dark_bg_light_color = '84';
	} elseif ( ( $global_hue_saturation >= 34 ) && ( $global_hue_saturation <= 67 ) ) {
		$dark_bg_light_color = '92';
	}

	return ":root {
		--global-hue-saturation: {$global_hue_saturation}%;
		--light-text-over-dark-luminance: {$dark_bg_light_color}%;

		/* Primary hue and default colors based on the primary hue */
		--primary-hue: {$primary_hue};
		--primary-hue_dark: hsl(var(--primary-hue) var(--global-hue-saturation) 18.5%);
	
		/* Backgrounds */
		--gray-background: hsl(var(--primary-hue) calc(var(--global-hue-saturation) * .3) 96.5%);
		--dark-background: var(--primary-hue_dark);
		--darker-background: hsl(var(--primary-hue) var(--global-hue-saturation) 15.5%);
	
		/* Subdued colors */
		--subdued-light: hsl(var(--primary-hue) 10% 91%);
		--subdued-dark: hsl(var(--primary-hue) 20% 32%);
		
		/* Miscellaneous */
		--light-text-over-dark: hsl(var(--primary-hue) var(--global-hue-saturation) var(--light-text-over-dark-luminance));
		--menu-background: var(--darker-background);
		--white: #fff;
		--translucent-light: rgba(255,255,255,.05);
		--translucent-dark: rgba(0,0,0,.05);
		
		/* Action and Accent Colors derived from the primary hue - overridden by different color schemes */
		/* Technically, this is the monochromatic color scheme */
		--action: hsl(var(--primary-hue) var(--global-hue-saturation) 32%);
		--action-dark: hsl(var(--primary-hue) var(--global-hue-saturation) 24%);
		--accent: hsl(var(--primary-hue) var(--global-hue-saturation) 32%);
		--accent-dark: hsl(var(--primary-hue) var(--global-hue-saturation) 24%);
		--extra-accent: hsl(var(--primary-hue) var(--global-hue-saturation) 32%);
		--extra-accent-dark: hsl(var(--primary-hue) var(--global-hue-saturation) 24%);

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
			--action: hsl(var(--complementary-accent-hue) var(--global-hue-saturation) 32%);
			--action-dark: hsl(var(--complementary-accent-hue) var(--global-hue-saturation) 24%);
			--accent: hsl(var(--complementary-accent-hue) var(--global-hue-saturation) 32%);
			--accent-dark: hsl(var(--complementary-accent-hue) var(--global-hue-saturation) 24%);
			--extra-accent: hsl(var(--complementary-accent-hue) var(--global-hue-saturation) 32%);
			--extra-accent-dark: hsl(var(--complementary-accent-hue) var(--global-hue-saturation) 24%);";
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
			--action: hsl(var(--analogous-accent-hue-1) var(--global-hue-saturation) 32%);
			--action-dark: hsl(var(--analogous-accent-hue-1) var(--global-hue-saturation) 24%);
			--accent: hsl(var(--analogous-accent-hue-2) var(--global-hue-saturation) 32%);
			--accent-dark: hsl(var(--analogous-accent-hue-2) var(--global-hue-saturation) 24%);
			--extra-accent: hsl(var(--analogous-accent-hue-2) var(--global-hue-saturation) 32%);
			--extra-accent-dark: hsl(var(--analogous-accent-hue-2) var(--global-hue-saturation) 24%);";
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
			--action: hsl(var(--triadic-accent-hue-1) var(--global-hue-saturation) 32%);
			--action-dark: hsl(var(--triadic-accent-hue-1) var(--global-hue-saturation) 24%);
			--accent: hsl(var(--triadic-accent-hue-2) var(--global-hue-saturation) 32%);
			--accent-dark: hsl(var(--triadic-accent-hue-2) var(--global-hue-saturation) 24%);
			--extra-accent: hsl(var(--triadic-accent-hue-2) var(--global-hue-saturation) 32%);
			--extra-accent-dark: hsl(var(--triadic-accent-hue-2) var(--global-hue-saturation) 24%);";
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
			--action: hsl(var(--split-complementary-accent-hue-1) var(--global-hue-saturation) 32%);
			--action-dark: hsl(var(--split-complementary-accent-hue-1) var(--global-hue-saturation) 24%);
			--accent: hsl(var(--split-complementary-accent-hue-2) var(--global-hue-saturation) 32%);
			--accent-dark: hsl(var(--split-complementary-accent-hue-2) var(--global-hue-saturation) 24%);
			--extra-accent: hsl(var(--split-complementary-accent-hue-2) var(--global-hue-saturation) 32%);
			--extra-accent-dark: hsl(var(--split-complementary-accent-hue-2) var(--global-hue-saturation) 24%);";
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
			--action: hsl(var(--tetradic-accent-hue-1) var(--global-hue-saturation) 32%);
			--action-dark: hsl(var(--tetradic-accent-hue-1) var(--global-hue-saturation) 24%);
			--accent: hsl(var(--tetradic-accent-hue-2) var(--global-hue-saturation) 32%);
			--accent-dark: hsl(var(--tetradic-accent-hue-2) var(--global-hue-saturation) 24%);
			--extra-accent: hsl(var(--tetradic-accent-hue-3) var(--global-hue-saturation) 32%);
			--extra-accent-dark: hsl(var(--tetradic-accent-hue-3) var(--global-hue-saturation) 24%);";
	$scheme .= $scheme_wrapper ? '}' : '';
	$scheme .= "}";
	return $scheme;
}