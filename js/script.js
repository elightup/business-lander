jQuery( function ( $ ) {
	var $window      = $( window ),
	$site_navigation = $( '#site-navigation' ),
	$menuToggle      = $( '.menu-toggle' ),
	$primary_menu    = $( '#primary-menu' );

	/**
	 * Collapse
	 */
	function toggleCollapse() {
		$menuToggle.on( 'click', function () {
			$( 'body' ).toggleClass( 'enable-mobile-menu' );
			$site_navigation.toggleClass( 'mobile-navigation' );
			$( '.menu-toggle' ).focus();
		} );
	}

	function handleMenuAccessibility() {
		var menuItems = $( '#site-navigation .menu-item > a' );
		var lastEl = menuItems[ menuItems.length - 1 ];

		$( document ).on( 'keydown', function( e ) {
			if ( $window.width() > 992 ) {
				return;
			}
			var keyCode = (window.event) ? e.which : e.keyCode;

			var tabKey = keyCode === 9;
			var shiftKey = event.shiftKey;

			var activeElement = document.activeElement;

			if ( ! shiftKey && tabKey && lastEl === activeElement ) {
				e.preventDefault();
				$( '.menu-toggle' ).focus();
			}

			closeSubmenuBeforeGoNext( $( activeElement ) );
		} );
	}

	function closeSubmenuBeforeGoNext( $activeLink ) {
		var attr = $activeLink.attr( 'href' );
		if ( typeof attr === typeof undefined || attr === false || ! $activeLink.closest( '.menu-item' ).length ) {
			return;
		}
		var li = $activeLink.closest( '.menu-item' );
		if ( ! li.length ) {
			return;
		}
		var subMenu = li.closest( '.sub-menu' );
		var subMenuLi = subMenu.children( '.menu-item' );
		if ( subMenuLi[ subMenuLi.length - 1 ] === li.get( 0 ) ) {
			subMenu.hide();
		}
	}

	/**
	 * Site nav
	 */
	function menuClick() {
		//Add arrow icon to the li.
		var $dropdownToggle = $( '<button class="dropToggle fas fa-caret-down" aria-expanded="true"></button>' );
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
		$window.on( 'resize', function () {
			if ( $window.width() > 992 ) {
				$site_navigation.removeClass( 'mobile-navigation' );
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
	scrollToTop();
	handleMenuAccessibility();
} );
