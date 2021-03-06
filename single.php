<?php
/**
 * The Template for displaying all single posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header('noscroll'); ?>
<div class="single-news-section">
	<?php if (have_posts() ) :
		while (have_posts() ) : the_post(); ?>
		
		<div class="container">
			<div id="news-photo"><?php the_post_thumbnail('single_news_thumb'); ?></div>
				<div class="content">
				<div class="conent_holder">
					<h1 class="news-single-title section_heading heading_font"><?php the_title();?></h1>
					<div class="col-sm news-details main_font">
						<div class="news-details_li admin"><?php echo esc_html__('Posted by:', 'koband');?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></div>
						<div class="news-details_li category"><?php echo esc_html__('Category: ', 'koband');?><?php the_category();?></div>
						<div class="news-details_li date"><?php echo esc_html__('Posted at: ', 'koband');?><a href=""><?php the_time(get_option( 'date_format' )); ?></a></div>
						<div class="news-details_li tag"><?php the_tags(); ?></div>
					</div>
						<div class="row">
							<div class="col-sm">
								<div class="content_single_page main_font"><?php the_content(); ?></div>
							</div>
						</div>
	<?php endwhile;endif; ?>
	<div class="row">
		<div class="col-sm">
                <div class="previous_post"><?php next_post_link('%link', 'Next News'); ?></div>
		</div>
		<div class="col-sm">		
				<div class="next_post"><?php previous_post_link('%link', 'Previous News'); ?></div>
		</div>
	</div>			
				<!--comment section starts here-->
				<?php 	
					//Get only the approved comments 
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						 comments_template();
					endif;
					$args = array(
					    'status' => 'approve'
					);?>
		
		 		</div><!--conent_holder-->
			<?php get_sidebar(); ?>
			</div><!--content-->
		</div><!--container-->	 
<?php get_footer(); ?>
</div>