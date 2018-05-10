jQuery(function($) {

  var file_frame;


  $(document).on('click', '#ko_band_gallery-metabox a.gallery-add', function(e) {
  e.preventDefault();

  if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      
        title: $(this).data('uploader-title'),
        button: {
        text: $(this).data('uploader-button-text'),
        },
        multiple: true
    });

    file_frame.on('select', function() {
       
        var listIndex = $('#gallery-metabox-list li').index($('#gallery-metabox-list li:last')),    
        
        selection = file_frame.state().get('selection');

        selection.map(function(attachment, i) {
        attachment = attachment.toJSON(),
        index      = listIndex + (i + 1);

      $('#gallery-metabox-list').append('<li><input type="hidden" name="vdw_gallery_id[' + index + ']" value="' + attachment.id + '"><img class="image-preview" src="' + attachment.sizes.thumbnail.url + '"><a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change image</a><a class="remove-image button button-small" href="#">Remove image</a></li>');
      
      });

    });

  makeSortable();
    
  file_frame.open();

  });

  $(document).on('click', '#ko_band_gallery-metabox a.change-image', function(e) {

    e.preventDefault();

    var that = $(this);

    if (file_frame) file_frame.close();

        file_frame = wp.media.frames.file_frame = wp.media({
        title: $(this).data('uploader-title'),
        button: {
        text: $(this).data('uploader-button-text'),
      },
        multiple: false
    });

      file_frame.on( 'select', function() {
      
      attachment = file_frame.state().get('selection').first().toJSON();

      that.parent().find('input:hidden').attr('value', attachment.id);
      that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
    
    });

      file_frame.open();

  });

  function resetIndex() {
      $('#gallery-metabox-list li').each(function(i) {
      $(this).find('input:hidden').attr('name', 'vdw_gallery_id[' + i + ']');
    
    });
  }



  function makeSortable() {
      $('#gallery-metabox-list').sortable({
        opacity: 0.6,
        stop: function() {
        resetIndex();
      }

    });

  }

  $(document).on("click", "#ko_band_gallery-metabox a.remove-image", function(e) {
    e.preventDefault();

       $(this).parent().remove(); 
  });


});

