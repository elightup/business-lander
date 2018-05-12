jQuery( function ( $ ) {
	var $window      = $( window ),
	$mobileMenu      = $( '.mobile-navigation' ),
	$mainMenu        = $( '.main-navigation' ),
	$site_navigation = $( '#site-navigation' ),
	$primary_menu    = $( '#primary-menu' );

	/**
	 * Collapse
	 */
	 function toggleCollapse() {
	 	$( '.menu-toggle' ).on( 'click', function () {
	 		$site_navigation.removeClass( 'main-navigation' );
	 		$site_navigation.addClass( 'mobile-navigation' );
	 		$primary_menu.removeClass( 'menu' );
	 		$primary_menu.addClass( 'mobile-menu' );
	 		$primary_menu.addClass( 'clear-fix' );
	 		$( '.mobile-navigation' ).toggle();

	 	} );
	 }

	/**
	 * Site nav
	 */
	 function menuClick() {
		//Add arrow icon to the li.
		var $dropdownToggle = $( '<span class="dropToggle fas fa-caret-down"></span>' );
		$primary_menu.find( 'li' ).has( 'ul' )
		.children( 'a' )
		.after( $dropdownToggle );

		$( '.dropToggle' ).on( 'click', function( e ) {
			$( this ).toggleClass( 'is-toggled' )
			.next( '.sub-menu' )
			.toggle();
			e.stopPropagation();
		} );
	}

	function hideMobileMenuOnDesktops() {


		if ( $window.width() < 992 ) {
			$mainMenu.hide();
		}

		$window.on( 'resize', function () {
			if ( $window.width() > 992 ) {
				$mobileMenu.hide();
				$mainMenu.show();
				$site_navigation.removeClass( 'mobile-navigation' );
				$site_navigation.addClass( 'main-navigation' );
				$primary_menu.addClass( 'menu' );
				$primary_menu.removeClass( 'mobile-menu' );
				$primary_menu.removeClass( 'clear-fix' );
			}
			if ( $window.width() < 992 ) {
				$mainMenu.hide();
				$mobileMenu.show();
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
	 		autoplaySpeed: 3000
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

