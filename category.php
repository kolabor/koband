<?php
/**
 * 
 *
 * Koband Theme Category
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header('noscroll'); ?>
<div class="container search-holder">
	<div class="row">
		<header class="archive-header">
			<h4 class="archive-title heading_font">
				<?php printf( esc_html__( 'Posts of category: %s', 'koband'),
				single_cat_title( '', false )); ?>
			</h4>
		</header>
	</div>
	<div class="row author-rows">
		<?php
		// Show an optional term description.
		$term_description = term_description();
		if (! empty( $term_description) ) :
			printf( esc_html_nx('<div class="taxonomy-description">%s</div>', $term_description, 'koband') );
		endif; ?>
		<?php if (have_posts() ) : ?>
		<!--start loop --> 
			<?php while ( have_posts() ) : the_post(); ?>
	            <div class="col-md-4">
	            	<div class="card mb-4 box-shadow">
						<div class="news-title main_font_color"><h2 class="heading_font"><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title(), 4 )); ?></a></h2></div>
						<a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail('news_thumb'); ?></a>
						<div class="card-body">
							<div id="card-text" class="main_font_color main_font"><?php the_excerpt(); ?></div>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<span  class="btn btn-sm btn-outline-secondary read_more main_font"><a href="<?php the_permalink();?>"><?php echo esc_html__('READ MORE →', 'koband');?></a></span>
									</div>
								</div>
						</div>
					</div>
				</div>	
        	<?php endwhile; ?>
		<?php endif; ?> 
	</div><!--row author-rows -->
	<div class="row author-rows"> 
		<?php
		$category = single_term_title("", false);
		$catid = get_cat_ID( $category );
		$args_category_tour = array
	    (		
	    	 'category_name' => $category,	
		 	 'post_type' => 'tour',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => -1,
		);
	    $category_tour_posts = new WP_Query( $args_category_tour );
	    if ( $category_tour_posts->have_posts() ) : ?>
	    	<header class="archive-header">
				<h4 class="archive-title">
					<?php printf( esc_html__( 'Tours of category: %s', 'koband'),
					single_cat_title( '', false )); ?>
				</h4>
			</header>
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
    	        while ( $category_tour_posts->have_posts() ) : $category_tour_posts->the_post(); 
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

                            <?php if(isset($tour_ticketlink[0])) {?><a href="<?php echo esc_url($tour_ticketlink[0]);?>"><span class="btn_tour onsale_btn border_color main_font"><?php echo esc_html__('On Sale', 'koband');?></span></a><?php } ?>

                      	<?php }elseif ($tour_ticket[0] == 'soldout') { ?>
                          <span class="btn_tour soldout_btn border_color main_font"><?php echo esc_html__('Sold Out', 'koband');?></span>
                    	<?php  } ?>
                        </div>
                    </div>

                <?php endwhile;?> <!-- end of the loop.  -->
            </div><!--divTableBody -->
        </div><!--divTable-->
	    <?php endif;?>
	</div><!--row author-rows -->
	<div class="row author-rows">
		<?php

		$args_category_album = array(
			'category_name' => $category,
		  	'post_type' => 'album',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1


			);
		$args_category_singles = array(
		  	'category_name' => $category,
		  	'post_type' => 'singles',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1		  
  
			); 
		$category_album_posts = new WP_Query($args_category_album); ?>
	   	<?php if ($category_album_posts->have_posts() ) : ?>
	   		<header class="archive-header">
				<h4 class="archive-title">
					<?php printf( esc_html__( 'Albums of category: %s', 'koband'),
					single_cat_title( '', false )); ?>
				</h4>
			</header>
			<?php while( $category_album_posts->have_posts() ) : $category_album_posts->the_post();
				$post_id = get_the_ID();?>
		
		<div class="container">
			<div class="row album-head border_first_color main_font_color">
				<div class="col-sm-1 cover_img"><a href="<?php the_permalink();?>" target="_blank" ><?php the_post_thumbnail(array(70,70));?></a></div>
				<div class="col-sm-3 album_title main_font_color main_font"><?php echo esc_html__('Album Name:', 'koband');?><br> <a href="<?php the_permalink();?>" target="_blank" ><span class="main_font_color"><?php the_title();?></span></a></div>

		        <?php 
		        $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
				$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
				$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
				$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false); ?>
					
				<div class="col-sm-3 album_title main_font_color main_font"><?php echo esc_html__('Date:', 'koband');?><br> <span class="main_font_color main_font"><?php if(isset($album_date[0])) { echo esc_attr($album_date[0]); } ?></span></div>
			    <div class="col-sm-3 album_title main_font_color main_font"><?php echo esc_html__('Length:', 'koband');?><br> <span class="main_font_color main_font"><?php if(isset($album_length[0])) { echo esc_attr($album_length[0]); } ?></span></div>
			    <div class="col-sm-1 album-up-down-buttons">
			    	<span class="btn btn-sm album-song">
				    	<a class="btn btn-sm show-album-song first_color"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Down.png"/></a>
				    	<a class="btn btn-sm hide-album-song first_color"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Up.png"/></a>
			    	</span>
			    </div>
			</div><!-- row -->        
			<div class="container album-songs-show-hide bg">
				<!-- Labels -->
				<div class="row album-info">
					<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Name', 'koband');?></div>
					<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Length', 'koband');?></div>
					<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Details', 'koband');?></div>
				</div>
				<div class="row song-list main_font_color">			
				<?php foreach ($album_song_details[0] as  $value_song_details) { ?>
					<div class="col-sm-4 song_info border_bottom line main_font"><?php if(isset($value_song_details['name-details'])) {echo esc_attr($value_song_details['name-details']);}?></div>
					<div class="col-sm-4 song_info border_bottom line main_font"><?php if(isset($value_song_details['length'])) {echo esc_attr($value_song_details['length']);} ?></div>
					<div class="col-sm-4 song_info border_bottom main_font"><?php if(isset($value_song_details['detail'])) {echo esc_attr($value_song_details['detail']);} ?></div>
				<?php } ?> 
				</div>
				<!-- Labels -->
				<div class="row album-store border_first_color main_font_color main_font">
					<div class="col-sm-5 store"><?php echo esc_html__('Store Name', 'koband');?></div>
					<div class="col-sm-5 store st_link"><?php echo esc_html__('Store Link', 'koband');?></div>
				</div>
					<?php foreach ($album_song_store[0] as  $value_song_store) { ?>
						<div class=" row song-list border_second_color main_font_color main_font">
							<div class="col-sm-5 store_name line"><?php if(isset($value_song_store['name-store'])) {echo esc_attr($value_song_store['name-store']);}?></div>
							<div class="col-sm-6 store_link border_color btn-buy line"><a class="first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div>
						</div>
					<?php } ?> 	
			</div><!-- container album-songs-show-hide -->
		</div><!-- container -->
		<?php endwhile; endif; ?> <!-- end of the loop. -->
	</div><!--row author-rows -->
	<div class="row author-rows">
		<?php $category_single_posts = new WP_Query($args_category_singles); ?>
		<?php if ($category_single_posts->have_posts() ) : ?>
			<header class="archive-header">
				<h4 class="archive-title">
					<?php printf( esc_html__( 'Singles of category: %s', 'koband'),
					single_cat_title( '', false )); ?>
				</h4>
			</header>
			<?php while ($category_single_posts->have_posts() ) : $category_single_posts->the_post();
				$post_id = get_the_ID(); 
		  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
				$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
				$single_detail = get_post_meta($post_id, "ko_band_singles_detail", false ); 
				$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>
					
	<div class="container">
		<div class="row album-head border_first_color">
			<div class="col-sm-1 cover_img"><a href="<?php the_permalink();?>" target="_blank"><?php the_post_thumbnail(array(70,70));?></a></div>

				<div class="col-sm-3 album_title main_font_color main_font"><?php echo esc_html__('Name:', 'koband');?><br> <a href="<?php the_permalink();?>" target="_blank"><span class="main_font_color main_font"><?php the_title();?></span></a></div>
				<div class="col-sm-3 album_title main_font_color main_font"><?php echo esc_html__('Date:', 'koband');?><br> <span class="main_font_color main_font"><?php if(isset($single_date[0])) 	{ echo  esc_attr($single_date[0]); } ?></span></div>
				<div class="col-sm-3 album_title main_font_color main_font"><?php echo esc_html__('Length:', 'koband');?><br> <span class="main_font_color main_font"><?php if(isset($single_length[0])) 	{ echo esc_attr($single_length[0]); } ?></span></div>


			<div class="col-sm-1 single-up-down-buttons">
				<span class="btn btn-sm single-song">
			    	<a class="btn btn-sm show-single-song first_color main_font"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Down.png"/></a>
			    	<a class="btn btn-sm hide-single-song first_color main_font"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Up.png"/></a>
		    	</span>
			</div>
		</div><!--row -->
	<div class="container single-songs-show-hide bg">
		<div class="row album-head border_first_color">
			<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Details', 'koband');?></div>
		</div>
		<div class="row song-list border_second_color  main_font_color main_font">			
		<?php foreach ($single_detail as  $value_single_detail) { ?>
			<div class="col"><?php if(isset($value_single_detail)) {echo esc_attr($value_single_detail);} ?></div>
		<?php } ?> 
		</div></br>

		<div class="row album-head border_first_color main_font_color main_font">
			<div class="col-sm-5 store"><?php echo esc_html__('Store Name:', 'koband');?></div>
			<div class="col-sm-5 store"><?php echo esc_html__('Store Link:', 'koband');?></div>
		</div>
		<div class="row song-list-sinlge border_second_color main_font_color main_font">
			<?php if(isset($single_store[0])) { ?>
				<?php foreach ($single_store[0] as  $value_single_store) { ?>

				<div class="col-sm-5 store_name line"><?php if(isset($value_single_store['name'])) {echo esc_attr($value_single_store['name']);}?></div>
				<div class="col-sm-6 store_link border_color btn-buy line font_size"><a class="first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div> 
			<?php } } ?>
		</div><!--row-->
	</div><!-- container single-songs-show-hide -->	
	</div><!-- container -->
		<?php endwhile; endif; ?>
	</div>
	<div class="row author-rows">
		<?php
	    $args_category_media = array(
	    	 'category_name' => $category,		
		 	 'post_type' => 'media',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => -1,
			 
		);
	    $category_media_posts = new WP_Query($args_category_media);
	    if ($category_media_posts->have_posts() ) : ?>
	 	<!-- start loop -->
	 	<header class="archive-header">
			<h4 class="archive-title">
				<?php printf( esc_html__( 'Media of category: %s', 'koband'),
				single_cat_title( '', false )); ?>
			</h4>
		</header> 
			<?php 
			while ( $category_media_posts->have_posts() ) : $category_media_posts->the_post();
			$post_id = get_the_ID(); ?>
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
			<?php endwhile;?>
		<!-- loop ends here -->	
   		<?php endif; ?>
	</div><!--row-->
</div><!--container search-holder-->
<?php get_footer(); ?>
