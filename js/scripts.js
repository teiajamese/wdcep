(function ($, root, undefined) {


	
	$(function () {
	
		
		var stickyNav = function(){
			var scrollTop = $(window).scrollTop();
			var stickyNavTop = $('.nav').offset().top;
		 	console.log(stickyNavTop); 
		 	console.log(scrollTop);    
			if (scrollTop > stickyNavTop) { 
			    $('.nav').addClass('sticky');
			} else {
			    $('.nav').removeClass('sticky'); 
			}
		};
		/* 
		stickyNav();
		 
		$(window).scroll(function() {
		  stickyNav();
		});*/
		$('.mobile-menu').click(function(){
			//$(this).addClass('change');
			$(this).hide();
			$('.mobile-menu-container').show();
			$('.mobile-menu-close').show();
		});
		$('.mobile-menu-container li').click(function(){
			$('.mobile-menu-container').hide();
			$('.mobile-menu').show();
			$('.mobile-menu-close').hide();
		})
		$('.mobile-menu-close').click(function(){
			$('.mobile-menu').show();
			$('.mobile-menu-container').hide();
			$(this).hide();
		});

		$('.play').click(function(){
		    var video = '<iframe src="'+ $('.landing-hero').attr('data-video') +'"></iframe>';
		    $('#landing').replaceWith(video);
		    console.log('clicked');
		});
		$('#fullpage').fullpage({
			scrollOverflow: true,
			scrollOverflowOptions: {
				click: false
			},
			controlArrows: false,
			lockAnchors: false,
			anchors:['landingPage', 'landing-blurb', 'eventsPage', 'join-the-conversation', 'whatdoyouthink','pastReports'],
			animateAnchor: false,
			afterLoad: function(anchorLink, index){
            	var loadedSection = $(this);
            	if(index == 1){
					$('.nav').removeClass('sticky');
				}

				else if(index >2){
					$('.nav').addClass('sticky');
					
				}
        	},
			onLeave: function(index, nextIndex, direction){
				var leavingSection = $(this);
				if(index == 1){
					$('.nav').removeClass('sticky');
				}
				else if(index == 2 && direction == 'up'){
					$('.nav').removeClass('sticky');
				}
				else{
					$('.nav').addClass('sticky');
					//stickyNav(); 
				}
			},
			
			//fixedElements: '#prev, #next',
		});
		$('a').on('click',(function(){
			
			console.log("clicked");
		}));
		$('.acf-map').each(function(){

			// create map
			map = new_map( $(this) );

		});
		/*$('.event-single .event-menu-close').click(function(){
			$('.event-single').removeClass('active');
			$('#event0').addClass('active');
		});
		$('.form-single .form-menu-close').click(function(){
			$('.form-single').removeClass('active');
			$('#form0').addClass('active');
		});*/
		$(document).on('click', '.prev', function(){
		  $.fn.fullpage.moveSlideLeft();
		});
		$(document).on('click', '.next', function(){
		  $.fn.fullpage.moveSlideRight();
		});
	});
	function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

})(jQuery, this);