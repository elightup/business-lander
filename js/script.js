jQuery( function ( $ ) {
	var $window = $( window ),
	$body = $( 'body' );
	$mobileMenu = $( '.mobile-navigation' );
	$mainMenu = $( '.main-navigation' );

	/**
	 * Collapse
	 */
	 function toggleCollapse() {
	 	$( '[data-toggle="collapse"]' ).on( 'click', function ( e ) {
	 		e.preventDefault();
	 		$( '#site-search' ).slideToggle( 300 ).find( 'input' ).focus();
	 	} );
	 	$( '.menu-toggle' ).on( 'click', function () {
	 		$( '#site-navigation' ).removeClass( 'main-navigation' );
	 		$( '#site-navigation' ).addClass( 'mobile-navigation' );
	 		$( '#primary-menu' ).removeClass( 'menu' );
	 		$( '#primary-menu' ).addClass( 'mobile-menu' );
	 		$( '#primary-menu' ).addClass( 'clear-fix' );
	 		$( '.mobile-navigation' ).slideToggle();
	 	} );
	 }

	/**
	 * Site nav
	 */
	 function menuClick() {
		//Add arrow icon to the li.
		var $dropdownToggle = $( '<span class="dropToggle fa fa-angle-down"></span>' );
		$( '.mobile-menu' ).find( 'li' ).has( 'ul' )
		.children( 'a' )
		.after( $dropdownToggle );

		$( '.dropToggle' ).on( 'click', function( e ) {
			$( this ).toggleClass( 'is-toggled' )
			.next( '.sub-menu' )
			.slideToggle();
			e.stopPropagation();
		} );
	}

	function hideMobileMenuOnDesktops() {
		if ( $window.width() > 992 ) {
			$mobileMenu.hide();
			$mainMenu.show();
		}
		if ( $window.width() < 992 ) {
			$mainMenu.hide();
		}
		$window.on( 'resize', function () {
			if ( $window.width() > 992 ) {
				$mobileMenu.hide();
				$mainMenu.show();
				$( '#site-navigation' ).removeClass( 'mobile-navigation' );
				$( '#site-navigation' ).addClass( 'main-navigation' );
				$( '#primary-menu' ).addClass( 'menu' );
				$( '#primary-menu' ).removeClass( 'mobile-menu' );
				$( '#primary-menu' ).removeClass( 'clear-fix' );
			}
			if ( $window.width() < 992 ) {
				$mainMenu.hide();
			}
		} );

	}

	/**
	 * Homepage testimonial slider.
	 */
	 function initTestimonialSlider() {
	 	$( '.testimonial' ).slick( {
	 		speed: 1000,
	 		fade: true,
	 		arrows: false,
	 		dots: true,
	 		slidesToShow: 1,
	 		slidesToScroll: 1,
	 		autoplay: true,
	 		autoplaySpeed: 3000,

	 	} );
	 }

	/**
	 * Scroll to top
	 */
	 function scrollToTop() {
	 	var $window = $( window ),
	 	$button = $( '.scroll-to-top' );
	 	$window.on( 'scroll', function () {
	 		$button[$window.scrollTop() > 100 ? 'removeClass' : 'addClass']( 'hidden' );
	 	} );
	 	$button.on( 'click', function ( e ) {
	 		e.preventDefault();
	 		$( 'body, html' ).animate( {
	 			scrollTop: 0
	 		}, 500 );
	 	} );
	 }

	 if ( $().slick ) {
	 	initTestimonialSlider();

	 }

	 toggleCollapse();
	 menuClick();
	 hideMobileMenuOnDesktops();
	 scrollToTop()
	} );

