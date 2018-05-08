<?php 
/**
 * Koband Theme Options file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/********** koband Main theme settings  *******************/
function ko_band_theme_customize_register( $wp_customize ) {

/*** Main Top Logo ***/
$wp_customize->add_setting( 'ko_band_main_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_main_logo', array(
    'label'    => esc_html__( 'Main top Logo', 'koband' ),
    'section'  => 'title_tagline',
    'settings' => 'ko_band_main_logo',
) ) );

/*** Main Top Retina Logo ***/
$wp_customize->add_setting( 'ko_band_retina_main_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_retina_main_logo', array(
    'label'    => esc_html__( 'Main top Retina Logo', 'koband' ),
    'section'  => 'title_tagline',
    'settings' => 'ko_band_retina_main_logo',
) ) );

/*******************************************************************************************************/

 /*** Main Footer Logo ***/
$wp_customize->add_setting( 'ko_band_footer_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_footer_logo', array(
    'label'    => esc_html__( 'Footer logo', 'koband' ),
    'section'  => 'title_tagline',
    'settings' => 'ko_band_footer_logo',
) ) );

 /*** Main Footer Retina Logo ***/
$wp_customize->add_setting( 'ko_band_retina_footer_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_retina_footer_logo', array(
    'label'    => esc_html__( 'Footer Retina logo', 'koband' ),
    'section'  => 'title_tagline',
    'settings' => 'ko_band_retina_footer_logo',
) ) );

/************************************************************************************************************/
 
 /** Show Retina favicon***/
$wp_customize->add_setting( 'ko_band_retina_favicon' );
$wp_customize->add_control( new WP_Customize_Site_Icon_Control ( $wp_customize, 'ko_band_retina_favicon', array(
  'label'    => esc_html__( 'Retina Site Icon', 'koband' ),
  'section'  => 'title_tagline',
  'settings' => 'ko_band_retina_favicon',
  'description' => 'Retina Ready Favicon:'
) ) );

/*******************************************************************************************************/

/***Koband Theme Colors***/

/*** Main Font color ***/
$wp_customize->add_setting( 'ko_band_main_font_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_main_font_color', array(
        'label'      => esc_html__( 'Main Font Color', 'koband' ),
        'section'    => 'colors',
        'settings'   => 'ko_band_main_font_color',
) ) );

/*** First theme color ***/
$wp_customize->add_setting( 'ko_band_first_theme_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_first_theme_color', array(
        'label'      => esc_html__( ' First Theme Color', 'koband' ),
        'section'    => 'colors',
        'settings'   => 'ko_band_first_theme_color',
) ) );

/*** Second theme color ***/
$wp_customize->add_setting( 'ko_band_second_theme_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_second_theme_color', array(
        'label'      => esc_html__( 'Second Theme Color', 'koband' ),
        'section'    => 'colors',
        'settings'   => 'ko_band_second_theme_color',
) ) );


/***Background News module color **/
$wp_customize->add_setting( 'ko_band_background_news_section_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_background_news_section_color', array(
        'label'      => esc_html__( 'News Section Background Color', 'koband' ),
        'section'    => 'colors',
        'settings'   => 'ko_band_background_news_section_color',
) ) );


/***Background Tour module color **/
$wp_customize->add_setting( 'ko_band_background_tour_section_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_background_tour_section_color', array(
        'label'      => esc_html__( 'Tour Section Background Color', 'koband' ),
        'section'    => 'colors',
        'settings'   => 'ko_band_background_tour_section_color',
) ) );
/***Background Discography module color **/
$wp_customize->add_setting( 'ko_band_background_discography_section_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_background_discography_section_color', array(
        'label'      => esc_html__( 'Discography Section Background Color', 'koband' ),
        'section'    => 'colors',
        'settings'   => 'ko_band_background_discography_section_color',
) ) );

/***Background Gallery module color **/
$wp_customize->add_setting( 'ko_band_background_gallery_section_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_background_gallery_section_color', array(
        'label'      => esc_html__( 'Gallery Section Background Color', 'koband' ),
        'section'    => 'colors',
        'settings'   => 'ko_band_background_gallery_section_color',
) ) );

