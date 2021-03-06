<?php
/**
 * 
 *
 * Template Name: Tour
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?> 
<div id="Tour" class="section">
    <div class="container">
        <div class="container">
            <div class="row">
                <h1 class="first_color heading_font"><?php echo esc_html__('Tour', 'koband');?></h1>
            </div>
        </div>
        <div class="row">

    <?php
    $args_tour = array
    (		
	 	 'post_type' => 'tour',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => '10'
	);
    $tour_posts = new WP_Query( $args_tour );
    if ( $tour_posts->have_posts() ) : ?>
    <!--start loop-->
        <div class="divTable">
            <div class="divTableBody koband_post_tour">
                <div class="divTableRow">
                    <div class="divTableHeading border_first_color main_font_color heading_font"><?php echo esc_html__('Date', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color heading_font"><?php echo esc_html__('Location', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color heading_font"><?php echo esc_html__('Venue', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color heading_font"><?php echo esc_html__('Ticket', 'koband');?></div>
                </div>
                      
                <?php

    	        while ( $tour_posts->have_posts() ) : $tour_posts->the_post(); 
        		    $post_id = get_the_ID();  
                    $tour_date = get_post_meta( $post_id, 'ko_band_tour_date', false );
            		$tour_country = get_post_meta($post_id, "ko_band_tour_country", false );
            		$tour_city = get_post_meta($post_id, "ko_band_tour_city", false );
            		$tour_address = get_post_meta($post_id, "ko_band_tour_address", false );
            		$tour_zipcode = get_post_meta($post_id,  "ko_band_tour_zipCode", false );
            		$tour_venuename = get_post_meta($post_id,  "ko_band_tour_venue_name", false );
            		$tour_ticket = get_post_meta($post_id,  "ko_band_tour_ticket", false );
            		$tour_ticketlink = get_post_meta($post_id, "ko_band_tour_ticket_link", false );
                    ?>
                    <div class="divTableRow ">
                    	<div class="divTableCell border_first_color main_font_color main_font"><?php if(isset($tour_date[0])) { echo esc_attr($tour_date[0]); } ?></div>
                    	<div class="divTableCell border_first_color main_font_color main_font"><?php if(isset($tour_country[0])) { echo esc_attr($tour_country[0]); } ?> / <?php if(isset($tour_city[0]))  { echo esc_attr($tour_city[0]); } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><a class="first_color venue_name main_font" href="<?php the_permalink();?>" target="_blank" ><?php if(isset($tour_venuename[0]))  { echo esc_attr($tour_venuename[0]); } ?></a></div>
                    	<div class="divTableCell border_first_color main_font_color ticket main_font"><?php if($tour_ticket[0] == 'avaliable'){ ?>

                            <?php if(isset($tour_ticketlink[0])) {?><a href="<?php echo  esc_url($tour_ticketlink[0]);?>"><span class="btn_tour onsale_btn border_color main_font"><?php echo esc_html__('On Sale', 'koband');?></span></a><?php } ?>

                        <?php }elseif ($tour_ticket[0] == 'soldout') { ?>
                          <span class="btn_tour soldout_btn border_color main_font"><?php echo esc_html__('Sold Out', 'koband');?></span>
                        <?php  } ?>
                        </div>
                    	
                    </div>
                <?php endwhile;?> <!-- end of the loop.  -->
            </div>
        </div><!--divTable-->
    <?php endif;?>
        </div><!--row-->
        <div class="container text-center">
            <div class="row">
                <div class="btn-koband-load koband_load_tour border_color first_color main_font" data-page="1" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')); ?>">
                    <span class="koband-loading first_color main_font"><?php echo esc_html__('Loading...','koband');?></span>
                    <span class="text first_color main_font"><?php echo esc_html__('Load tour','koband');?></span></div>
                <a class="no-tour"><span class="tour-posts first_color main_font"><?php echo esc_html__('There are no more tours', 'koband');?>   <i class="far fa-smile"></i></span></a>
            </div>
        </div><!--container-->
    </div><!--container-->
</div><!--Tour-->
