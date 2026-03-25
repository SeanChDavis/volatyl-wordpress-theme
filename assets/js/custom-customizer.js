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

	// Wait for the customizer to fully boot before touching previewer or sections.
	wp.customize.bind( 'ready', function() {

		// Resend current state each time the preview iframe finishes loading.
		wp.customize.previewer.bind( 'ready', sendPanelState );

		// Sync checkbox state whenever the Color Scheme section is expanded.
		wp.customize.section( 'volatyl_color_scheme', function ( section ) {
			section.expanded.bind( function ( isExpanded ) {
				if ( isExpanded ) {
					var cb = document.getElementById( 'volatyl-palette-preview-toggle' );
					if ( cb ) { cb.checked = palettePanelVisible; }
				}
			} );
		} );

	} );

	$( document ).ready( function() {

		// ── Hex-to-hue helper ──────────────────────────────────────────────────

		// Math.cbrt polyfill for safety
		Math.cbrt = Math.cbrt || function ( x ) {
			return Math.sign( x ) * Math.pow( Math.abs( x ), 1 / 3 );
		};

		/**
		 * Convert a 6-digit hex color to OKLCH.
		 * Returns { C, H } or null if the hex is invalid.
		 * Uses Björn Ottosson's sRGB → OKLab matrices.
		 */
		function hexToOklch( hex ) {
			hex = hex.replace( /^#/, '' );
			if ( !/^[0-9a-fA-F]{6}$/.test( hex ) ) { return null; }

			var r = parseInt( hex.slice( 0, 2 ), 16 ) / 255;
			var g = parseInt( hex.slice( 2, 4 ), 16 ) / 255;
			var b = parseInt( hex.slice( 4, 6 ), 16 ) / 255;

			// sRGB gamma → linear light
			function lin( c ) { return c <= 0.04045 ? c / 12.92 : Math.pow( ( c + 0.055 ) / 1.055, 2.4 ); }
			r = lin( r ); g = lin( g ); b = lin( b );

			// Linear RGB → OKLab
			var l = Math.cbrt( 0.4122214708 * r + 0.5363325363 * g + 0.0514459929 * b );
			var m = Math.cbrt( 0.2119034982 * r + 0.6806995451 * g + 0.1073969566 * b );
			var s = Math.cbrt( 0.0883024619 * r + 0.2817188376 * g + 0.6299787005 * b );
			var A = 1.9779984951 * l - 2.4285922050 * m + 0.4505937099 * s;
			var B = 0.0259040371 * l + 0.7827717662 * m - 0.8086757660 * s;

			var C = Math.sqrt( A * A + B * B );
			var H = Math.atan2( B, A ) * ( 180 / Math.PI );
			if ( H < 0 ) { H += 360; }
			return { C: C, H: Math.round( H ) };
		}

		// Update swatch live as the user types — no hue extraction yet
		$( document ).on( 'input', '#volatyl-hex-input', function () {
			var val = this.value.trim();
			if ( val && val[ 0 ] !== '#' ) { val = '#' + val; }
			$( '#volatyl-hex-warning' ).hide();
			$( this ).removeClass( 'is-valid is-invalid' );
			$( '#volatyl-hex-swatch' ).css( 'background', /^#[0-9a-fA-F]{6}$/.test( val ) ? val : '#e0e0e0' );
		} );

		// Apply hue on Enter or blur
		$( document ).on( 'blur keydown', '#volatyl-hex-input', function ( e ) {
			if ( e.type === 'keydown' && e.key !== 'Enter' ) { return; }
			var val = this.value.trim();
			if ( ! val ) { return; }
			if ( val[ 0 ] !== '#' ) { val = '#' + val; }

			var $input   = $( this );
			var $warning = $( '#volatyl-hex-warning' );
			var result   = hexToOklch( val );

			if ( ! result ) {
				$input.addClass( 'is-invalid' ).removeClass( 'is-valid' );
				return;
			}
			if ( result.C < 0.05 ) {
				$warning.show();
				$input.addClass( 'is-invalid' ).removeClass( 'is-valid' );
				return;
			}

			$warning.hide();
			$input.addClass( 'is-valid' ).removeClass( 'is-invalid' );

			// Push the extracted hue to the setting and snap the slider
			wp.customize( 'volatyl_primary_hue' ).set( result.H );
			$( '#customize-control-volatyl_primary_hue input[type="range"]' ).val( result.H );
		} );

		// ──────────────────────────────────────────────────────────────────────

		// Wire up checkbox once DOM is ready.
		$( document ).on( 'change', '#volatyl-palette-preview-toggle', function() {
			palettePanelVisible = this.checked;
			localStorage.setItem( 'volatyl_palette_preview', palettePanelVisible );
			sendPanelState();
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