/*** Footer Background color **/
$wp_customize->add_setting( 'ko_band_footer_section_background_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_footer_section_background_color', array(
        'label'      => esc_html__( 'Footer Section Background Color', 'koband' ),
        'section'    => 'colors',
        'settings'   => 'ko_band_footer_section_background_color',
) ) );


/********************************************************************************************************/

/*Fonts Section start here*/
$wp_customize->add_section( 'ko_band_fonts_section' , array(
    'title'       => esc_html__( 'Fonts', 'koband' ),
    'priority'    => 26,
    'description' => '<hr>',
) );

/**Theme font size**/
$wp_customize->add_setting( 'ko_band_theme_font_size' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_theme_font_size',
    array(
        'label' => esc_html__( 'Theme Font Size (in px.)', 'koband' ),
        'section' => 'ko_band_fonts_section',
        'settings'   => 'ko_band_theme_font_size',
        'type' => 'number',
) ) );

/**Theme line height***/
$wp_customize->add_setting( 'ko_band_theme_line_height' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_theme_line_height',
    array(
        'label' => esc_html__( 'Theme Line Height (in px.)', 'koband' ),
        'section' => 'ko_band_fonts_section',
        'settings'   => 'ko_band_theme_line_height',
        'type' => 'number',    
) ) );


/*** Main Font Selector ***/
$wp_customize->add_setting( 'ko_band_general_font_selector' );
$wp_customize->add_control( 'ko_band_general_font_selector', array(

        'type'      => 'select',
        'label'      => esc_html__( 'Select main website font:', 'koband' ),
        'section'    => 'ko_band_fonts_section',
        'settings'   => 'ko_band_general_font_selector',
        'choices' => array(
            'Open+Sans' => 'Open Sans',
            'Josefin+Slab' => 'Josefin Slab',
            'Arvo' => 'Arvo',
            'Lato' => 'Lato',
            'Vollkorn' => 'Vollkorn',
            'Abril+Fatface' => 'Abril Fatface',
            'Ubuntu' => 'Ubuntu',
            'PT+Sans' => 'PT Sans',
            'Old+Standard TT' => 'Old Standard TT',
            'Droid+Sans' => 'Droid Sans',
            'Anivers' => 'Anivers',
            'Source+Sans+Pro' => 'Source Sans Pro',
            'Fertigo' => 'Fertigo',
            'Allerta' => 'Allerta',
            'Montserrat' => 'Montserrat',
            'Raleway' => 'Raleway',
            'Prociono' => 'Prociono',
            'Roboto' => 'Roboto',
            'Roboto+Condensed' => 'Roboto Condensed',
), ) );

/*** H1, H2, H3, H4, H5, h6, H7........ Font Selector ***/
$wp_customize->add_setting( 'ko_band_heading_font_selector' );
$wp_customize->add_control( 'ko_band_heading_font_selector', array(

        'type'      => 'select',
        'label'      => esc_html__( 'Select Heading (h1, h2, h3) font:', 'koband' ),
        'section'    => 'ko_band_fonts_section',
        'settings'   => 'ko_band_heading_font_selector',
        'choices' => array(
            'Open+Sans' => 'Open Sans',
            'Josefin+Slab' => 'Josefin Slab',
            'Arvo' => 'Arvo',
            'Lato' => 'Lato',
            'Vollkorn' => 'Vollkorn',
            'Abril+Fatface' => 'Abril Fatface',
            'Ubuntu' => 'Ubuntu',
            'PT+Sans' => 'PT Sans',
            'Old+Standard TT' => 'Old Standard TT',
            'Droid+Sans' => 'Droid Sans',
            'Anivers' => 'Anivers',
            'Source+Sans+Pro' => 'Source Sans Pro',
            'Fertigo' => 'Fertigo',
            'Allerta' => 'Allerta',
            'Montserrat' => 'Montserrat',
            'Raleway' => 'Raleway',
            'Prociono' => 'Prociono',
            'Roboto' => 'Roboto',
            'Roboto+Condensed' => 'Roboto Condensed',
), ) ); 


/**************************************************************************************************************/

$main_slider =   get_theme_mod( 'ko_band_home_page_slider_type');

