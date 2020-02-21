/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	var options = {
		'blogname': '.site-title a',
		'blogdescription': '.site-description',
		'header_address': '.site-address p',
		'header_phone': '.site-phone p',
		'header_email': '.site-email p',
		'services_section_title': '.services--title',
		'cta_subtitle': '.section--cta .section-cta__subtitle',
		'cta_title': '.section--cta .section-cta__title',
		'cta_button_text': '.section--cta .section-cta__link a'
	};

	// Use each to resolve closure problem.
	$.each( options, function ( setting, selector ) {
		wp.customize( setting, function ( value ) {
			value.bind( function ( to ) {
				$( selector ).html( to );
			} );
		} );
	} );

	wp.customize( 'footer_copyright', function ( value ) {
		value.bind( function ( to ) {
			$( '.bottombar .container > span' ).html( to );
		} );
	} );
} )( jQuery );
