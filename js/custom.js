jQuery.noConflict();

jQuery(document).ready(function(){
								
								
	///// MENU //////	
	jQuery('.menu ul').superfish({ 
    	delay:       100,                            	// one second delay on mouseout 
        animation:   {opacity:'show',height:'show'},  	// fade-in and slide-down animation 
        speed:       'fast',                          	// faster animation speed 
        autoArrows:  false                           	// disable generation of arrow mark-up 
    });
	
	
	// for css reference from the menu
	jQuery('.sf-menu ul li').has('ul').addClass('withsub');	
	
	
	///// FLICKR FEED PHOTOS /////
	jQuery('#flickrfeed').jflickrfeed({
		limit: 9,
		qstrings: {
			id: '26654072@N04'
		},
		itemTemplate:
		'<li>' +
			'<a rel="colorbox" href="{{image}}" title="{{title}}">' +
				'<img src="{{image_s}}" alt="{{title}}" />' +
			'</a>' +
		'</li>'
	}, function(data) {
		jQuery('#flickrfeed a').colorbox();
	});
	
					
	///// TEXTAREA AUTOGROW /////
	if(jQuery('#msg').length)
		jQuery('#msg').autogrow();
		
	
	///// PORTFOLIO /////
	if(jQuery.browser.msie && (jQuery.browser.version == '8.0' || jQuery.browser.version == '7.0')) {
		jQuery('.pimg').hover(function(){
			jQuery(this).find('.poverlay').fadeIn();
		},function(){
			jQuery(this).find('.poverlay').fadeOut();
		});
	} else {
		jQuery('.poverlay').hover(function(){
			jQuery(this).stop().animate({opacity: 1},'fast');
		},function(){
			jQuery(this).stop().animate({opacity: 0},'fast');
		});
	}
	
	
	///// PORTFOLIO LIGHTBOX /////
	if(jQuery('.viewphoto').length) {
		jQuery('.viewphoto').colorbox({
			maxWidth: '800px',
			maxHeight: '600px'
		});
		
		//replace data-rel to rel in order for colorbox to work
		jQuery('.viewphoto').each(function(){
			if(jQuery(this).attr('data-rel') != null) {
				var attrvalue = jQuery(this).attr('data-rel');
				jQuery(this).attr('rel',attrvalue);
				jQuery(this).removeAttr('data-rel');
			}
		});
	}
	
	///// PORTFOLIO LIGHTBOX VIDEO /////
	if(jQuery('.viewvideo').length) {
		jQuery(".viewvideo").colorbox({iframe:true, innerWidth:640, innerHeight:480});
	}
	
	
	
	///// TABBED WIDGET /////
	if(jQuery('#tabwidget'))
		jQuery('#tabwidget').tabs();
		
	///// IMAGE HOVER EFFECT /////
	if(jQuery('.imghoverborder').length) {
		jQuery('.imghoverborder').hover(function(){
			jQuery(this).append('<span />');
			jQuery(this).find('span').fadeIn();
		},function(){
			jQuery(this).find('span').fadeOut(function(){
				jQuery(this).remove();
			});
		});
	}
		
	
	///// PORTFOLIO PRELOADER /////
	if(!jQuery.browser.msie) {
		if(jQuery('.pimg').length)
			jQuery('.pimg').preloader();
		if(jQuery('#slideshow').length)
			jQuery('#slideshow').preloader();
		if(jQuery('.slidenav').length)
			jQuery('.slidenav').preloader();
	}
	
	///// SIDEBAR: TRENDING POSTS /////
	if(jQuery('.trending-posts').length) {
		
		jQuery('.trending-posts').cycle({ 
			fx:     'fade', 
			speed:  'fast', 
			timeout: 0, 
			next:   '#trend-next', 
			prev:   '#trend-prev'
		});

		jQuery('.trending-posts li').hover(function(){
			jQuery(this).find('.desc').stop().animate({top: 0});
		},function(){
			jQuery(this).find('.desc').stop().animate({top: 115});
		});	
	}
	
	
	/***** SIDEBAR: TWITTER FEED *****/
	/*********************************/
	if(jQuery('#tweet').length) {
		jQuery("#tweet").tweet({
			  username: "envato",		// change this to your username
			  count: 3,
			  loading_text: "loading tweets...",
			  template: "{join} {text} - {time}"
		});
	}
	
	
	///// SIDEBAR: TESTIMONIAL LIST /////
	if(jQuery('.testi-list').length) {
		
		jQuery('.testi-list').cycle({ 
			fx:     'fade', 
			delay:  3000, 
			next:   '#testi-next', 
			prev:   '#testi-prev'
		});
	}
	
	
	///// NOTIFICATION CLOSE BUTTON /////
	if(jQuery('.notibar').length) {
		jQuery('.notibar .close').click(function(){
			jQuery(this).parent().fadeOut(function(){
				jQuery(this).remove();
			});
		});
	}
		
	///// CAROUSEL: TRENDING POSTS /////
	if(jQuery('#trending').length) {
		jQuery('#trending').jcarousel({
			itemFallbackDimension: 300
		});
	}
	
	///// CAROUSEL: RECOMMENDED POSTS /////
	if(jQuery('#recommended').length) {
		jQuery('#recommended').jcarousel({
			itemFallbackDimension: 300
		});
	}
	
	
	///// CAROUSEL POSTS HOVER CONTENT /////
	if(jQuery('.jcarousel-list').length) {
		jQuery('.jcarousel-list li').hover(function(){
			jQuery(this).find('.postinfo').stop().animate({top: 0});
		},function(){
			jQuery(this).find('.postinfo').stop().animate({top:85});
		});
	}
	
	
	///// IE7 FIX FOR BLOG LIST /////
	if(jQuery('.blogpanel').length) {
		if(jQuery.browser.msie && jQuery.browser.version == '7.0') {
			jQuery('.blogpanel').each(function(){
				jQuery(this).find('br').replaceWith('<div class="clearall"></div>');
			});
		}
	}
	
	
	///// PORTFOLIO SINGLE TABLE FIX FOR IE /////
	if(jQuery('.porttable').length) {
		jQuery('.porttable tr:first-child td:first-child').attr('width','40%');
		jQuery('.porttable tr:first-child td:last-child').attr('width','60%');
		jQuery('.porttable tr td:last-child').css({textAlign: 'right'});
	}
	
	
	///// RESPONSIVE //////
	iPadPortraitResize();
	reposMenu();
	reColPortfolio();
	jQuery(window).resize(function() {
	  iPadPortraitResize();
	  reposMenu();
	  reColPortfolio();
	});
	
	function iPadPortraitResize() {
		if(jQuery(this).width() < 960 && jQuery(this).width() > 767) {
			var secondRow = jQuery('.footerinner .one_fourth:nth-child(2)');
			if(!secondRow.hasClass('last'))
				secondRow.addClass('last');  
		}	
	}	
	
	function reposMenu() {
		// add menuicon if window width below 768
		// check if menuicon exist, otherwise create and append element
		if(jQuery(window).width() < 768) {
			if(jQuery('.menuicon').length == 0) 
				jQuery('<div class="menuicon"><a class="menuiconinner"></a></div>').insertAfter('.logo');
		} else {
			jQuery('.menuicon').remove();
		}
		
		var autoHeight = jQuery(window).height() - 80;
		jQuery('.menuiconinner').click(function(){
			if(jQuery('.menupopup').length == 0) {
				jQuery('body').append(jQuery('<div class="menupopup"><div class="menupopupinner"></div></div>'));
				jQuery('.sf-menu').clone().appendTo('.menupopupinner');
				jQuery('.menupopup ul').removeAttr('class');
				jQuery('.menupopup ul').removeAttr('style');
				jQuery('.menupopupinner').append('<div class="menutitle">Menu <a href="" class="menuclose"></a></div>');
			}
			jQuery('.menupopupinner').height(autoHeight);
			jQuery('.menupopupinner > ul').height(autoHeight);
		});
		
		jQuery('.menuclose').live('click',function(){
			jQuery(this).parents('.menupopup').remove();
			return false;
		});
		
		if(jQuery('.menupopupinner').length > 0) {
			jQuery('.menupopupinner').height(autoHeight);
			jQuery('.menupopupinner > ul').height(autoHeight);
		}
	}
	
	
	function reColPortfolio() {
		
		if(jQuery(window).width() < 767) {
	
			///// COLUMN FOUR RESPONSIVE TO TWO COLUMNS /////
			if(jQuery('.cfour').length > 0) {
				var count = 0;
				jQuery('.cfour').each(function(){
					if(count %2 != 0) {
						jQuery(this).addClass('clast2');
						count=0;
					} else {
						count++;
					}
				});	
			}
			
			///// COLUMN THREE RESPONSIVE TO TWO COLUMNS /////
			if(jQuery('.cthree').length > 0) {
				var count = 0;
				jQuery('.cthree').each(function(){
					if(count %2 != 0) {
						jQuery(this).addClass('clast2');
						count=0;
					} else {
						count++;
					}
				});	
			}
		
		} else {
			jQuery('.cfour, .cthree').each(function(){
				jQuery(this).removeClass('clast2');
			});	
		}
	
	}

});