/*Slide section type start here */
$wp_customize->add_section( 'ko_band_slider_section' , array(
    'title'       => esc_html__( ' Slider', 'koband' ),
    'priority'    => 30,
    'description' => $main_slider,
) );
/*Slider box to choose is image or video*/
$wp_customize->add_setting( 'ko_band_home_page_slider_type' );
$wp_customize->add_control( 'ko_band_home_page_slider_type', array(
    'label' => esc_html__( 'Enable Slide types:', 'koband' ),
    'settings' => 'ko_band_home_page_slider_type',
    'section' => 'ko_band_slider_section',
    'type'     => 'select',
    'choices' => array(
                'Image' => esc_html__( 'Image',       'koband' ),
                'Video' => esc_html__( 'Video',       'koband' ),
               
)  )  );

/*** Slider text color ***/
$wp_customize->add_setting( 'ko_band_slider_text_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_slider_text_color', array(
        'label'      => esc_html__( ' Text Color', 'koband' ),
        'section'    => 'ko_band_slider_section',
        'settings'   => 'ko_band_slider_text_color',
) ) );

/*** Slider Button text color ***/
$wp_customize->add_setting( 'ko_band_slider_button_text_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_slider_button_text_color', array(
        'label'      => esc_html__( 'Button Text Color', 'koband' ),
        'section'    => 'ko_band_slider_section',
        'settings'   => 'ko_band_slider_button_text_color',
) ) );

/*** Slider Button Background color ***/
$wp_customize->add_setting( 'ko_band_slider_button_background_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_slider_button_background_color', array(
        'label'      => esc_html__( 'Button Background Color', 'koband' ),
        'section'    => 'ko_band_slider_section',
        'settings'   => 'ko_band_slider_button_background_color',
) ) );

/*** Slider Button Hover Background color ***/
$wp_customize->add_setting( 'ko_band_slider_button_hover_background_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_slider_button_hover_background_color', array(
        'label'      => esc_html__( 'Button Hover Background Color', 'koband' ),
        'section'    => 'ko_band_slider_section',
        'settings'   => 'ko_band_slider_button_hover_background_color',
) ) );

/*** Slider Text Holder Background color ***/
$wp_customize->add_setting( 'ko_band_slider_text_holder_background_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_slider_text_holder_background_color', array(
        'label'      => esc_html__( 'Text Holder Background Color', 'koband' ),
        'section'    => 'ko_band_slider_section',
        'settings'   => 'ko_band_slider_text_holder_background_color',
) ) );

/*Slider Video Link**/
$wp_customize->add_setting( 'ko_band_home_page_slider_videolink' );
$wp_customize->add_control( 'ko_band_home_page_slider_videolink', array(
  'settings' => 'ko_band_home_page_slider_videolink',
  'label'    => esc_html__( 'Background Video Link:', 'koband' ),
  'section'  => 'ko_band_slider_section',
  'type'     => 'text',
  'description' => esc_html__('*Only Youtube Video are allowed! ', 'koband' ),
   'input_attrs' => array(
            'placeholder' => esc_html__( 'https://www.youtube.com', 'koband' ),
        )
 ));

/*Video Title**/
$wp_customize->add_setting( 'ko_band_home_page_slider_title' );
$wp_customize->add_control( 'ko_band_home_page_slider_title', array(
  'settings' => 'ko_band_home_page_slider_title',
  'label'    => esc_html__( 'Slider Title:', 'koband' ),
  'section'  => 'ko_band_slider_section',
  'type'     => 'text'
));

/*Video SubTitle**/
$wp_customize->add_setting( 'ko_band_home_page_slider_text' );
$wp_customize->add_control( 'ko_band_home_page_slider_text', array(
  'settings' => 'ko_band_home_page_slider_text',
  'label'    => esc_html__( 'Slider Text:', 'koband' ),
  'section'  => 'ko_band_slider_section',
  'type' => 'textarea'
));

/*Video Button Title**/
$wp_customize->add_setting( 'ko_band_home_page_slider_buttontitle' );
$wp_customize->add_control( 'ko_band_home_page_slider_buttontitle', array(
  'settings' => 'ko_band_home_page_slider_buttontitle',
  'label'    => esc_html__( 'Button Title:', 'koband' ),
  'section'  => 'ko_band_slider_section',
  'type'     => 'text'
));

