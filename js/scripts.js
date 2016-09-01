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

		$('.landing-hero').click(function(){
		    var video = '<iframe src="'+ $(this).attr('data-video') +'"></iframe>';
		    $(this).replaceWith(video);
		    console.log('clicked');
		});
	});
	
})(jQuery, this);
