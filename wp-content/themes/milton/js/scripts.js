/*
scripts.js is home to any general js for the theme

we are using jQuery v.1.11.1 to support legacy IE - v.2+ does not work with IE8 and older

the modernizr custom build includes nearly all of the functionality modernizr provides
if performance is an issue, we will revisit what features need to be tested for
*/

$(document).ready(function(){
	
	// Smooth Scrolling JS
	
	$('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
	        || location.hostname == this.hostname) {

	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	           if (target.length) {
	             $('html,body').animate({
	                 scrollTop: target.offset().top-30
	            }, 1000);
	            return false;
	        }
	    }
	});
	
	//animation for homepage logos
	function logoScroll(){
		
		var setLength = $('.logo-set').length;
		var i = 1;
		
		if( setLength > 1){
			window.setInterval(function(){
			   	$('.logo-set.active').fadeOut('slow',function(){
			   		$('.logo-set.active').removeClass('active');
			   		$('.logo-set:eq('+(i++)+')').fadeIn('slow').addClass('active');
			   		if( i == setLength){ i = 0; }
			   	});
			   },5000);
		}
	
	}
	
	logoScroll();
	
	//sticky menu for case studies
	
	function stickyMenu(){
		
		var navOffsetTop = $('.sub_nav').offset().top;
		
		var i = 0;
		
		var sections = new Array();
		
		var sectionOffsetTop = new Array();
		var sectionOffsetBottom = new Array();
		
		$('.content_section').each(function(){
			
			sections[i] = $(this).attr('id');
			sectionOffsetTop[i] = $(this).offset().top - parseInt($(this).css('padding-top'));
			sectionOffsetBottom[i] = sectionOffsetTop[i] + parseInt($(this).css('height'));
			
			i++;
			
		});
		
		
		function stickyNav(){
			
			var scrollTop = $(window).scrollTop();
			
			if (scrollTop > navOffsetTop){
				$('.sub_nav').addClass('sticky');
				$('.if-sticky').fadeIn();
			}else{
				$('.sub_nav').removeClass('sticky');
				$('.if-sticky').fadeOut();
			}
			
			for( var i=0; i<sections.length; i++){
				if (scrollTop > sectionOffsetTop[i]-70 && scrollTop < sectionOffsetTop[i+1]-70){
					$('.sub_nav a[href="#'+sections[i]+'"]').addClass('active');
				}else if (i == sections.length-1 && scrollTop > sectionOffsetTop[i]-70){
					$('.sub_nav a[href="#'+sections[i]+'"]').addClass('active');
				}else{
					$('.sub_nav a[href="#'+sections[i]+'"]').removeClass('active');
				}
			}
			
		};
		
		
		$(window).scroll(function(){
			stickyNav();
		});
		
	}
	
	if($('.sub_nav').length > 0){ stickyMenu(); }

	
	//resize youtube videos
	
	function youtubeResize(){
		
		// Find all YouTube videos
		var $allVideos = $("iframe[src^='http://www.youtube.com'], iframe[src^='https://www.youtube.com'], iframe[src^='//player.vimeo.com'], iframe[src^='https://player.vimeo.com'], iframe[src^='http://player.vimeo.com']"),

		    // The element that is fluid width
		    $fluidEl = $(".sub_section.no-image p, .blog_article p, .case-study div");

		// Figure out and save aspect ratio for each video
		$allVideos.each(function() {

		  $(this)
		    .data('aspectRatio', this.height / this.width)

		    // and remove the hard coded width/height
		    .removeAttr('height')
		    .removeAttr('width');

		});

		// When the window is resized
		$(window).resize(function() {

		  var newWidth = $fluidEl.width();

		  // Resize all videos according to their own aspect ratio
		  $allVideos.each(function() {

		    var $el = $(this);
		    $el
		      .width(newWidth)
		      .height(newWidth * $el.data('aspectRatio'));

		  });

		// Kick off one resize to fix all videos on page load
		}).resize();
	}
	
	youtubeResize();
	
	//testing prod git hook
	
	function expandMenu(){
		
		$('.menu_hamburger').click(function(event){
			event.preventDefault();
			$('.global_nav').toggleClass('visible');

			$('.global_nav #close-link').click(function(event){
				event.preventDefault();
				$('.global_nav').removeClass('visible');
			});
		});
		
	}
	
	expandMenu();
	
	function loadImages(){
		$('.js-image-load').prepend(function(){
			var src = $(this).attr('data-src');
			return '<img src="'+src+'" />';
		});
	}
	
	if (screen && screen.width > 480) {
		loadImages();
	}

	function birdInfo(){
		$('.bird-info-link').click( function(event){
			event.preventDefault();
			$('.bird-info-text').fadeToggle();
		});
	}

	if( $('.bird-info-link') ){ birdInfo(); }

	function expandServices(){
		$('#services-expand').click(function(event){
			event.preventDefault();
			$('.services dd').fadeToggle();
			if( $(this).hasClass('more') ){
				$(this).text('See Less');
			}else{
				$(this).text('See More');
			}
			$(this).toggleClass('more');
		});
	}

	if( $('#services-expand') ){ expandServices(); }
	
});