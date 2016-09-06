(function ($, root, undefined) {
	
	$(function () {
	
		var stickyNavTop = $('.nav').offset().top;
		 
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

		$('.play').click(function(){
		    var video = '<iframe src="'+ $('.landing-hero').attr('data-video') +'"></iframe>';
		    $('.landing-hero').replaceWith(video);
		    console.log('clicked');
		});
	});
	
})(jQuery, this);
