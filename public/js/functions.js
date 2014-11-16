$(document).ready(function() {


	$('.nav a').on('click', function() {
		$(".btn-navbar").click();
	});

	$('.navbar-inner .nav').on('click', function() {
		$('.navbar-btn').click();
	});

	var youtubeArray = [];
	$(".media-youtube-exists").each(function(e) {
		//Handler for .load() called.
		var w = $(this).parents().attr('id');

		if ($(this).data('youtube')) {

			//$(this).parent().
			var videoId = $(this).data('youtube');
			var containerId = $(this).attr('id');
			youtubeArray.push(containerId);
			$(this).tubeplayer({
				
				allowFullScreen : "true", // true by default, allow user to go full screen
				initialVideo : videoId, // the video that is loaded into the player
				onPlayerPlaying: function() {
					var carouselId = $(this).closest( ".carousel").attr("id");
					$("#" + carouselId).carousel("pause");
				}
			});
			
			var j = $(this).attr('id');
		} else {

			$(this).html('couldnt load this video');

		}

	});
	
	
	$('.nav li a, ol.carousel-indicators li, .carousel-control').click(function() {
		var carouselId = $(this).closest( ".carousel").attr("id");
		$("#" + carouselId).carousel("pause");
		$(function() {
			$.each(youtubeArray, function(index, value) {
				$('#' + value).tubeplayer('pause');
			});
		});
	});

	
	$('body').on('click','input#submitContactForm', function (e) {
			e.preventDefault();
            $.ajax({
                type: "POST",
            	url: "/contact/process",
            	data: $('form#contact').serialize(),
            	success: function(msg){
                      $("#contactUs .modal-content").html(msg);
            	},
    			error: function(){
    				$("#contactUs .modal-content").html('Sorry, the Contact Form is temporarily down. Please send us an email directly at <a href="mailto:info@medicuscorda.com">info@medicuscorda.com</a><br />Make sure to let us know that our contact form is down.<br /><br />Thank you for your undersatanding<br /><i>The MedicusCorda Team</i>');
        		}
           });
	});
});

