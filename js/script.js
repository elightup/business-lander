jQuery( function ( $ ) {
	var $window = $( window ),
		$body = $( 'body' ),
	$mobileMenu = $( '.mobile-navigation' );

	/**
	 * Collapse
	 */
	function toggleCollapse() {
		$( '[data-toggle="collapse"]' ).on( 'click', function ( e ) {
			e.preventDefault();
			$( '#site-search' ).slideToggle( 300 ).find( 'input' ).focus();
		} );
		$( '.menu-toggle' ).on( 'click', function () {
			$mobileMenu.slideToggle();
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
		$window.on( 'resize', function () {
			if ( $window.width() > 992 ) {
				$mobileMenu.hide();
			}
		} )
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
