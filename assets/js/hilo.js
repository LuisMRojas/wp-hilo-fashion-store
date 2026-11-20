/* Hilo — interacciones ligeras sin dependencias. */
( function () {
	// Sombra en la cabecera al hacer scroll.
	var header = document.querySelector( '.hilo-header' );
	if ( header ) {
		var onScroll = function () {
			header.classList.toggle( 'is-scrolled', window.scrollY > 8 );
		};
		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll();
	}

	// Lookbook: en pantallas táctiles, el punto abre/cierra su tarjeta.
	document.querySelectorAll( '.hilo-spot__dot' ).forEach( function ( dot ) {
		dot.addEventListener( 'click', function ( e ) {
			e.preventDefault();
			var spot = dot.closest( '.hilo-spot' );
			var open = spot.classList.contains( 'is-open' );
			document.querySelectorAll( '.hilo-spot.is-open' ).forEach( function ( s ) {
				s.classList.remove( 'is-open' );
				s.querySelector( '.hilo-spot__dot' ).setAttribute( 'aria-expanded', 'false' );
			} );
			if ( ! open ) {
				spot.classList.add( 'is-open' );
				dot.setAttribute( 'aria-expanded', 'true' );
			}
		} );
	} );
	document.addEventListener( 'click', function ( e ) {
		if ( ! e.target.closest( '.hilo-spot' ) ) {
			document.querySelectorAll( '.hilo-spot.is-open' ).forEach( function ( s ) {
				s.classList.remove( 'is-open' );
			} );
		}
	} );

	// Newsletter de demostración: evita el envío real y confirma visualmente.
	document.querySelectorAll( '.hilo-newsletter form' ).forEach( function ( form ) {
		form.addEventListener( 'submit', function ( e ) {
			e.preventDefault();
			form.innerHTML = '<p style="margin:0 auto">¡Gracias! Revisa tu correo para confirmar la suscripción.</p>';
		} );
	} );
} )();
