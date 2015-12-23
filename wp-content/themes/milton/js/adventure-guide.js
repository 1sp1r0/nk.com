$(document).ready( function() {

	function adventureGuideTabs(){

		$('.takeover-nav .blog-tabs a').click(function(event){
			event.preventDefault();

			var jqxhr = $.ajax( $(this).attr('href') )
			 .done(function(html) {
   				 console.log( "success" );
   				 var success = $(html).find('.takeover-content');
   				 console.log(success);
   				 $('.takeover-content').html(success);
   				 setActiveTab();
  			})
  			.fail(function() {
   			 console.log( "ajax-error" );
  			})
  			.always(function() {
    			//alert( "complete" );
  			});
 

		});

		setActiveTab();
	}

	function setActiveTab(){

		var currentID = $('.takeover-content-left .blog-post').data('id');
		console.log(currentID);

		$('.takeover-nav .blog-tabs li a.is-active').removeClass('is-active');

		$('.takeover-nav .blog-tabs li[data-id="'+currentID+'"]').children('a').addClass('is-active');

		//$('.takeover-nav .blog-tabs li')

	}

	adventureGuideTabs();

});