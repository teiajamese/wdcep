$(window).load(function(){
// Isotope Filter for Initiatives

		// quick search regex
		var qsRegex;
		var buttonFilter;
		var filterValue;

		// init Isotope
		var grid = $('.initiatives .wrapper .grid').isotope({
		  itemSelector: '.init',
		  layoutMode : 'masonry',
		  filter: function() {
		    //var this = $(this);
		   	var searchResult = qsRegex ? $(this).text().match( qsRegex ) : true;
		    var selectResult = filterValue ? $(this).is( filterValue ) : true;
		    return selectResult && searchResult;
		   // var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
		   // return searchResult && buttonResult;
		  }
		});

		
		var $selects = $('.filters');
		$('.filters').on( 'change', function() {
			// exclusive filters from selects
			var exclusives = [];
			$selects.each( function( i, elem ) {
			    if ( elem.value ) {
			      exclusives.push( elem.value );
			    }
			});

		    // first combine exclusives
 			exclusives = exclusives.join('');

 			filterValue = exclusives;
 			grid.isotope();
		});
		// use value of search field to filter
		var quicksearch = $('#quicksearch').keyup( debounce( function() {
		  qsRegex = new RegExp( quicksearch.val(), 'gi' );
		  grid.isotope();
		}) );
		  

		// debounce so filtering doesn't happen every millisecond
		function debounce( fn, threshold ) {
		  var timeout;
		  return function debounced() {
		    if ( timeout ) {
		      clearTimeout( timeout );
		    }
		    function delayed() {
		      fn();
		      timeout = null;
		    }
		    setTimeout( delayed, threshold || 100 );
		  };
		}

		$(".isotope-reset").click(function(){
	        $('.initiatives .wrapper .grid').isotope({
	            filter: '*'
	        });
	        $('input.prompt').val('');
	    });
});