/*Video Button Link**/
$wp_customize->add_setting( 'ko_band_home_page_slider_buttonlink' );
$wp_customize->add_control( 'ko_band_home_page_slider_buttonlink', array(
  'settings' => 'ko_band_home_page_slider_buttonlink',
  'label'    => esc_html__( 'Button Link:', 'koband' ),
  'section'  => 'ko_band_slider_section',
  'type'     => 'link'  
));

/*Slider box  background show/hide*/
$wp_customize->add_setting( 'ko_band_home_page_box_background' );
$wp_customize->add_control( 'ko_band_home_page_box_background', array(
    'label' => esc_html__( 'Check if you like to show box background:', 'koband' ),
    'settings' => 'ko_band_home_page_box_background',
    'section' => 'ko_band_slider_section',
    'type'     => 'checkbox',
   
 )  );

/*Slide section type end here */
/**********************************************************************************************************************/
/***** Main Menu Section start here********/

/*** Main Menu font color ***/
$wp_customize->add_setting( 'ko_band_main_menu_font_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_main_menu_font_color', array(
        'label'      => esc_html__( ' Menu Font Color', 'koband' ),
        'section'    => 'nav_menu[2]',
        'settings'   => 'ko_band_main_menu_font_color',
) ) );

/** Main Menu font size**/
$wp_customize->add_setting( 'ko_band_main_menu_font_size' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_main_menu_font_size',
    array(
        'label' => esc_html__( 'Menu Font Size (in px.)', 'koband' ),
        'section' => 'nav_menu[2]',
        'settings'   => 'ko_band_main_menu_font_size',
        'type' => 'number',
) ) );

/*** Main Menu background color ***/
$wp_customize->add_setting( 'ko_band_main_menu_background_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_main_menu_background_color', array(
        'label'      => esc_html__( ' Menu Background Color', 'koband' ),
        'section'    => 'nav_menu[2]',
        'settings'   => 'ko_band_main_menu_background_color',
) ) );

/***** Main Menu Section end here********/
/************************************************************************************************************************/

