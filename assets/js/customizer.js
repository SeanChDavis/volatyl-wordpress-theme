/* global wp, jQuery */
/**
 * Customizer behavior
 */
( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.front-page .hero-title' ).text( to );
		} );
	} );
}( jQuery ) );
