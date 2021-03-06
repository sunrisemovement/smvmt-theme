/**
 * Above Header Header Styling
 *
 * @package smvmt
 * @since 1.0.0
 */

( function() {

	var above_header 	= document.querySelector( '.smvmt-above-header' ),
	above_header_nav 	= document.querySelector( '.smvmt-above-header-navigation' ),
	top_menu_toggle 	= document.querySelector( '.menu-above-header-toggle' ),
	main_menu_toggle 	= document.querySelector( '.main-header-menu-toggle' ),
	below_header_toggle = document.querySelector( '.menu-below-header-toggle' );

	var html                 = document.querySelector( 'html' );
	var __main_header_all    = document.querySelectorAll( '.smvmt-above-header' );
	var menu_toggle_all      = document.querySelectorAll( '.menu-above-header-toggle' );
	var above_header_nav_all = document.querySelectorAll( '.smvmt-above-header-navigation' );

	if ( menu_toggle_all.length > 0 ) {

		for (var i = 0; i < menu_toggle_all.length; i++) {

			menu_toggle_all[i].setAttribute('data-index', i);

			menu_toggle_all[i].addEventListener( 'click', function( event ) {
		    	event.preventDefault();

		    	var event_index = this.getAttribute( 'data-index' );

		    	var menuHasChildren = __main_header_all[event_index].querySelectorAll( '.menu-item-has-children, .page_item_has_children' );
				for ( var i = 0; i < menuHasChildren.length; i++ ) {
					menuHasChildren[i].classList.remove( 'smvmt-submenu-expanded' );
					var menuHasChildrenSubMenu = menuHasChildren[i].querySelectorAll( '.sub-menu, .children' );
					for (var j = 0; j < menuHasChildrenSubMenu.length; j++) {
						menuHasChildrenSubMenu[j].style.display = 'none';
					};
				}

				var menu_class = this.getAttribute('class') || '';

				if ( menu_class.indexOf('menu-above-header-toggle') !== -1 ) {
					toggleClass( __main_header_all[event_index], 'toggle-on' );
					toggleClass( menu_toggle_all[event_index], 'toggled' );
					if ( __main_header_all[event_index].classList.contains( 'toggle-on' ) ) {
						//__main_header_all[event_index].style.display = 'block';
						above_header_nav_all[event_index].style.display = 'block';
						html.classList.add( 'above-header-toggle-on' );
					} else {
						//__main_header_all[event_index].style.display = '';
						above_header_nav_all[event_index].style.display = '';
						html.classList.remove( 'above-header-toggle-on' );
					}

					document.body.classList.add( "smvmt-above-header-nav-open" );
				}

				var elm = document.querySelector( '.smvmt-above-header-navigation' );
				var rect = elm.getBoundingClientRect();
				var vph = Math.max( document.documentElement.clientHeight, window.innerHeight || 0 );

				elm.style.maxHeight = Math.abs( vph - rect.top ) + 'px';

		    }, false);

			if( 'undefined' !== typeof __main_header_all[i] ) {
				var parentList = __main_header_all[i].querySelectorAll( 'ul.smvmt-above-header-menu li' );

				if ( document.querySelector("header.site-header").classList.contains("smvmt-menu-toggle-link") ) {
				 	var smvmt_menu_toggle = __main_header_all[i].querySelectorAll( '.smvmt-header-break-point .smvmt-above-header-menu .smvmt-menu-toggle, .smvmt-header-break-point .smvmt-above-header-menu .menu-item-has-children > a' );
				} else {
	               	var smvmt_menu_toggle = __main_header_all[i].querySelectorAll( 'ul.smvmt-above-header-menu .smvmt-menu-toggle' );
				}

				// Add Eevetlisteners for Submenu.
				if (smvmt_menu_toggle.length > 0) {
					for (var k = 0; k < smvmt_menu_toggle.length; k++) {
						smvmt_menu_toggle[k].addEventListener('click', AstraToggleSubMenu, false);
					};
				}
			}

		};
	} else{
		var __primary_menu = document.querySelectorAll( '.main-header-menu' );
		var __above_main_header_all = document.querySelectorAll( '.smvmt-above-header-menu-items' );
		var above_menu_toggle_all 	= document.querySelectorAll( '.main-header-menu-toggle' );

		if ( above_menu_toggle_all.length > 0 && __above_main_header_all.length > 0 && __primary_menu.length == 0  ) {

			for (var i = 0; i < above_menu_toggle_all.length; i++) {

			 	var smvmt_menu_toggle_above_header = __above_main_header_all[i].querySelectorAll( '.smvmt-menu-toggle' );

				// Add Eventlisteners for Submenu.
				if (smvmt_menu_toggle_above_header.length > 0) {
					for (var k = 0; k < smvmt_menu_toggle_above_header.length; k++) {
						smvmt_menu_toggle_above_header[k].addEventListener('click', AstraToggleSubMenu, false);
					};
				}

			};

		}
	}

	/* Above Header Menu toggle click */
	if ( null != top_menu_toggle ) {

			/* Main Menu toggle click */
		if ( null != main_menu_toggle && null != above_header_nav ) {
			main_menu_toggle.addEventListener( 'click', function( event ) {

				above_header.classList.remove( 'toggle-on' );
				//above_header.style.display = 'none';
				above_header_nav.style.display = 'none';
				if ( null != top_menu_toggle ){
					top_menu_toggle.classList.remove( 'toggled' );
				}
				if ( null != below_header_toggle ) {
					below_header_toggle.classList.remove( 'toggled' );
				}

			}, false);
		}

		top_menu_toggle.addEventListener( 'click', function( event ) {
			event.preventDefault();

			if ( null != main_menu_toggle ) {
				main_menu_toggle.classList.remove( 'toggled' );
			}

			if ( null != below_header_toggle ){
				below_header_toggle.classList.remove( 'toggled' );
			}

			var smvmt_below_header = document.querySelector( '.smvmt-below-header' );
			if ( null != smvmt_below_header ) {

				var smvmt_below_header_nav = document.querySelector( '.smvmt-below-header-actual-nav' );

				smvmt_below_header.classList.remove( 'toggle-on' );
				//smvmt_below_header.style.display = '';

				if ( null != smvmt_below_header_nav ) {
					smvmt_below_header_nav.style.display = '';
				}
			}

			var main_header_bar = document.querySelector( '.main-header-bar-navigation' );
			if ( null != main_header_bar ) {
				main_header_bar.classList.remove( 'toggle-on' );
				main_header_bar.style.display = '';
			}
		}, false);
	}

})();
