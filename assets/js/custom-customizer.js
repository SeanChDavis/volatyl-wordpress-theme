/**
 * Theme Customizer scripts.
 */
( function( $ ) {

	/**
	 * Color palette preview panel toggle.
	 * Sends panel visibility to the preview iframe via the Customizer messenger.
	 * State persists in localStorage across sessions.
	 */
	var palettePanelVisible = localStorage.getItem( 'volatyl_palette_preview' ) !== 'false';

	function sendPanelState() {
		wp.customize.previewer.send( 'volatyl-palette-panel', { visible: palettePanelVisible } );
	}

	// Resend current state each time the preview iframe finishes loading.
	wp.customize.previewer.bind( 'ready', sendPanelState );

	$( document ).ready( function() {

		// Wire up checkbox once DOM is ready.
		$( document ).on( 'change', '#volatyl-palette-preview-toggle', function() {
			palettePanelVisible = this.checked;
			localStorage.setItem( 'volatyl_palette_preview', palettePanelVisible );
			sendPanelState();
		} );

		// Set checkbox state whenever the Color Scheme section is expanded
		// (the control is always in the DOM but the section may not have been
		// visited yet when the page loads).
		wp.customize.section( 'volatyl_color_scheme', function ( section ) {
			section.expanded.bind( function ( isExpanded ) {
				if ( isExpanded ) {
					var cb = document.getElementById( 'volatyl-palette-preview-toggle' );
					if ( cb ) { cb.checked = palettePanelVisible; }
				}
			} );
		} );

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