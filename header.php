<?php
/**
 * Koband Theme Options file!
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
<body>
                <header class="clearfix">
                    <div class="main-logo clearfix">
                    <?php $logo = get_theme_mod( 'ko_band_main_logo' ); ?>
                    <img src="<?php echo $logo; ?>" class="logo">
                    </div>
                    
                    <div class="retina-main-logo">
                    <?php $logo_retina = get_theme_mod( 'ko_band_retina_main_logo' ); ?>
                    <img src="<?php echo $logo_retina; ?>">
                    </div>                 

                  <nav class="clearfix">
                    <div class="main-nav" >
                      <?php
                        $args = array(
                          'theme_location' => 'primary'
                        );
                      ?>

                      <?php wp_nav_menu($args); ?>
                    </div>
                  </nav>
                </header>