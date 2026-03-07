/* global wp, jQuery */
/**
 * Customizer behavior
 */
( function( $ ) {

	/**
	 * Site Identity
	 */
	// Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	// Front page hero title
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .blog-description' ).text( to );
		} );
	} );

	/**
	 * HTML Structure
	 */
	wp.customize( 'volatyl_full_width_structure', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).toggleClass( 'full-width-structure', to );
		} );
	} );

	/**
	 * Color Scheme
	 */
	// Primary hue
	wp.customize( 'volatyl_primary_hue', function( value ) {
		value.bind( function( to ) {
			document.documentElement.style.setProperty( '--primary-hue', to );
		} );
	} );
	// Global hue saturation
	wp.customize( 'volatyl_global_hue_saturation', function( value ) {
		value.bind( function( to ) {
			document.documentElement.style.setProperty( '--global-hue-saturation', to + '%' );

			let darkBgLightColor = '100';
			if ( to <= 33 ) {
				darkBgLightColor = '84';
			} else if ( to >= 34 && to <= 67 ) {
				darkBgLightColor = '92';
			}
			document.documentElement.style.setProperty( '--dark-background-light-color-luminance', darkBgLightColor + '%' );
		} );
	} );
	// Color scheme type
	wp.customize( 'volatyl_color_scheme_type', function( value ) {
		value.bind( function( to ) {
			$( 'body' )
				.removeClass( 'monochromatic-color-scheme complementary-color-scheme analogous-color-scheme triadic-color-scheme split_complementary-color-scheme tetradic-color-scheme' )
				.addClass( to + '-color-scheme' );
		} );
	} );

	/**
	 * Front Page Template
	 */
	// Front page dark header & hero background
	wp.customize( 'volatyl_front_page_hero_dark', function( value ) {
		value.bind( function( to ) {
			$( '.front-page #masthead, .front-page .content-header' )
				.toggleClass( 'v-dark-background', to )
				.toggleClass( 'v-gray-background', !to );
		} );
	} );
	// Front page hero centered
	wp.customize( 'volatyl_front_page_hero_centered', function( value ) {
		value.bind( function( to ) {
			$( '.front-page .content-header' ).toggleClass( 'v-text-align-center', to );
		} );
	} );
	// Front page hero title
	wp.customize( 'front_page_hero_title', function( value ) {
		value.bind( function( to ) {
			$( '.front-page .content-header-title' ).text( to );
		} );
	} );
	// Front page hero description
	wp.customize( 'front_page_hero_description', function( value ) {
		value.bind( function( to ) {
			$( '.front-page .content-header-description' ).text( to );
		} );
	} );
	// Front page hero primary CTA button URL
	wp.customize( 'volatyl_front_page_hero_primary_cta_button_url', function( value ) {
		value.bind( function( to ) {
			$( '.front-page .content-header-primary-cta a' ).attr( 'href', to );
		} );
	} );
	// Front page hero secondary CTA button URL
	wp.customize( 'volatyl_front_page_hero_secondary_cta_button_url', function( value ) {
		value.bind( function( to ) {
			$( '.front-page .content-header-secondary-cta a' ).attr( 'href', to );
		} );
	} );

}( jQuery ) );
