<?php
/**
 * Koband Theme Options header file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

wp_head(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <title><?php bloginfo( 'name' ); ?></title>

  <?php wp_head();?>
   
</head>
  <body <?php body_class(); ?>>
    <header>
      <nav class="menu-noscroll">
      <div class="container">                    
        <div class="main-logo clearfix">
        <?php $logo = get_theme_mod( 'ko_band_main_logo' ); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($logo); ?>" class="logo"></a>
        </div>
        
        <div class="retina-main-logo">
        <?php $logo_retina = get_theme_mod( 'ko_band_retina_main_logo' ); ?>
        <img src="<?php echo esc_url($logo_retina); ?>">
        </div>                 

      
        <div class="main-nav">
          <?php
            $args = array(
              'theme_location' => 'secondary'
            );
          ?>

          <?php wp_nav_menu($args); ?>             
        </div>
      </div>
      </nav>
    </header>
<div id="content" class="no-scroll-content"></div>
<a href="#" id="back-to-top" class="first_color" title="Back to top">&uarr;</a>
                  

                  
         

