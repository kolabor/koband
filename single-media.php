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
<div class="container">
		<div id="media-photo"><?php the_post_thumbnail('single_news_thumb'); ?></div>
		<h1><div id="single-media-title"><?php the_title();?></div></h1>
			<div class="row">
				<div class="col-sm news-details">
					<div class="news-details_li admin"><?php echo esc_html__('Posted by : ', 'koband');?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></div>
					<div class="news-details_li category"><?php echo esc_html__('Category : ', 'koband');?><?php the_category();?></div>
					<div class="news-details_li date"><?php echo esc_html__('Posted at : ', 'koband');?><?php the_time( esc_html(get_option( 'date_format' ) )); ?></div>
					<div class="news-details_li tag"><?php the_tags(); ?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<div class="content_single_page"><?php the_content(); ?></div>
				</div>
			</div>
	<?php 
	$media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
	$media_video_gallery = get_post_meta($post_id, 'ko_band_repetable_video_field', false); ?>
	<div class="col-md-12">
		<div class="row">
			<div class="gal">

			<?php 

				if (isset($media_video_gallery[0])){
				foreach ($media_video_gallery[0] as  $value_video_gallery) { ?>
				
					
<!--================================================================================================================
						// Checking which iframe to use from the select box at backed :)
=================================================================================================================-->
					
		            <?php
		            $video_type = $value_video_gallery['select'];
					if(isset($video_type) && $video_type == "option1"){
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strpos($data, "v=") + 2);	
						$value_video_gallery_video['link'] = 'https://www.youtube.com/embed/' . $value_video_gallery['link'];
						$value_video_gallery_image['link'] = 'https://img.youtube.com/vi/' . $value_video_gallery['link']; ?>

						
						<div class="videos-list">
						<img src="<?php echo esc_url($value_video_gallery_image['link']);?>/hqdefault.jpg" alt="Smiley face" height="265" width="370" onclick="openModal();currentSlide(1)" class="myvideo" >
					</div>
						<div class="FullscreenV">
           					<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>"></iframe>
       					</div>		

					<?php }

					elseif(isset($video_type) && $video_type == "option2"){
						$vimeo_ondemand = $value_video_gallery['link'];
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strrpos($data, "/") +1);
						$value_video_gallery_video['link'] = 'https://player.vimeo.com/video/' . $value_video_gallery['link']; 
						
						if (strpos($vimeo_ondemand, 'ondemand') !== false) { ?>

						<div class="videos-list">
						   <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/vimeo.jpg" height="265" width="370" class="myvideo" />
						</div>
						   <div class="FullscreenV">
           					<iframe width="370" height="265" src="<?php echo esc_url($value_video_gallery_video['link']);?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
       					</div>		
						  

						<?php }
						else {  
						$hash = unserialize(file_get_contents('https://vimeo.com/api/v2/video/' . esc_html($value_video_gallery['link']) . '.php'));
						$hash[0]['thumbnail_large']?>

						<div class="videos-list">
						<img src="<?php echo esc_url($hash[0]['thumbnail_large']);?>" alt="Smiley face" height="265" width="370" onclick="openModal();currentSlide(2)" class="myvideo" >
					</div>
						<div class="FullscreenV">
           					<iframe width="370" height="265" src="<?php echo esc_url($value_video_gallery_video['link']);?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
       					</div>		


					<?php } }

					elseif(isset($video_type) && $video_type == "option3"){
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strpos($data, "video/") + 6);
						$value_video_gallery_video['link'] = '//www.dailymotion.com/embed/video/' . $value_video_gallery['link'];
						$value_video_gallery_image['link'] = '//www.dailymotion.com/thumbnail/video/' . $value_video_gallery['link']; ?>

						<div class="videos-list">
						<img src="<?php echo esc_url($value_video_gallery_image['link']);?>" alt="Smiley face" height="265" width="370" onclick="openModal();currentSlide(3)" class="myvideo" >
					</div>
						<div class="FullscreenV">
           					<iframe width="370" height="265" src="<?php echo esc_url($value_video_gallery_video['link']);?>"></iframe>
       					</div>	

					<?php }

					else {
						echo esc_html("<?php echo esc_htlm__('Your browser does not support this type of iframe videos', 'koband');?>");
					} ?>
				
			<?php } ?>
		
	
			<?php } ?>
<!--================================================================================================================
												iFrame support ends here :D
=================================================================================================================-->
			
			
					

					<?php if(isset($media_gallery[0])) {
								foreach ($media_gallery[0] as  $value_image)  { ?>
						<img class="myimg" src="<?php echo wp_get_attachment_image( $value_image, array(500,500)); ?>">
						<div id="Fullscreen">
           					<img src="" alt="" />
       					
       				</div>
					<?php } }?> 


<!--	


					<div id="myModal_single" class="modal_single">
						  <span class="close cursor" onclick="closeModal()">&times;</span>
  						<div class="modal-content">


					<?php 
					if (isset($media_video_gallery[0])){
					foreach ($media_video_gallery[0] as  $value_video_gallery) { ?>
					
		            <?php
		            $video_type = $value_video_gallery['select'];
					if(isset($video_type) && $video_type == "option1"){
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strpos($data, "v=") + 2);	
						$value_video_gallery_video['link'] = 'https://www.youtube.com/embed/' . $value_video_gallery['link'];?>
						<div class="mySlides">
					      <div class="numbertext">1 / 4</div>
					      <iframe  src="<?php echo $value_video_gallery_video['link']?>"></iframe>
					    </div>
					<?php }

					elseif(isset($video_type) && $video_type == "option2"){
						$vimeo_ondemand = $value_video_gallery['link'];
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strrpos($data, "/") +1);
						$value_video_gallery_video['link'] = 'https://player.vimeo.com/video/' . $value_video_gallery['link']; 
					?>
						<div class="mySlides">
					      <div class="numbertext">2 / 4</div>
					      <iframe  src="<?php echo $value_video_gallery_video['link']?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					    </div>

					<?php } 

					elseif(isset($video_type) && $video_type == "option3"){
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strpos($data, "video/") + 6);
						$value_video_gallery_video['link'] = '//www.dailymotion.com/embed/video/' . $value_video_gallery['link'];?>
						<div class="mySlides">
					      <div class="numbertext">3 / 4</div>
					      <iframe  src="<?php echo $value_video_gallery_video['link']?>"></iframe>
					    </div>
						
					<?php } ?>
				
			<?php } ?>
		
	
			<?php } 
			
			
						
					if(isset($media_gallery[0])) {
						
					foreach ($media_gallery[0] as  $value_image) {?>
						<div class="mySlides">
					      <div class="numbertext">4 / 4</div> 
								
					<a href="">	<img src="<?php echo wp_get_attachment_image( $value_image);} ?>"></a>
					    </div>									
					<?php }?>  		

					    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					    <a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>
				</div>-->
</div>
</div>
</div>
						

		
</div><!-- container ends here -->
<!--<script>
function openModal() {
  document.getElementById('myModal_single').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal_single').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>-->

		
<?php endwhile; endif;?>

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
	</div>
<?php 
get_footer(); ?>