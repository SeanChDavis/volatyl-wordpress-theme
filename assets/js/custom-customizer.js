/**
 * Theme Customizer scripts.
 */
( function( $ ) {

	$( document ).ready( function() {

		$( '.volatyl-toggle-description' ).on( 'click', function( e ) {
			e.preventDefault();
			$( this ).toggleClass( 'volatyl-description-opened' ).parents( '.customize-control-title' ).siblings( '.volatyl-control-description' ).slideToggle();
		});

	});

})( jQuery );