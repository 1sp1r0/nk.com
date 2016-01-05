$( document ).ready( function() {

	

	$.getJSON( "https://slack.com/api/channels.history?token=xoxp-2152002075-9107185985-10915637399-de74e61948&channel=C0ECXEU00&pretty=1", function( data ) {
  		
  		var items = [];

  		var counter = 0;

      var user = $('.recent-posts.slack').data('user');
  		
  		$.each( data.messages, function( key, val ) {

  			if( counter == 6 ){
  				return false;
  			}

  			if( val.user != user ){
  				return true; // testing for elise!
  			}

  			if( val.type == 'message' ){

  				if( counter == 0 ){
  					var postClass = 'first';
  				}else{
  					var postClass = 'more';
  				}

  				var item = '<div class="post">';

  				if( val.subtype == null ){
  					var text = val.text;
  					var link = text.match('<(.*)>');
  					item += '<p class="slack-text">' + text;

  					if( link ){
  						item += '<div class="slack-link-wrapper"><a target="_blank" href="' + link[1] + '">' + link[1] + '</a></div>';
  					}

  					item += '</p>';
  				}else{
            counter--;
          }

  				if( val.attachments ){

  					$.each( val.attachments, function( key, val ){

  						item += '<div class="slack-meta">';

  						/*if( val.image_url ){
  							item += '<a class="meta-image-link" href="' + val.title_link + '"><img class="meta-image" src="' + val.image_url + '" /></a>';
  						}

  						 if( val.thumb_url ){
  							item += '<a class="meta-image-link" href="' + val.title_link + '"><img class="meta-image" src="' + val.thumb_url + '" /></a>';
  						}

  						if( val.title_link ){

  							item += '<div class="meta-wrapper">';

  							item += '<p class="meta-title"><a href="' + val.title_link + '">' + val.service_name + ' - ' + val.title + '</a></p>';

  							if( val.text ){

								var truncateString = val.text.substring(0, 100);
  								item += '<p class="meta-text">' + truncateString + '...</p>';
  							}

  							item += '</div>';

  							
  						} */

  						item += '</div>';
  						
  						
  					});
  				}

  				item += '</div>';

  				if( $(item).text().length != 0 ){
  					items.push( item );
  				}

  				
  			}

  			counter++;
  		  
  		});

  		$( '.recent-posts' ).append( items );

      $('.slack-link-wrapper a').each( function () { 
        var short = $(this).text().substring( 0 , 30 );
        $(this).text( short + '...');
      });

	});

});