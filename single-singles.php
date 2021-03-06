<?php
/**
 * The Template for displaying single posts for singles
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */
get_header('noscroll'); ?>

<div class="container">
	<?php if (have_posts() ) : 
		while ( have_posts() ) : the_post(); 
		$post_id = get_the_ID(); 
  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
		$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
		$single_detail = get_post_meta($post_id, "ko_band_singles_detail", false ); 
		$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>
	<div class="row single_page_row">
		<div class="container">
			<div class="row single_page_title album_single_page">
				<div class="col-sm-4 album_title_single main_font_color main_font"><?php echo esc_html__('Single Name:', 'koband');?><br><?php the_title();?></div>	
				<div class="col-sm-4 album_title_single main_font_color main_font"><?php echo esc_html__('Date:', 'koband');?><br> <span class="main_font_color"><?php if(isset($single_date[0])) 	{ echo  esc_attr($single_date[0]); } ?></span></div>
		    	<div class="col-sm-4 album_title_single main_font_color main_font"><?php echo esc_html__('Length:', 'koband');?><br><span class="main_font_color"><?php if(isset($single_length[0])) { echo  esc_attr($single_length[0]); } ?></span></div>
			</div>
			<div class="row">
				<div class="col-sm-4 sng_alb_cvr">
					<div class="single_page_cover"><?php the_post_thumbnail(array(400,400));?></div>
				</div>
				<div class="col-sm-8 sng_alb_hld">
					<div class="container">
						<div class="row album-head single-info">
							<div class="col-sm-4 border_first_color main_font_color songs-head main_font"><?php echo esc_html__('Song Details', 'koband');?></div>
						</div>
						<div class="row song-list border_first_color  main_font_color single-info main_font">   
						      <?php foreach ($single_detail as  $value_single_detail) { ?>
						      <div class="col"><?php if(isset($value_single_detail)) {echo esc_attr($value_single_detail);} ?></div>
						      <?php } ?> 
					    </div>
					    <div class="row album-head single-info">
							<div class="col-sm-4 border_first_color main_font_color songs-head main_font"><?php echo esc_html__('Song Lyrics', 'koband');?></div>
						</div>
						<div class="row song-list border_first_color lyrics-singles main_font_color single-info main_font">   
						      <div class="col"><?php the_content(); ?></div> 
					    </div>
						<div class="row album-head border_first_color main_font_color main_font">
							<div class="col-sm-4 store sng_sng"><?php echo esc_html__('Store Name', 'koband');?></div>
							<div class="col-sm-4 store sng_sng"><?php echo esc_html__('Store Link', 'koband');?></div>
						</div>
					
						<?php if(isset($single_store[0])) { ?>
							<?php foreach ($single_store[0] as  $value_single_store) { ?>
							<div class="row song-list border_first_color main_font_color main_font">
								<div class="col-sm-4 line sng_store "><?php if(isset($value_single_store['name'])) {echo esc_attr($value_single_store['name']);}?></div>
								<div class="col-sm-4 store_link btn-buy border_color line sng_store"><a class="first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div>
							</div>
						<?php } } ?>
					</div><!--container-->	 
				</div><!--col-sm-8--> 
			</div><!--row-->
		</div><!--container-->
	</div><!--row-->
	<?php endwhile; endif; ?>
	<div class="container media_next_prev">
		<div class="row">
		    <div class="col-sm">
		                <div class="previous_post"><?php next_post_link('%link', 'Next Single'); ?></div>
		    </div>
		    <div class="col-sm">    
		        <div class="next_post"><?php previous_post_link('%link', 'Previous Single'); ?></div>
		    </div>
	  	</div>
	</div>
</div><!--container-->
<?php get_footer(); ?>