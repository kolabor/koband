	( function( $ ) {

   api = wp.customize;


    // Update theme first color
	api( 'ko_band_first_theme_color', function( value ) {
		value.bind( function( newThemeFirstColor ) {
			$('.first_color').css('color', newThemeFirstColor, 'important');
			$('.border_color').css('color', newThemeFirstColor, 'important');
			$('.news-details_li a').css('color', newThemeFirstColor, 'important');
			$('.reply a').css('color', newThemeFirstColor, 'important');
			$('.logged-in-as a').css('color', newThemeFirstColor, 'important');
			$('.news-title h2 a').css('color', newThemeFirstColor, 'important');
			$('.submit').css('background-color', newThemeFirstColor, 'important');
			$('.bg_first_color').css('background-color', newThemeFirstColor, 'important');
			$('#contact .wpcf7').css('border-color', newThemeFirstColor, 'important');				
			$('.border_first_color').css('border-color', newThemeFirstColor, 'important');				

		} );
	} ); 

    // Update theme main font color ko_band_first_theme_color
	api( 'ko_band_main_font_color', function( value ) {

		value.bind( function( newThemeMainFontColor ) {
		  
			$('.main_font_color').attr('style','color:'+newThemeMainFontColor+' !important');
			$('.comment-list p').attr('style','color:'+newThemeMainFontColor+' !important');
            $('.read_more a').attr('style','color:'+newThemeMainFontColor+' !important');
            $('.copyright').attr('style','color:'+newThemeMainFontColor+' !important');
		} );
	} );

	// Update theme main menu font Color
	api( 'ko_band_main_menu_font_color', function( value ) {
		value.bind( function( newThemeMenuFontColor ) {
		
			$('.main-nav li a').css( 'color', newThemeMenuFontColor, 'important');
						
		} );
	} );

	// Update theme main menu font size
	api( 'ko_band_main_menu_font_size', function( value ) {
		value.bind( function( newThemeMenuFontSize ) {
		
			$('.main-nav li a').css( 'font-size', newThemeMenuFontSize, 'important');
						
		} );
	} );

	// Update theme main menu bg color
	api( 'ko_band_main_menu_background_color', function( value ) {
		value.bind( function( newThemeMenuBGColor ) {
		
			$('.menu-scroll').css( 'background-color', newThemeMenuBGColor, 'important');
			$('.fixed').css( 'background-color', newThemeMenuBGColor, 'important');
			$('.menu-noscroll').css( 'background-color', newThemeMenuBGColor, 'important');
						
		} );
	} );

	// Update theme font size
	api( 'ko_band_theme_font_size', function( value ) {
		value.bind( function( newThemeFontSize ) {
		
			$('.font_size').css( 'font-size', newThemeFontSize, 'important');
						
		} );
	} );


	// Update theme line height
	api( 'ko_band_theme_line_height', function( value ) {
		value.bind( function( newThemeLineHeight ) {
		
			$('.font_size').css( 'line-height', newThemeLineHeight, 'important');
								
		} );
	} );


	// Update theme general font selector
	api( 'ko_band_general_font_selector', function( value ) {
		value.bind( function( newThemeGeneralFont ) {
            
            var font = newThemeGeneralFont; 
		    var replace =" ";       
            var newFont = font.split('+').join(replace);
            var replacePlus ="+";
            var fontToLink = font.split(' ').join(replacePlus);
            
            $("head").append("<link href='https://fonts.googleapis.com/css?family=" + fontToLink + "' rel='stylesheet' type='text/css'>");


			$('.main_font').css('font-family', newFont, 'important');
			$('.comment-list p').css('font-family', newFont, 'important');
			$('.footer-menu .menu li a').css('font-family', newFont, 'important');
			$('.main-nav .menu li a').css( 'font-family', newFont, 'important'); 
										
		} );
	} );


	// Update theme heading font selector
	api( 'ko_band_heading_font_selector', function( value ) {
		value.bind( function( newThemeHeadingFont ) {
		    
		    var font = newThemeHeadingFont; 
		    var replaceSpace =" ";       
            var newFont = font.split('+').join(replaceSpace);

            var replacePlus ="+";
            var fontToLink = font.split(' ').join(replacePlus);
            $("head").append("<link href='https://fonts.googleapis.com/css?family=" + fontToLink + "' rel='stylesheet' type='text/css'>");
			$('.heading_font').attr('style','font-family: '+newFont+' !important'); 
            
		} );
	} );


	// Update Theme logo
	api( 'ko_band_main_logo', function( value ) {
		value.bind( function( themeNewLogo ) {
		
			$(".main-logo a img").attr("src",themeNewLogo);
			
		} );
	} );

	// Update Theme retina logo
	api( 'ko_band_retina_main_logo', function( value ) {
		value.bind( function( themeNewRetinaLogo ) {
		
			$(".retina-main-logo a img").attr("src",themeNewRetinaLogo);
			
		} );
	} );

	// Update Footer logo
	api( 'ko_band_footer_logo', function( value ) {
		value.bind( function( themeNewFooterLogo ) {
		
			$(".footer_logo a img").attr("src",themeNewFooterLogo);
			
		} );
	} );

	
	/*SLIDER Live changes start here */

   	//Update slider title color
	api( 'ko_band_slider_title_color', function( value ) {
		value.bind( function( newSliderTitleColor ) {
		
			$('.slider_title_text_color').css( 'color', newSliderTitleColor, 'important');
			
		} );
	} );

	//Update slider paragraph text color
	api( 'ko_band_slider_paragraph_text_color', function( value ) {
		value.bind( function( newSliderParagraphTextColor ) {
		
			$('.slider_subtitle_text_color').css( 'color', newSliderParagraphTextColor, 'important');
			
		} );
	} );
    
    //Update slider button text color
	api( 'ko_band_slider_button_text_color', function( value ) {
		value.bind( function( newSliderButtonTextColor ) {
		
			$('.slider_button_text_color').css( 'color', newSliderButtonTextColor, 'important');
			
		} );
	} );

	//Update slider button border color
	api( 'ko_band_slider_button_border_color', function( value ) {
		value.bind( function( newSliderButtonBorderColor ) {
		
			$('.slider_button_text_color').css('border-color', newSliderButtonBorderColor, 'important');
			
		} );
	} );

   	//Update slider text holder box
	api( 'ko_band_slider_text_holder_background_color', function( value ) {
		value.bind( function( newtextHolderBgColor ) {
		   
			$('.sl-content').css('background-color', newtextHolderBgColor, 'important');
			$('.sl-content').css('opacity', newtextHolderBgColor, 'important');
			
		} );
	} );
  
  	//Show hider slider text holder box
	api( 'ko_band_home_page_box_background', function( value ) {
		value.bind( function( newBgHolderMode ) {
		    if(newBgHolderMode == false){   
		       $('.sl-content').addClass('no_background_color')
		    }
		    else if (newBgHolderMode == true){
		    	$('.sl-content').removeClass('no_background_color')
		    }
		});
	});

	//Show or hide search at footer
	api('ko_band_footer_search', function( value ) {
		value.bind( function( hideSearchFooter ) {
			if (hideSearchFooter == false){
				$('.search-form').slideUp()
			}
			else if (hideSearchFooter == '1'){
				$('.search-form').show()
			}
		});
	});
	
	//Show theband section bg image
	api( 'ko_band_theband_sectin_background_image', function( value ) {
		value.bind( function( newThebandSectionBGImage ) {

			$('#theband').css('background-image', 'url('+newThebandSectionBGImage+')', 'important');
			$('#theband').css('background-repeat', 'no-repeat', 'important');
			$('#theband').css('background-size', 'cover', 'important');
			$('#theband').css('background-position', 'center', 'important');
					
		} );
	} );

	//Update Beckground News section color
	api( 'ko_band_background_news_section_color', function( value ) {
		value.bind( function( newBGNewsSectionColor) {

			$('#News').css('background-color', newBGNewsSectionColor, 'important');
								
		} );
	} );

	//Update Beckground Tour section color
	api( 'ko_band_background_tour_section_color', function( value ) {
		value.bind( function( newBGTourSectionColor) {

			$('#Tour').css('background-color', newBGTourSectionColor, 'important');
								
		} );
	} );

	//Update Beckground Discography section color
	api( 'ko_band_background_discography_section_color', function( value ) {
		value.bind( function( newBGDiscographySectionColor) {

			$('#Discography').css('background-color', newBGDiscographySectionColor, 'important');
								
		} );
	} );

	//Update Beckground Gallery section color
	api( 'ko_band_background_gallery_section_color', function( value ) {
		value.bind( function( newBGMediaSectionColor) {

			$('#Media').css('background-color', newBGMediaSectionColor, 'important');
								
		} );
	} );

	//Update Beckground Footer section color
	api( 'ko_band_footer_section_background_color', function( value ) {
		value.bind( function( newBGFooterSectionColor) {

			$('.footer-section').css('background-color', newBGFooterSectionColor, 'important');
								
		} );
	} );

	//Update Footer Menu font color
	api( 'ko_band_footer_menu_font_color', function( value ) {
		value.bind( function( newFooterMenuFontColor) {

			$('.footer-menu .menu li a').css('color', newFooterMenuFontColor, 'important');
								
		} );
	} );

	//Update Footer Menu font size
	api( 'ko_band_footer_menu_font_size', function( value ) {
		value.bind( function( newFooterMenuFontSize) {

			$('.footer-menu .menu li a').css('font-size', newFooterMenuFontSize, 'important');
								
		} );
	} );

	/*SLIDER Live changes ends here */


} )( jQuery );