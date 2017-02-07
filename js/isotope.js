$(window).load(function(){
// Isotope Filter for Initiatives

		// quick search regex
		var qsRegex;
		var buttonFilter;
		var filterValue;
		var hashFilter;
		var executed;

		// init Isotope
		var grid = $('.initiatives .wrapper .grid');

		function isotopeGrid(){
			if(executed){
				grid.isotope({

				
				  	itemSelector: '.init',
				  	layoutMode : 'masonry',

				  	filter: function() {
				    
				    	var searchResult = qsRegex ? $(this).text().match( qsRegex ) : true;
					    var selectResult = filterValue ? $(this).is( filterValue ) : true;
					    //console.log(selectResult);
					    //
					    //return urlResult;
					    return selectResult && searchResult;
				  	}
				});
			}
			else{
				$('.initiatives .wrapper .grid').isotope({
			
					itemSelector: '.init',
					layoutMode : 'masonry',
					filter:hashFilter
				});
				
				executed = true;
			}
		}
		
		/*function filterVar(){
				if(url == 'url'){
					hashFilter;
				}
				else{
					
					var searchResult = qsRegex ? $(this).text().match( qsRegex ) : true;
				    var selectResult = filterValue ? $(this).is( filterValue ) : true;
				    console.log(selectResult);
				    //
				    //return urlResult;
				    return selectResult && searchResult;
					
				}
			}*/
		function selectFilter(){
			var selects = $('.filters');
			$('.filters').on( 'change', function() {
				// exclusive filters from selects
				var exclusives = [];
				selects.each( function( i, elem ) {
				    if ( elem.value ) {
				      exclusives.push( elem.value );
				    }
				});

			    // first combine exclusives
	 			exclusives = exclusives.join('');

	 			filterValue = exclusives;
	 			// set filter in hash
	  			location.hash = 'filter=' + encodeURIComponent( filterValue );
	 			isotopeGrid();
			});
			

			// use value of search field to filter
			var quicksearch = $('#quicksearch').keyup( debounce( function() {
			  qsRegex = new RegExp( quicksearch.val(), 'gi' );
			  isotopeGrid();
			}) );
			
		}

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


		/*Add filter to url, allows you to link to prefiltered page */

		var isIsotopeInit = false;

		/*function onHashchange() {
		  var hashFilter = getHashFilter();
		  if ( !hashFilter && isIsotopeInit ) {
		    return;
		  }
		  isIsotopeInit = true;
		  // filter isotope
		  grid.isotope({filter:hashFilter});
		  // set selected class on button
		  /*if ( hashFilter ) {
		    $select.find('.is-checked').removeClass('is-checked');
		    $filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
		  }*/
	//	}
		function getHashFilter() {
			var executed = false;
			var matches = location.hash.match( /filter=([^&]+)/i );
			var hashFilter = matches && matches[1];
			var dropdown = location.hash.match( /filter=.([^&]+)/i );
			var arrayOfHashFilter = hashFilter.split('.');
			for(var i=0;i<arrayOfHashFilter.length;i++){
			    arrayOfHashFilter[i]="."+arrayOfHashFilter[i];
			    $(".ui.dropdown").dropdown("set selected", arrayOfHashFilter[i]);
			}
			//isotopeGrid();
		  	grid.isotope({filter:hashFilter});

		}

		selectFilter();
	   	getHashFilter();
		
		
});


