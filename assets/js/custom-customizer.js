/**
 * Theme Customizer scripts.
 */
( function( $ ) {

	$( document ).ready( function() {

		$( '.volatyl-toggle-description' ).on( 'click', function( e ) {
			e.preventDefault();
			$( this ).toggleClass( 'volatyl-description-opened' ).parents( '.customize-control-title' ).siblings( '.volatyl-control-description' ).slideToggle();
		});

		// Navigate to another Customizer section when a .volatyl-section-link is clicked
		$( document ).on( 'click', '.volatyl-section-link', function( e ) {
			e.preventDefault();
			var section = $( this ).data( 'section' );
			if ( section && wp.customize.section( section ) ) {
				wp.customize.section( section ).focus();
			}
		} );

	});

})( jQuery );