<?php 
/*

============================
	KOBAND AJAX FUNCTIONS
============================

*/

/* 
===============================================
 Load more News with Load-More button
===============================================
*/

add_action( 'wp_ajax_nopriv_koband_load_more', 'koband_load_more' );
add_action( 'wp_ajax_koband_load_more', 'koband_load_more' );

function koband_load_more(){
	
	$paged = $_POST["page"]+1;
	$query = new WP_Query( array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 3,

	));

	if ( $query->have_posts() ) {?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
								<div class="col-md-4 box">
									<div class="card mb-4 box-shadow">
										<div class="news-title main_font_color"><h2 class="heading_font"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 4 ); ?></a></h2></div>
										<a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail('news_thumb'); ?></a>
										<div class="card-body">
											<div id="card-text" class="main_font_color main_font font_size"><?php the_excerpt(); ?></div>
												<div class="d-flex justify-content-between align-items-center">
													<div class="btn-group">
														<span  class="btn btn-sm btn-outline-secondary read_more main_font"><a href="<?php the_permalink();?>"><?php echo esc_html__('READ MORE →', 'koband');?></a></span>
													</div>
												</div>
										</div>
									</div>
								</div>	
		<?php endwhile; ?>
	<?php }

	else 
	{
       echo "end";
	}

	wp_reset_postdata();

	die();

}

/* 
===============================================
 Load more Media with Load-More button
===============================================
*/

add_action( 'wp_ajax_nopriv_koband_load_media', 'koband_load_media' );
add_action( 'wp_ajax_koband_load_media', 'koband_load_media' );

function koband_load_media(){
	
	$paged = $_POST["page"]+2;
	$gallery = new WP_Query( array(
		'post_type' => 'media',
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 4,

	));

	if ( $gallery->have_posts() ) { ?>
		<?php while ( $gallery->have_posts() ) : $gallery->the_post();?>
			<div class="col-lg-3 img-holder col-xs-12">
			    <div class="hovereffect">
			      <a href="<?php the_permalink();?>"><?php the_post_thumbnail('gallery_thumb');?></a>
		            <div class="overlay heading_font">
		                <h2 class="heading_font"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
							<a class="info" href="<?php the_permalink();?>">
							<i class="fas fa-link"></i></a>
		            </div>
			    </div>
			</div>
		<?php endwhile; ?>
	<?php } 

	else 
	{
       echo esc_html__("end-media", 'koband');
	}

	wp_reset_postdata();

	die();

}

/* 
===============================================
 Load more Tour with Load-More button
===============================================
*/

add_action( 'wp_ajax_nopriv_koband_load_tour', 'koband_load_tour' );
add_action( 'wp_ajax_koband_load_tour', 'koband_load_tour' );

function koband_load_tour(){
	
	$paged = $_POST["page"]+2;
	$tour = new WP_Query( array(
		'post_type' => 'tour',
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 5,

	));

	if ( $tour->have_posts() ) { ?>
        <?php while ( $tour->have_posts() ) : $tour->the_post();
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
            	<div class="divTableCell border_first_color main_font_color main_font"><?php if(isset($tour_date[0])) { echo  esc_attr($tour_date[0]); } ?></div>
            	<div class="divTableCell border_first_color main_font_color main_font"><?php if(isset($tour_country[0])) { echo  esc_attr($tour_country[0]); } ?> / <?php if(isset($tour_city[0]))  { echo  esc_attr($tour_city[0]); } ?></div>
            	<div class="divTableCell border_first_color main_font_color"><a class="first_color venue_name main_font" href="<?php the_permalink();?>" target="_blank" ><?php if(isset($tour_venuename[0]))  { echo  esc_attr($tour_venuename[0]); } ?></a></div>
            	<div class="divTableCell border_first_color main_font_color ticket main_font"><?php if($tour_ticket[0] == 'avaliable'){ ?>
                    <?php if(isset($tour_ticketlink[0])) {?><a href="<?php echo  esc_url($tour_ticketlink[0]);?>"><span class="btn_tour onsale_btn border_color main_font"><?php echo esc_html__('On Sale', 'koband');?></span></a><?php } ?>
              	<?php }elseif ($tour_ticket[0] == 'soldout') { ?>
                  <span class="btn_tour soldout_btn border_color main_font"><?php echo esc_html__('Sold Out', 'koband');?></span>
            	<?php  } ?>
                </div>
            </div>
        <?php endwhile;?> <!-- end of the loop.  -->
	<?php }

	else 
	{
       echo esc_html__("end-tour",'koband');
	}

	wp_reset_postdata();

	die();

} ?>