jQuery(document).ready(function( $ ){ 
        
    // Saving the selected radio button for Slides //
        var slide = $("input[type=radio][name='ko_band_slides_check']:checked").val()
        if (slide == "image") 
          {
            $("#slider-video").hide();
            $("#slide-title").hide()
          };
         if (slide == "video") {
            $("#slider-video").show();
            $("#slide-title").show();
          };

    // Saving the selected radio button for Tour //
        var sale = $("input[type=radio][name='ko_band_tour_ticket']:checked").val()
        if (sale == "soldout") 
          {
            $("#tickets-link").hide();
            $("#tickets-title").hide()
          };
         if (sale == "available") {
            $("#tickets-link").show();
            $("#tickets-title").show();
          };

    // Repetable fields functions starts here //
        $( '#add-row-details' ).unbind('click').bind('click', function() {
            var row_details = $( '.empty-row-detail.screen-reader-text' ).clone(true);
            row_details.removeClass( 'empty-row-details screen-reader-text' );
            row_details.insertBefore( '#ko_band_album_meta_box_one .row:last' );
            return false;
        });
            $( '.remove-row-details' ).on('click', function() {
            $(this).parents('.row').remove();
            return false; 
       }); 

        $( '#add-row-stores' ).unbind('click').bind('click', function() {
            var row_stores = $( '.empty-row-stores.screen-reader-text' ).clone(true);
            row_stores.removeClass( 'empty-row-stores screen-reader-text' );
            row_stores.insertBefore( '#ko_band_album_meta_box_store .row:last' );
            return false;
        });
            $( '.remove-row-stores' ).on('click', function() {
            $(this).parents('.row').remove();
            return false;
        });
    // Album Repetable fields ends here //
        $( '#add-row-media' ).unbind('click').bind('click', function() {
            var row_media = $( '.empty-row-media.screen-reader-text' ).clone(true);
            row_media.removeClass( 'empty-row-media screen-reader-text' );
            row_media.insertBefore( '#ko_band_repetable_video_field_one .row:last' );
            return false;
        });
    
        $( '.remove-row' ).on('click', function() {
            $(this).parents('.row').remove();
            return false;
        });
    // Media Repetable fields ends here //
        $( '#add-row-single' ).unbind('click').bind('click', function() {
            var row_single = $( '.empty-row-singles.screen-reader-text' ).clone(true);
            row_single.removeClass( 'empty-row-singles screen-reader-text' );
            row_single.insertBefore( '#ko_band_repetable_singles_stores_one .row:last' );
            return false;
        });
            $( '.remove-row' ).on('click', function() {
            $(this).parents('.row').remove();
            return false;
        }); 
    // Single Repetable fields ends here //

    // Show hide fields for Tickets on Tour CPT radio buttons//
            $('#id_radio1').click(function () {
            $('#tickets-link').show('fast');
            $('#tickets-title').show('fast');
        });
            $('#id_radio2').click(function () {
            $('#tickets-link').hide('fast');
            $('#tickets-title').hide('fast');
        });
    // Show hide fields for Slides CPT radio buttons//
            $('#radio2').click(function () {
            $('#slider-video').show('fast');
            $('#slide-title').show('fast');

        });
            $('#radio1').click(function () {
            $('#slider-video').hide('fast');
            $('#slide-title').hide('fast');

        });
    //Limiting the number of characters for textarea to 250 chars//
            var maxLength = 250;
            $('textarea').keyup(function() {
            var textlen = maxLength - $(this).val().length;
        });           

    //Disable Selected Option at other select-box if is selected at another one
             
    $(document).on('change','#_customize-input-ko_band_first_render_moduls',function(){
        
        var firstSelect = $('#_customize-input-ko_band_first_render_moduls').val();
   

        var secondSelect = $('#_customize-input-ko_band_second_render_moduls');
        var thirdSelect = $('#_customize-input-ko_band_third_render_moduls');
        var fourthSelect = $('#_customize-input-ko_band_fourth_render_moduls');
        var fifthSelect = $('#_customize-input-ko_band_fifth_render_moduls');

        
        $('select').on('change', function(event) {
        //restore previously selected value
        var prevValue = $(this).data('previous');
        $('select').not(this).find('option[value="'+prevValue+'"]').show();
        //hide option selected                
        var value = $(this).val();
        //update previously selected data
        $(this).data('previous',value);
        $('select').not(this).find('option[value="'+value+'"]').hide();
        });

  });

    $(document).on('change','#_customize-input-ko_band_second_render_moduls',function(){
        
        var firstSelect = $('#_customize-input-ko_band_second_render_moduls').val();

        var secondSelect = $('#_customize-input-ko_band_first_render_moduls');
        var thirdSelect = $('#_customize-input-ko_band_third_render_moduls');
        var fourthSelect = $('#_customize-input-ko_band_fourth_render_moduls');
        var fifthSelect = $('#_customize-input-ko_band_fifth_render_moduls');


        $('select').on('change', function(event) {
        //restore previously selected value
        var prevValue = $(this).data('previous');
        $('select').not(this).find('option[value="'+prevValue+'"]').show();
        //hide option selected                
        var value = $(this).val();
        //update previously selected data
        $(this).data('previous',value);
        $('select').not(this).find('option[value="'+value+'"]').hide();
        });
    

  });

    $(document).on('change','#_customize-input-ko_band_third_render_moduls',function(){
        
        var firstSelect = $('#_customize-input-ko_band_third_render_moduls').val();

        var secondSelect = $('#_customize-input-ko_band_first_render_moduls');
        var thirdSelect = $('#_customize-input-ko_band_second_render_moduls');
        var fourthSelect = $('#_customize-input-ko_band_fourth_render_moduls');
        var fifthSelect = $('#_customize-input-ko_band_fifth_render_moduls');


        $('select').on('change', function(event) {
        //restore previously selected value
        var prevValue = $(this).data('previous');
        $('select').not(this).find('option[value="'+prevValue+'"]').show();
        //hide option selected                
        var value = $(this).val();
        //update previously selected data
        $(this).data('previous',value);
        $('select').not(this).find('option[value="'+value+'"]').hide();
        });
    

  });

    $(document).on('change','#_customize-input-ko_band_fourth_render_moduls',function(){
        
        var firstSelect = $('#_customize-input-ko_band_fourth_render_moduls').val();

        var secondSelect = $('#_customize-input-ko_band_first_render_moduls');
        var thirdSelect = $('#_customize-input-ko_band_second_render_moduls');
        var fourthSelect = $('#_customize-input-ko_band_third_render_moduls');
        var fifthSelect = $('#_customize-input-ko_band_fifth_render_moduls');


        $('select').on('change', function(event) {
        //restore previously selected value
        var prevValue = $(this).data('previous');
        $('select').not(this).find('option[value="'+prevValue+'"]').show();
        //hide option selected                
        var value = $(this).val();
        //update previously selected data
        $(this).data('previous',value);
        $('select').not(this).find('option[value="'+value+'"]').hide();
        });
    
  }); 

      $(document).on('change','#_customize-input-ko_band_fifth_render_moduls',function(){
        
        var firstSelect = $('#_customize-input-ko_band_fifth_render_moduls').val();

        var secondSelect = $('#_customize-input-ko_band_first_render_moduls');
        var thirdSelect = $('#_customize-input-ko_band_second_render_moduls');
        var fourthSelect = $('#_customize-input-ko_band_third_render_moduls');
        var fifthSelect = $('#_customize-input-ko_band_fourth_render_moduls');


        $('select').on('change', function(event) {
        //restore previously selected value
        var prevValue = $(this).data('previous');
        $('select').not(this).find('option[value="'+prevValue+'"]').show();
        //hide option selected                
        var value = $(this).val();
        //update previously selected data
        $(this).data('previous',value);
        $('select').not(this).find('option[value="'+value+'"]').hide();
        });
    
  }); 


      // On customize on slider section hide video-fields when image is selected

      $(document.body).on('change',"#_customize-input-ko_band_home_page_slider_type",function (e) {
          
          if($(this).val() == 'Image'){ 
            $('#customize-control-ko_band_home_page_slider_videolink').addClass("hide_video_slider_fields");
            $('#customize-control-ko_band_home_page_slider_title').addClass("hide_video_slider_fields");
            $('#customize-control-ko_band_home_page_slider_text').addClass("hide_video_slider_fields");
            $('#customize-control-ko_band_home_page_slider_buttontitle').addClass("hide_video_slider_fields");
            $('#customize-control-ko_band_home_page_slider_buttonlink').addClass("hide_video_slider_fields");
          }
          if($(this).val() == 'Video'){
            $('#customize-control-ko_band_home_page_slider_videolink').removeClass("hide_video_slider_fields");
            $('#customize-control-ko_band_home_page_slider_title').removeClass("hide_video_slider_fields");
            $('#customize-control-ko_band_home_page_slider_text').removeClass("hide_video_slider_fields");
            $('#customize-control-ko_band_home_page_slider_buttontitle').removeClass("hide_video_slider_fields");
            $('#customize-control-ko_band_home_page_slider_buttonlink').removeClass("hide_video_slider_fields");
          }
         var optVal= $("#_customize-input-ko_band_home_page_slider_type option:selected").val();
      });        


});     // Ready function ends here //