<?php
/**
 * 
 *
 * Template Name: Discography
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header();?> 
<div id="Discography" class="section">
	<div class="container">
	<h1 class="first_color heading_font"><?php echo esc_html__('Discography', 'koband');?></h1>		
	<?php
	$args_album = array (
	  	'post_type' => 'album',
	  	'post_staus'=> 'publish',
	 	'posts_per_page' => -1


		);
	$args_singles = array(
	  	'post_type' => 'singles',
	  	'post_staus'=> 'publish',
	 	'posts_per_page' => -1		  

		);

/* 
================================================================================================================
												ALBUM SONG DETAILS
================================================================================================================
*/
	$album_posts = new WP_Query($args_album); ?>

	<div class="albums-title main_font_color main_font"><h3 class="main_font"><?php echo esc_html__('Albums', 'koband');?></h3></div>
   	<?php if ($album_posts->have_posts() ) : 
			while( $album_posts->have_posts() ) : $album_posts->the_post();
				$post_id = get_the_ID();?>
			
	<div class="container">
		<div class="row album-head border_first_color">
			<div class="col-sm-1 cover_img"><a href="<?php the_permalink();?>" target="_blank" ><?php the_post_thumbnail(array(70,70));?></a></div>
			<div class="col-sm-3 album_title main_font_color main_font"><h4><?php echo esc_html__('Album Name:', 'koband');?></h4><a href="<?php the_permalink();?>" target="_blank" ><span class="main_font_color"><?php the_title();?></span></a></div>

	        <?php 
	        $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
			$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
			$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
			$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false); ?>
				
			<div class="col-sm-3 album_title main_font_color main_font"><h4><?php echo esc_html__('Date:', 'koband');?></h4><span class="main_font_color main_font"><?php if(isset($album_date[0])) { echo esc_attr($album_date[0]); } ?></span></div>
		    <div class="col-sm-3 album_title main_font_color main_font"><h4><?php echo esc_html__('Length:', 'koband');?></h4><span class="main_font_color main_font"><?php if(isset($album_length[0])) { echo esc_attr($album_length[0]); } ?></span></div>
		    <div class="col-sm-1 album-up-down-buttons">
		    	<span class="btn btn-sm album-song">
			    	<a class="btn btn-sm show-album-song first_color"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Down.png"/></a>
			    	<a class="btn btn-sm hide-album-song first_color"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Up.png"/></a>
		    	</span>
		    </div>
		</div><!-- row -->        
		<div class="container album-songs-show-hide">
			<!-- Labels -->
			<div class="row album-info">
				<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Name', 'koband');?></div>
				<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Length', 'koband');?></div>
				<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Details', 'koband');?></div>
			</div>
			<div class="row song-list main_font_color bg">			
			<?php foreach ($album_song_details[0] as  $value_song_details) { ?>

				<div class="col-sm-4 song_info border_bottom line main_font font_size"><?php if(isset($value_song_details['name-details'])) {echo esc_attr($value_song_details['name-details']);}?></div>
				<div class="col-sm-4 song_info border_bottom line main_font font_size"><?php if(isset($value_song_details['length'])) {echo esc_attr($value_song_details['length']);} ?></div>
				<div class="col-sm-4 song_info border_bottom main_font font_size song_dt"><?php if(isset($value_song_details['detail'])) {echo esc_attr($value_song_details['detail']);} ?></div>

					
				<?php } ?> 
			</div>
			<!-- Labels -->
			<div class="row album-store border_first_color main_font_color main_font">
				<div class="col-sm-5 store"><?php echo esc_html__('Store Name', 'koband');?></div>
				<div class="col-sm-5 store st_link"><?php echo esc_html__('Store Link', 'koband');?></div>
			</div>
			<?php 
				foreach ($album_song_store[0] as  $value_song_store) { ?>
				<div class=" row song-list border_second_color main_font_color main_font bg">
				<div class="col-sm-5 store_name line font_size"><?php if(isset($value_song_store['name-store'])) {echo esc_attr($value_song_store['name-store']);}?></div>
				<div class="col-sm-6 store_link border_color btn-buy line"><a class="first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div> </div>

			<?php } ?> 
		</div><!-- container album-songs-show-hide -->
	</div><!-- container -->
	<?php endwhile; endif; ?> <!-- end of the loop. -->
<!-- 
================================================================================================================
												SINGLE SONG DETAILS
================================================================================================================
-->
	<?php $single_posts = new WP_Query($args_singles); ?>
	<div class="single-title main_font_color"><h3 class="main_font"><?php echo esc_html__('Singles', 'koband');?></h3></div>
	<?php if ($single_posts->have_posts() ) :
			while ($single_posts->have_posts() ) : $single_posts->the_post();
			$post_id = get_the_ID(); 
	  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
			$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
			$single_detail = get_post_meta($post_id, "ko_band_singles_detail", false ); 
			$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>	
	<div class="container">
		<div class="row album-head border_first_color">
			<div class="col-sm-1 cover_img"><a href="<?php the_permalink();?>" target="_blank"><?php the_post_thumbnail(array(70,70));?></a></div>
				<div class="col-sm-3 album_title main_font_color main_font"><h4><?php echo esc_html__('Name:', 'koband');?></h4><a href="<?php the_permalink();?>" target="_blank"><span class="main_font_color main_font"><?php the_title();?></span></a></div>
				<div class="col-sm-3 album_title main_font_color main_font"><h4><?php echo esc_html__('Date:', 'koband');?></h4><span class="main_font_color main_font"><?php if(isset($single_date[0])) 	{ echo esc_attr($single_date[0]); } ?></span></div>
				<div class="col-sm-3 album_title main_font_color main_font"><h4><?php echo esc_html__('Length:', 'koband');?></h4><span class="main_font_color main_font"><?php if(isset($single_length[0])) 	{ echo esc_attr($single_length[0]); } ?></span></div>

			<div class="col-sm-1 single-up-down-buttons">
				<span class="btn btn-sm single-song">
			    	<a class="btn btn-sm show-single-song first_color main_font"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Down.png"/></a>
			    	<a class="btn btn-sm hide-single-song first_color main_font"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Up.png"/></a>
		    	</span>
			</div>
		</div>
		<div class="container single-songs-show-hide bg">
			<div class="row album-head border_first_color">
				<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Details', 'koband');?></div>
			</div>
			<div class="row song-list border_second_color  main_font_color main_font font_size">			
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

					<div class="col-sm-5 store_name line font_size"><?php if(isset($value_single_store['name'])) {echo esc_attr($value_single_store['name']);}?></div>
					<div class="col-sm-6 store_link border_color btn-buy line font_size"><a class="first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div> 
				<?php } } ?>
			</div>
		</div><!-- container single-songs-show-hide -->	
	</div><!-- container -->
<?php endwhile; endif; ?>
	</div><!-- container -->
</div><!-- Discography -->