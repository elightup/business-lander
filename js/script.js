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
			var $this = $( this );
			$this.toggleClass( 'menu-toggle--close' );
			if ( $this.hasClass( 'menu-toggle--close' ) ) {
				$this.text( $this.attr( 'data-close-text' ) );
			} else {
				$this.text( $this.attr( 'data-open-text' ) );
			}
			$site_navigation.removeClass( 'main-navigation' );
			$site_navigation.addClass( 'mobile-navigation' );
			$primary_menu.removeClass( 'menu' );
			$primary_menu.addClass( 'mobile-menu' );
			$primary_menu.addClass( 'clear-fix' );
			$( '.mobile-navigation' ).toggle();

		} );
	}

	function handleMenuAccessibility() {
		$( document ).on( 'keydown', function( e ) {
			var activeElement = document.activeElement;
			var menuItems = $( '#site-navigation .menu-item > a' );
			var firstEl = $( '.menu-toggle' );
			var lastEl = menuItems[ menuItems.length - 1 ];
			var tabKey = event.keyCode === 9;
			var shiftKey = event.shiftKey;
			if ( ! shiftKey && tabKey && lastEl === activeElement ) {
				event.preventDefault();
				firstEl.focus();
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
	scrollToTop();
	handleMenuAccessibility();
} );
