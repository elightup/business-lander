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
		'header_address' : '.site-address p',
		'header_phone' : '.site-phone p',
		'header_email' : '.site-email p',
		'services_section_title' : '.services--title',
		'cta_title'  : '.section--cta .section-cta__title',
		'cta_text'  : '.section--cta .section-cta__text',
		'cta_button_text':'.section--cta .section-cta__link a',
		'featured_page_1' : '.featured-page-1 .featured-page',
	};

	// Use each to resolve closure problem.
	$.each( options, function ( setting, selector ) {
		wp.customize( setting, function( value ) {
			value.bind( function ( to ) {
				$( selector ).html( to );
			} );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
