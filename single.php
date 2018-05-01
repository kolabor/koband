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
		<?php if (have_posts() ) : ?>
			<!--start loop --> 
			<?php while (have_posts() ) : the_post(); ?>
	<div class="container">
				<div id="news-photo"><?php the_post_thumbnail(array(800,800)); ?></div>
			<div class="content">
				<div class="conent_holder">
						<h1 class="news-single-title section_heading"><?php the_title();?></h1>
					<div class="col-sm news-details">
						<div class="news-details_li admin"><?php echo __('Posted by : ', 'koband');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></div>
						<div class="news-details_li category"><?php echo __('Category : ', 'koband');?><?php the_category();?></div>
						<div class="news-details_li date"><?php echo __('Posted at : ', 'koband');?><?php the_time( get_option( 'date_format' ) ); ?></div>
						<div class="news-details_li tag"><?php the_tags(); ?></div>
					</div>
					
					<div class="row">
						<div class="col-sm">
							<div class="content_single_page"><?php the_content(); ?></div>
						</div>
					</div>
				
			<?php endwhile; 
		endif; ?>
			
			<!--comment section starts here-->
		
		<?php 	
				//Get only the approved comments 
				// If comments are open or we have at least one comment, load up the comment template.
			 if ( comments_open() || get_comments_number() ) :
			     comments_template();
			 endif;
			$args = array(
			    'status' => 'approve'
			);

			/* 
			// The comment Query
			$comments_query = new WP_Comment_Query;
			$comments = $comments_query->query( $args );
			 
			// Comment Loop
			if ( $comments ) {
			    foreach ( $comments as $comment ) {
			        echo '<p>' . $comment->comment_content . '</p>';
			    }
			} else {
			    echo 'No comments found.';
			}*/
			?>

			 <?php //comment_form(); ?>
			 </div>
			<?php get_sidebar(); ?>
		</div>
	</div>	 
<?php 

get_footer(); ?>
</div>