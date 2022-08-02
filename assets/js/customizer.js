/* global wp, jQuery */
/**
 * Customizer behavior
 */
( function( $ ) {

	// Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site description
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.front-page .hero-title' ).text( to );
		} );
	} );

}( jQuery ) );
