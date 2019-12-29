jQuery( function ( $ ) {
	'use strict';
	
	// Mobile Menu
	var sknav_id = $( ".primary-menu" );
	var sknav_btn = $( '.slicknav_btn' );
	
	sknav_id.slicknav( {
		label: '',
		appendTo: ".mobile_menu",
		openedSymbol: '<i class="fas fa-minus-circle"></i>',
		closedSymbol: '<i class="fas fa-plus-circle"></i>',
		removeClasses: true,
		allowParentLinks: true,
	} );
	
	sknav_btn.click( function () {
		$( this ).children( '.fas' ).toggleClass( 'fa-times fa-bars' );
		sknav_id.slicknav( 'toggle' );
	} );
	
	// Allow smooth scroll
	$( '.page-scroller' ).on( 'click', function ( e ) {
		e.preventDefault();
		var target = this.hash;
		var $target = $( target );
		$( 'html, body' ).animate( {
			'scrollTop': $target.offset().top
		}, 1000, 'swing' );
	} );
	
} );
