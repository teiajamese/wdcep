(function ($, root, undefined) {

	$(function () {
		var stickyNavTop = $('#landing').outerHeight(true);
		var stickyNav = function(){
			var scrollTop = $(window).scrollTop();  
			if (scrollTop > stickyNavTop) { 
			    $('.nav').addClass('sticky');
			} else {
			    $('.nav').removeClass('sticky'); 
			}
		};
		
		stickyNav();
		 
		$(window).scroll(function() {
		  stickyNav();
		});
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
		});

		$(".title").click(function(){
        	$(this).next(".title-desc").slideToggle();
        	$(this).toggleClass('active');
    	});
		/*$(window).load(function() {
		    var hash = window.location.hash; // would be "#div1" or something
		    if(hash != "") {
		        var id = hash.substr(1); // get rid of #
		        var backgroundAnchor = $('#'+id).data('anchor');
		        if(backgroundAnchor == null){
		        	//$('#'+backgroundAnchor).offset().top;
		        	$('html, body').animate({ scrollTop: $('#'+id).offset().top}, 1000);
		        	console.log('null');
		        }
		        else{
		        	//$('#'+id).addClass('active');
		        	$('html, body').scrollTop($('#'+backgroundAnchor).position().top);
		        	//console.log(backgroundAnchor);
		        }
		      //  $('#'+id).parent().find('.all').removeClass('active');
			}
		});*/
		$("li.info-icon").click(function(){
			$("li.info-icon").removeClass('active');
			$(this).toggleClass('active');
			var infoAttr = $(this).attr('data-attr') ;
			$('.content').removeClass('open');
			$('.content[data-attr="'+infoAttr+'"]').addClass('open');
		});
		$( "li.info-icon" ).hover(function() {
		  $(this).prevAll().toggleClass('expand');
		  $(this).fadeIn(500);
		});
		$("div.content").first().addClass('open');
		$('li.info-icon').first().addClass('active');
		$(".image-gallery").slick({
			arrows: true,
			dots: true,
			slidesToShow: 5,
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

/*
		$(".play").click(function(){
			var video = $('.landing-hero').attr('data-video');
		    player = new YT.Player('player', {
		      height: '390',
		      width: '640',
		      videoId: video,
		      events: {
		        'onReady': onPlayerReady,
		        'onStateChange': onPlayerStateChange
		      }
		    });

		    $('.head-wrapper').hide();
		    $('.logos').hide();
		    $('.play').hide();
		    $('.logo').hide();

		});
	 	var tag = document.createElement('script');
	    tag.src = "https://www.youtube.com/iframe_api";
	    var firstScriptTag = document.getElementsByTagName('script')[0];
	    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		var player;

		// 4. The API will call this function when the video player is ready.
		function onPlayerReady(event) {
			event.target.playVideo();
		}

		// 5. The API calls this function when the player's state changes.
		//    The function indicates that when playing a video (state=1),
		//    the player should play for six seconds and then stop.
		//var done = false;
		function onPlayerStateChange(event) {
			if(event.data == YT.PlayerState.ENDED) {
				player.destroy();
				$('.wrapper').show();
			    $('.logos').show();
			    $('.play').show();
			    $('.logo').show();
			}
		}*/
	
		$('.acf-map').each(function(){

			// create map
			map = new_map( $(this) );

		});

		$('nav.nav ul a').on('click',function(e){
			$('body').removeClass('noscroll');
			var destination = $(this).attr("href");
			//$(destination + ' .all').show();
			e.preventDefault();
			e.stopPropagation();
			$('html, body').animate({ scrollTop: $(destination).offset().top}, 900);
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

	});

 	


function resizeCenter(){
	var currCenter = map.getCenter();
	google.maps.event.trigger(map, 'resize');
	map.setCenter(currCenter);
}


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
