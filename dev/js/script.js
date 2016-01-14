/*globals $*/

'use strict';

// // map function
function initialize() {
	var map_canvas = document.getElementById('map_canvas');
	myLatLong = new google.maps.LatLng(51.46746	,  -2.57687);
	var map_options = {
	  center: myLatLong,
	  zoom: 16,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	 }
	/************************************************
	BEWARE!!!!! Removed var from map so it is gloabal
	*************************************************/
	map = new google.maps.Map(map_canvas, map_options)
  	var marker = new google.maps.Marker({
	    position: myLatLong,
	    map: map,
	    title: 'D-Maps'
	 });
  //centers map
  google.maps.event.addDomListener(window, 'resize', function() {
  	map.setCenter(myLatLong);
	});
}


	// =================================
	// SCREEN HEIGHT FUNCTION
	// =================================	

function screenCheck() {
	var screenHeight = window.innerHeight;
	$('body').height(screenHeight);
	var $underlay = $('.underlay');
	$underlay.css({
		'height': screenHeight,
		'width': screenHeight,
		'margin-left': 'auto'
	});
	var $overlay = $('.overlay');
	$overlay.css({
		'height': screenHeight,
		'width': '100%',
		'margin-left': 'auto'
	});
}

$(document).ready(function() {

	// =================================
	// HIDE/SHOW TRACK RECORD
	// =================================	

	var cv = $('#cv');
	cv.hide().css({
		'position': 'absolute',
		'top': '5%',
		'width': '50%',
		'left': '25%',
		'z-index': 300
	});

	$('.cv-button').on('click', function() {
		cv.show();
	});

	$('.close').on('click', function() {
		cv.hide();
	});

	// =================================
	// SET WINDOW SIZES ON RESIZE
	// =================================	

	screenCheck();
	$(window).on('resize', function() {
		screenCheck();
	});

	// =================================
	// MAP INIT
	// =================================	

	$('.map-holder img').hide();
	google.maps.event.addDomListener(window, 'load', initialize);	


	// =================================
	// OVERLAY ELEMENTS
	// =================================	

	var $overlay = $('<div><span class="lsf-icon close"></span></div>');
	var $holder = $('<div></div>');
	var $image = $('<img>');
	var $caption = $('<p></p>');
	var $spinner = $('<span class="icon-spinner3 spinner"></span>');

	$('body').append($overlay);
	$overlay.addClass('overlay').append($holder);
	$holder.addClass('holder').addClass('holder--fixed-height').append($spinner).append($image).append($caption);
	$overlay.hide();
	$spinner.hide();
	$image.hide();
	var $galleryImg = $('.gallery a, .thumb');

	$galleryImg.on('click', function() {
		$overlay.show();
		$spinner.show();
		var $this = $(this);
		var href = $this.attr('href');
		var text = $this.find('img').attr('title');
		$caption.text(text);
		$this.find('img').removeClass('port');
		if($this.find('img').hasClass('portrait')) {
			$('.holder img').removeClass('land').addClass('port');
		} else {
			$('.holder img').removeClass('port').addClass('land');
		}
		$image.attr('src', href);
		$image.load(function() {
			$spinner.hide();
			$image.show();
		});

		return false;
	});

	var $close = $('.overlay span');

	$close.on('click', function() {
		$overlay.hide();
	});
	$overlay.on('click', function() {
		$overlay.hide();
	});

	// =================================
	// HIDE/SHOW TRACK RECORD
	// =================================	

	var cv = $('#cv');
	cv.hide();

	$('.cv-button').on('click', function() {
		$overlay.find('img').hide();
		$holder.load('track-record.html');
		$overlay.show();

	});

	function overlayClose() {
		$overlay.hide();
		$overlay.find('img').show();
		$holder.addClass('holder--fixed-size');
	}

	$close.on('click', function() {
		overlayClose();
	});
	$overlay.on('click', function() {
		overlayClose();
	});

}); /*END DOCUMENT READY*/







