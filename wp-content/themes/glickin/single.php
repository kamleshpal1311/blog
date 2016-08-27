<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 post_border text-center" style="border:none;">
			<div class="post_meta single_post_meta">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="post_title"><?php the_title(); ?></div>

				<div class="text-center author">By <?php the_author(); ?> on <?php the_time('F j, Y'); ?></div>


				<div class="single_post_sharing">
					<?php echo do_shortcode('[wp_social_sharing social_options="facebook,twitter,googleplus,pinterest"]'); ?>
				</div>

				<?php $single_page_image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) ); ?>
				<a href="#" class="clearfix">
					<img class="img-responsive col-md-12 col-md-12 col-md-12 comment_image" src="<?php echo $single_page_image_url; ?>">
				</a>

				<p class="single_post_content"><?php echo the_content(); ?></p>
				
				<?php endwhile; else : ?>
 					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>

				<div class="single_tags">
				<?php $get_tag = wp_get_post_tags(get_the_id());
					if(!empty($get_tag)){
						foreach($get_tag as $get_tag_row){
							$get_tag_row_link = get_tag_link( $get_tag_row->term_id );
						?>
						<a href="<?php echo $get_tag_row_link; ?>">
						<?php
							echo '#'.$get_tag_row->name.', ';
						?>
						</a>
						<?php	
						}
					}
					else{
						//echo "Sorry!! No tags available";
					}
				?></div>
				<?php //comment_form( $args, get_the_id()); ?>
				<!-- <form role="form"> -->
				    <!-- <div class="form-group">
				      <input type="email" class="form-control comment_input" id="email" placeholder="Enter email">
				    </div> -->
				    <!-- <div class="comment_lable">Comments</div> -->
				    <!-- <div class="form-group">
				      <textarea rows="5" class="form-control comment_textarea" id="InputMessage" name="InputMessage" placeholder="Type your comment here..."></textarea>
				    </div>
				    <button type="submit" class="btn btn-default pull-right comment_submit">Submit</button> -->
				<!-- </form>	 -->
				<?php 
				$args = '';
				comment_form( $args,get_the_id()); ?>
				<?php 
				$args = array(
					'status' => 'approve',
					'post_id' => get_the_id(),
				);
				$comments = get_comments($args);
				foreach($comments as $comment){ ?>
					<div class="single_author_name"><?php echo($comment->comment_author); ?></div>
					<div class="single_author_date">
					<?php
					$originalDate = "$comment->comment_date";
					echo $newDate = date("F j, Y", strtotime($originalDate));
					echo " at ";
					echo $newDate = date("H:i:s", strtotime($originalDate));
					?>
					</div>
					<div class="single_author_message"><?php echo($comment->comment_content); ?></div>
				<?php } ?>
				<!-- <div class="single_author_name">Eugene Delacroix</div>
				<div class="single_author_date">May 19, 2016 at 3:03 pm</div>
				<div class="single_author_message">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div> -->
			</div>
		</div> 
	</div>
</div>


<?php get_footer(); ?>
