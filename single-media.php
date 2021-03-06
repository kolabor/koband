<?php
/**
 * The Template for displaying all single gallery posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header('noscroll'); ?>



<?php
if (have_posts() ) : 
	
 	//start loop ?>

	<?php  while ( have_posts() ) : the_post(); 
	$post_id = get_the_ID(); ?>
<div class="container"><!-- Container starts here -->
		<div id="media-photo"><?php the_post_thumbnail('single_news_thumb'); ?></div>
		<div class="single-media-title heading_font"><h1><?php the_title();?></h1></div>
			<div class="row">
				<div class="col-sm news-details main_font">
					<div class="news-details_li admin"><?php echo esc_html__('Posted by : ', 'koband');?><a href="<?php echo esc_html(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></div>
					<div class="news-details_li category"><?php echo esc_html__('Category : ', 'koband');?><?php the_category();?></div>
					<div class="news-details_li date"><?php echo esc_html__('Posted at : ', 'koband');?><?php the_time( get_option( 'date_format' ) ); ?></div>
					<div class="news-details_li tag"><?php the_tags(); ?></div>
				</div>
			</div>
		<div class="row">
		<div class="col-sm">
			<div class="content_single_page main_font"><?php the_content(); ?></div>
		</div>


	<div class="col-md-12">

     <?php 

      $media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
	    $media_video_gallery = get_post_meta($post_id, 'ko_band_repetable_video_field', false); 
      

      $all_gallery_items = array();

      if (!empty($media_gallery))
      {
        $count_images = count($media_gallery[0]);
        /*Insert images to the all_gallery_items array*/
        if($count_images > 0)
        {
          for($i=0; $i < $count_images; $i++)
          {
            if (isset($media_gallery[0][$i])) {
              array_push($all_gallery_items, array("type" => "image",  "videotype" => "none", "link"=> $media_gallery[0][$i] ));
            }
            
          }
        } 
      }

      if(!empty($media_video_gallery)) 
      {
      
        $count_videos = count($media_video_gallery[0]);
        
        if($count_videos > 0)
        {
          for($v=0; $v < $count_videos; $v++)
          {
             if (isset($media_video_gallery[0][$v]['link']))
            {
          	array_push($all_gallery_items, array("type" => "video",  "videotype" =>$media_video_gallery[0][$v]['select'], "link"=> $media_video_gallery[0][$v]['link'] ));
            }
          }
        }
      }
     
     /*Randomize Gallery videos and images*/
     shuffle($all_gallery_items);
     
     ?>

		<div class="row">
			<div class="gal">

				<div class="image_media_slider">			
                   <div class="imageList">
                   <?php 
                     
                     $gallery_item = 0;

                     foreach ($all_gallery_items as  $galleryItem) 
                     {
                         $gallery_item++;
                         $itemType = $galleryItem['type'];

                         if($itemType == "image")
                         {
                         	$thumb = wp_get_attachment_image_src( $galleryItem['link'], array(500,500));?>
                          
                           <img src="<?php echo esc_url($thumb[0])?>" 
                                         alt="Smiley face" 
                                         class="thumb_image nr-<?php echo esc_attr($gallery_item) ?>"
                                         data-nr = <?php echo esc_html($gallery_item); ?>
                                         data-type="image"
                                         data-video-type="novideo"
                                         data-video-link = "nolink"
                                         data-video-code = "nocode">

                          <?php 
                         }
                         else if($itemType == "video")
                         {
                         	switch ($galleryItem['videotype']) 
                         	{
							    case "option1":

							       $videoLink = $galleryItem['link'];
							       $youtubeCode = substr($videoLink, strpos($videoLink, "v=") + 2);
							       $youtubeImage  = 'https://img.youtube.com/vi/' . $youtubeCode;
							       ?>

                                    <img src="<?php echo esc_url($youtubeImage)?>/hqdefault.jpg" 
                                         alt="Smiley face" 
                                         class="video_image nr-<?php echo esc_attr($gallery_item) ?>"
                                         data-nr = <?php echo esc_html($gallery_item); ?>
                                         data-type="video"
                                         data-video-type="youtube"
                                         data-video-link = "<?php echo esc_url($videoLink);?>"
                                         data-video-code = "<?php echo esc_attr($youtubeCode);?>"
                                         height="265" 
                                         width="370">
                                    <?php 
							        break;
							     case "option2":
							       
							         $videoLink = $galleryItem['link'];
							         $vimeoCode = substr($videoLink, strrpos($videoLink, "/") +1);
                       $vimeoImage  = esc_url(get_template_directory_uri())."/img/vimeo.jpg";
                      ?>
							       <img src="<?php echo esc_url($vimeoImage)?>" 
                                         alt="Vimeo video image" 
                                         class="video_image nr-<?php echo esc_attr($gallery_item) ?>"
                                         data-nr = <?php echo esc_html($gallery_item); ?>
                                         data-type="video"
                                         data-video-type="vimeo"
                                         data-video-link = "<?php echo esc_url($videoLink);?>"
                                         data-video-code = "<?php echo esc_attr($vimeoCode);?>"
                                         height="265" 
                                         width="370">
                                    <?php
							        break;
							     case "option3":
							        $videoLink = $galleryItem['link'];
							        $dailyCode = substr($videoLink, strpos($videoLink, "video/") + 6);
							        $dailyImage  = $value_video_gallery_image['link'] = '//www.dailymotion.com/thumbnail/video/'. $dailyCode; ?>

							        <img src="<?php echo esc_url($dailyImage)?>" 
                                         alt="dailymotion video image" 
                                         class="video_image nr-<?php echo esc_attr($gallery_item) ?>"
                                         data-nr = <?php echo esc_html($gallery_item); ?>
                                         data-type="video"
                                         data-video-type="dailymotion"
                                         data-video-link = "<?php echo esc_url($videoLink);?>"
                                         data-video-code = "<?php echo  esc_attr($dailyCode);?>"
                                         height="265" 
                                         width="370">
                                    <?php
							        break;
							    default:
							        echo "No video";
                            }
                         }             
                        }?>
                   </div><!-- imageList class ends here -->
                </div><!-- image_media_slider class ends here -->
                <div id="Fullscreen">
   					<img src="" alt="" />
   					<a href="#" class="close_gallery">X</a>
					<a href="#" class="prev">&#8249;</a>
					<a href="#" class="next">&#8250;</a>
       			</div>
       	</div><!-- gal class ends here -->
      </div><!-- row class ends here -->
     </div><!-- col-md-12 class ends here -->
    </div><!-- row ends here -->
   </div><!-- Container class ends here -->
<?php endwhile; endif;?>
<div class="container media_next_prev">
  <div class="row">
    <div class="col-sm">
                <div class="previous_post"><?php next_post_link('%link', 'Next Gallery'); ?></div>
    </div>
    <div class="col-sm">    
        <div class="next_post"><?php previous_post_link('%link', 'Previous Gallery'); ?></div>
    </div>
  </div>
</div> 
<!--comment section starts here-->
	<div class="container">
		<div class="row">
			<?php 	
				//Get only the approved comments 
				// If comments are open or we have at least one comment, load up the comment template.
			 if ( comments_open() || get_comments_number() ) :
			     comments_template();
			 endif;
			$args = array(
			    'status' => 'approve'
			);?>
		</div>
	</div><!--comment section ends here-->
<?php get_footer(); 


	