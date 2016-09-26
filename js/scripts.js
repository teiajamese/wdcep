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
			$(this).addClass('hidden');
			//$(this).hide();
			$('.mobile-menu-container').show();
			$('.mobile-menu-close').addClass('hidden');
		});
		$('.mobile-menu-container li').click(function(){
			$('.mobile-menu-container').hide();
			$('.mobile-menu').removeClass('hidden');
			$('.mobile-menu-close').removeClass('hidden');
		})
		$('.mobile-menu-close').on('click touchstart', function(){
			$('.mobile-menu').removeClass('hidden');
			$('.mobile-menu-close').removeClass('hidden');
			$('.mobile-menu-container').hide();
			//$(this).hide();
		});

		$('.play').click(function(){
		    var video = '<iframe src="'+ $('.landing-hero').attr('data-video') +'"></iframe>';
		    $('#landing').replaceWith(video);
		    console.log('clicked');
		});
		$(".image-gallery").slick({
			arrows: true,
			dots: true,
			slidesToShow: 3,
			//rows: 2,
			responsive: [
			    {
			      breakpoint: 768,
			      settings: {
			      	slidesToShow: 2,
			      }
			  	}
			]
		});
		/*	*/
		$('#fullpage').fullpage({
			scrollOverflow: true,
			/*scrollOverflowOptions: {
				click: false
			},*/
			//paddingTop:'30px',
			//paddingBottom: '30px',
			//autoScrolling: false,
			//fitToSection: false,
			bigSectionsDestination: 'top',
			controlArrows: false,
			lockAnchors: false,
			anchors:['landingPage', 'landingBlurb','whatdoyouthink','join-the-conversation','discussions',  'resources', 'footer'],
			animateAnchor: false,
			afterLoad: function(anchorLink, index){
            	var loadedSection = $(this);
            	if(index == 1){
					$('.nav').removeClass('sticky');
				}

				else if(index >2){
					$('.nav').addClass('sticky');
					
				}
				if(anchorLink == 'whatdoyouthink'){
					
				}
				if(anchorLink == 'discussions'){
						
					
				}
        	},
			onLeave: function(index, nextIndex, direction){
				var leavingSection = $(this);
				if(index == 1){
					//$('.nav').removeClass('sticky');
				}
				else if(index == 2 && direction == 'up'){
					$('.nav').removeClass('sticky');
					
				}
				else if(index == 1 && direction == 'down'){
					//$('.nav').addClass('sticky');
					//stickyNav(); 
				}
			},
			/*afterRender: function(){
				//$.getScript("wp-content/themes/wdcep/slick/slick.js", function(){
				   //alert("Script loaded but not necessarily executed.");
				});
			},*/
			
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

		$("#event-carousel").owlCarousel({
			 	nav:true,
			 	margin:30,
			 	dots: true,
			 	pagination: true,
			 	//owl2row: false, // enable plugin
	           // owl2rowTarget: 'event-container',    // class for items in carousel div
	            //owl2rowContainer: 'owlrow-item', // class for items container
	            //owl2rowDirection: 'utd', // utd : directions
			 	responsive : {
			 		0:{
			 			items: 1,
			 		},
			 		421:{
			 			items: 2,
			 		},
			 		769:{
			 			items: 4,
			 		}
			 	}
			});

		$("#pastevent-carousel").owlCarousel({
			 	nav:true,
			 	margin:30,
			 	dots: true,
			 	pagination: true,
			 	//owl2row: false, // enable plugin
	           // owl2rowTarget: 'event-container',    // class for items in carousel div
	            //owl2rowContainer: 'owlrow-item', // class for items container
	            //owl2rowDirection: 'utd', // utd : directions
			 	responsive : {
			 		0:{
			 			items: 1,
			 		},
			 		421:{
			 			items: 2,
			 		},
			 		769:{
			 			items: 4,
			 		}
			 	}
			});

		/*var isMobile = window.matchMedia("only screen and (max-width: 760px)");

	    if (isMobile.matches) {
	         $.fn.fullpage.setAllowScrolling(false,'right,left');
	    }
		
		

	/*	$('.carousel').each(function (idx, item) {
		    var carouselId = "slider-caoruel" + idx;
		    this.id = carouselId;
		    $(this).slick({
		        slide: "#" + carouselId +" .container",
		        //appendArrows: "#" + carouselId + " .prev_next",
		        //prevArrow: '<a>Previous</a>',
		        //nextArrow: '<a>Next</a>'
		    });
		});*/
		
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

/*

;(function ($, window, document, undefined) {
    Owl2row = function (scope) {
        this.owl = scope;
        this.owl.options = $.extend(Owl2row.Defaults, this.owl.options);
        //link callback events with owl carousel here

        this.handlers = {
            'initialize.owl.carousel': $.proxy(function (e) {
                if (this.owl.settings.owl2row) {
                    this.build2row(this);
                }
            }, this)
        };

        this.owl.$element.on(this.handlers);
    };

    Owl2row.Defaults = {
        owl2row: false,
        owl2rowTarget: 'item',
        owl2rowContainer: 'owl2row-item',
        owl2rowDirection: 'ltr' // utd
    };

    //mehtods:
    Owl2row.prototype.build2row = function(thisScope){

        var carousel = $('.' + thisScope.owl.options.baseClass);
        var carouselItems = carousel.find('.' + thisScope.owl.options.owl2rowTarget);

        var aEvenElements = [];
        var aOddElements = [];

        $.each(carouselItems, function (index, item) {
            if ( index % 2 === 0 ) {
                aEvenElements.push(item);
            } else {
                aOddElements.push(item);
            }
        });

        carousel.empty();

        switch (thisScope.owl.options.owl2rowDirection) {
            case 'ltr':
                thisScope.leftToright(thisScope, carousel, carouselItems);
                break;

            default :
                thisScope.upTodown(thisScope, aEvenElements, aOddElements, carousel);
        }

    };

    Owl2row.prototype.leftToright = function(thisScope, carousel, carouselItems){

        var o2wContainerClass = thisScope.owl.options.owl2rowContainer;
        var owlMargin = thisScope.owl.options.margin;

        var carouselItemsLength = carouselItems.length;

        var firsArr = [];
        var secondArr = [];

        //console.log(carouselItemsLength);

        if (carouselItemsLength %2 === 1) {
            carouselItemsLength = ((carouselItemsLength - 1)/2) + 1;
        } else {
            carouselItemsLength = carouselItemsLength/2;
        }

        //console.log(carouselItemsLength);

        $.each(carouselItems, function (index, item) {


            if (index < carouselItemsLength) {
                firsArr.push(item);
            } else {
                secondArr.push(item);
            }
        });

        $.each(firsArr, function (index, item) {
            var rowContainer = $('<div class="' + o2wContainerClass + '"/>');

            var firstRowElement = firsArr[index];
                firstRowElement.style.marginBottom = owlMargin + 'px';

            rowContainer
                .append(firstRowElement)
                .append(secondArr[index]);

            carousel.append(rowContainer);
        });

    };

    Owl2row.prototype.upTodown = function(thisScope, aEvenElements, aOddElements, carousel){

        var o2wContainerClass = thisScope.owl.options.owl2rowContainer;
        var owlMargin = thisScope.owl.options.margin;

        $.each(aEvenElements, function (index, item) {

            var rowContainer = $('<div class="' + o2wContainerClass + '"/>');
            var evenElement = aEvenElements[index];

            evenElement.style.marginBottom = owlMargin + 'px';

            rowContainer
                .append(evenElement)
                .append(aOddElements[index]);

            carousel.append(rowContainer);
        });
    };

    /**
     * Destroys the plugin.
     */
 /*   Owl2row.prototype.destroy = function() {
        var handler, property;

        for (handler in this.handlers) {
            this.owl.dom.$el.off(handler, this.handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] !== 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins['owl2row'] = Owl2row;
})( window.Zepto || window.jQuery, window,  document );*/
