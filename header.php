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
</head>
<!--<script type="text/javascript">
  jQuery(document).ready(function( $ ){ 

 $('.carousel').carousel(); 
});
</script> -->
<body>
                <header>
                  <nav>
                  <div class="container">                    
                    <div class="main-logo clearfix">
                    <?php $logo = get_theme_mod( 'ko_band_main_logo' ); ?>
                    <img src="<?php echo $logo; ?>" class="logo">
                    </div>
                    
                    <div class="retina-main-logo">
                    <?php $logo_retina = get_theme_mod( 'ko_band_retina_main_logo' ); ?>
                    <img src="<?php echo $logo_retina; ?>">
                    </div>                 

                  
                    <div class="main-nav">
                      <?php
                        $args = array(
                          'theme_location' => 'primary'
                        );
                      ?>

                      <?php wp_nav_menu($args); ?>
                    </div>

                  </nav>
                  </div>
          
         

                </header>