/*Home page Modules start here*/
/*First Module*/
$wp_customize->add_setting( 'ko_band_first_render_modules' );
$wp_customize->add_control( 'ko_band_first_render_modules',
    array(

        'label' => esc_html__( 'First Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_first_render_modules',
        'type' => 'select',
        'choices' => array(
            'Blank' => esc_html__( 'blank',       'koband' ),
            'News' => esc_html__( 'News',       'koband' ),
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
)  )  );


/*Second module**/
$wp_customize->add_setting( 'ko_band_second_render_modules' );
$wp_customize->add_control( 'ko_band_second_render_modules',
    array(
        'label' => esc_html__( 'Second Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_second_render_modules',
        'type' => 'select',
         'choices' => array(
            'Blank' => esc_html__( 'blank',       'koband' ),
            'News' => esc_html__( 'News',       'koband' ),
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
)  )  );


/**Third module**/
$wp_customize->add_setting( 'ko_band_third_render_modules' );
$wp_customize->add_control( 'ko_band_third_render_modules',
    array(
        'label' => esc_html__( 'Third Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_third_render_modules',
        'type' => 'select',
       'choices' => array(
            'Blank' => esc_html__( 'blank',       'koband' ),
            'News' => esc_html__( 'News',       'koband' ),
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
)  )  );

/**Fourth module**/
$wp_customize->add_setting( 'ko_band_fourth_render_modules' );
$wp_customize->add_control( 'ko_band_fourth_render_modules',
    array(
        'label' => esc_html__( 'Fourth Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_fourth_render_modules',
        'type' => 'select',
        'choices' => array(
            'Blank' => esc_html__( 'blank',       'koband' ),
            'News' => esc_html__( 'News',       'koband' ),
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
)  )  );

/**Fifth module**/
$wp_customize->add_setting( 'ko_band_fifth_render_modules' );
$wp_customize->add_control( 'ko_band_fifth_render_modules',
    array(
        'label' => esc_html__( 'Fifth Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_fifth_render_modules',
        'type' => 'select',
        'choices' => array(
            'Blank' => esc_html__( 'blank',       'koband' ),
            'News' => esc_html__( 'News',       'koband' ),
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
)  )  );


/*Home page Modules end here*/
/***************************************************************************************************************************/

/***  Social media section starts here  ***/
$wp_customize->add_section( 'ko_band_social_media_section' , array(
    'title'       => esc_html__( 'Social Media', 'koband' ),
    'priority'    => 28,
    'description' => '<hr>',
) );



$wp_customize->add_setting( 'ko_band_facebook_social_media' );
$wp_customize->add_setting( 'ko_band_twitter_social_media' );
$wp_customize->add_setting( 'ko_band_insagram_social_media' );
$wp_customize->add_setting( 'ko_band_youtube_social_media' );
$wp_customize->add_setting( 'ko_band_spotify_social_media' );
$wp_customize->add_setting( 'ko_band_soundcloud_social_media' );
$wp_customize->add_setting( 'ko_band_bandcamp_social_media' );
$wp_customize->add_setting( 'ko_band_apple_social_media' );

/*Facebook*/
$wp_customize->add_control( 'ko_band_facebook_social_media', array(
    'genericon_class'   => 'facebook-alt',
    'label' => esc_html__( 'Facebook:', 'koband' ),
    'settings' => 'ko_band_facebook_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Twitter*/
$wp_customize->add_control( 'ko_band_twitter_social_media', array(
    'genericon_class'   => 'twitter',
    'label' => esc_html__( 'Twitter:', 'koband' ),
    'settings' => 'ko_band_twitter_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Instagram*/
$wp_customize->add_control( 'ko_band_insagram_social_media', array(
    'genericon_class'   => 'instagram',
    'label' => esc_html__( 'Instagram:', 'koband' ),
    'settings' => 'ko_band_insagram_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Youtube*/
$wp_customize->add_control( 'ko_band_youtube_social_media', array(
    'genericon_class'   => 'youtube',
    'label' => esc_html__( 'Youtube:', 'koband' ),
    'settings' => 'ko_band_youtube_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Spotify*/
$wp_customize->add_control( 'ko_band_spotify_social_media', array(
    'genericon_class'   => 'spotify',
    'label' => esc_html__( 'Spotify:', 'koband' ),
    'settings' => 'ko_band_spotify_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*SoundCloud*/
$wp_customize->add_control( 'ko_band_soundcloud_social_media', array(
    'label' => esc_html__( 'SoundCloud:', 'koband' ),
    'settings' => 'ko_band_soundcloud_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Bandcamp*/
$wp_customize->add_control( 'ko_band_bandcamp_social_media', array(
    'label' => esc_html__( 'Bandcamp:', 'koband' ),
    'settings' => 'ko_band_bandcamp_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Apple*/
$wp_customize->add_control( 'ko_band_apple_social_media', array(
    'label' => esc_html__( 'Apple:', 'koband' ),
    'settings' => 'ko_band_apple_social_media',
    'section' => 'ko_band_social_media_section',
) );

/***  Social media section end here  ***/
//************************************************************************************************************//

/*** The band section starts here  ***/
$wp_customize->add_section( 'ko_band_theband_section' , array(
    'title'       => esc_html__( 'The Band', 'koband' ),
    'priority'    => 29,
    'description' => '<hr>',
) );

/**The band Biography**/
$wp_customize->add_setting( 'ko_band_theband_biography' );
$wp_customize->add_control( 'ko_band_theband_biography', array(
    'label' => esc_html__( 'Biography:', 'koband' ),
    'settings' => 'ko_band_theband_biography',
    'section' => 'ko_band_theband_section',
    'type'     => 'textarea',
) );

/**The band Images**/
$wp_customize->add_setting( 'ko_band_theband_sectin_background_image' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_theband_sectin_background_image', array(
    'label' => esc_html__( 'The Band Sectin Background Image:', 'koband' ),
    'settings' => 'ko_band_theband_sectin_background_image',
    'section' => 'ko_band_theband_section',
   
)) );

/*** The band section end here  ***/
/***********************************************************************************************************************/

/*** Contact section starts here  ***/
$wp_customize->add_section( 'ko_band_contact_section' , array(
    'title'       => esc_html__( 'Contact', 'koband' ),
    'priority'    => 31,
    'description' => '<hr> Contact Information about your band',
) );

/*Contact Country*/
$wp_customize->add_setting( 'ko_band_contact_country' );
$wp_customize->add_control( 'ko_band_contact_country', array(
    'label' => esc_html__( 'Country:', 'koband' ),
    'settings' => 'ko_band_contact_country',
    'section' => 'ko_band_contact_section',
) );

/*Contact City*/
$wp_customize->add_setting( 'ko_band_contact_city' );
$wp_customize->add_control( 'ko_band_contact_city', array(
    'label' => esc_html__( 'City:', 'koband' ),
    'settings' => 'ko_band_contact_city',
    'section' => 'ko_band_contact_section',
) );

/*Contact Adress*/
$wp_customize->add_setting( 'ko_band_contact_address' );
$wp_customize->add_control( 'ko_band_contact_address', array(
    'label' => esc_html__( 'Address:', 'koband' ),
    'settings' => 'ko_band_contact_address',
    'section' => 'ko_band_contact_section',
) );

/*Contact Email*/
$wp_customize->add_setting( 'ko_band_contact_email' );
$wp_customize->add_control( 'ko_band_contact_email', array(
    'label' => esc_html__( 'E-mail Address:', 'koband' ),
    'settings' => 'ko_band_contact_email',
    'section' => 'ko_band_contact_section',
) );

/*Contact Phone*/
$wp_customize->add_setting( 'ko_band_contact_phone' );
$wp_customize->add_control( 'ko_band_contact_phone', array(
    'label' => esc_html__( 'Phone Number:', 'koband' ),
    'settings' => 'ko_band_contact_phone',
    'section' => 'ko_band_contact_section',
    'description' => ' Write phone number with prefix ex. +389...'
) );


/*** Contact section end here  ***/
/****************************************************************************************************************/

/*** Footer section starts here  ***/
$wp_customize->add_section( 'ko_band_footer_section' , array(
    'title'       => esc_html__( 'Footer', 'koband' ),
    'priority'    => 27,
    'description' => '<hr>',
) );

/*Copyright text*/
$wp_customize->add_setting( 'ko_band_footer_copyright' );
$wp_customize->add_control( 'ko_band_footer_copyright', array(
    'label' => esc_html__( 'Copyright text:', 'koband' ),
    'settings' => 'ko_band_footer_copyright',
    'section' => 'ko_band_footer_section',
) );


/*Search checkbox*/
$wp_customize->add_setting( 'ko_band_footer_search' );
$wp_customize->add_control( 'ko_band_footer_search', array(
    'settings' => 'ko_band_footer_search',
    'section' => 'ko_band_footer_section',
    'name'   => 'checkboxi',
    'type'    => 'checkbox', 
    'label' => esc_html__( ' Check this if you would like to add Search field in footer:', 'koband' ),
) );



/*** Footer section end here  ***/
/****************************************************************************************************************/

/***** Footer Menu Section start here********/

/*** Footer Menu font color ***/
$wp_customize->add_setting( 'ko_band_footer_menu_font_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_footer_menu_font_color', array(
        'label'      => esc_html__( ' Menu Font Color', 'koband' ),
        'section'    => 'nav_menu[3]',
        'settings'   => 'ko_band_footer_menu_font_color',
) ) );

/** Footer Menu font size**/
$wp_customize->add_setting( 'ko_band_footer_menu_font_size' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_footer_menu_font_size',
    array(
        'label' => esc_html__( 'Menu Font Size (in px.)', 'koband' ),
        'section' => 'nav_menu[3]',
        'settings'   => 'ko_band_footer_menu_font_size',
        'type' => 'number',
) ) );

/*** Footer Menu background color ***/
$wp_customize->add_setting( 'ko_band_footer_menu_background_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_footer_menu_background_color', array(
        'label'      => esc_html__( ' Menu Background Color', 'koband' ),
        'section'    => 'nav_menu[3]',
        'settings'   => 'ko_band_footer_menu_background_color',
) ) );

/***** Single Menu Section end here********/
/************************************************************************************************************************/

}
add_action( 'customize_register', 'ko_band_theme_customize_register' );

?>