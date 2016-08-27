<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_meta">
					<p class="post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></p>
					<p class="text-center author">By <?php the_author(); ?> on <?php the_time('F j, Y'); ?>
					<?php echo do_shortcode('[wp_social_sharing social_options="facebook,twitter,googleplus,pinterest"]'); ?>
					<?php $image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) ); ?>
					<img class="img-responsive" src="<?php echo $image_url; ?>">
					<p class="post_content"><?php echo wp_trim_words( get_the_content(), 50 ); ?></p>
					<div class="read_more_padding"><a href="<?php echo the_permalink(); ?>" class="read_more">Read More</a></div>
				</div>
			</article>
		
		<!-- <div class="col-xs-12 col-sm-12 col-md-4 post_sidebar">  
			<?php //get_sidebar(); ?>
		</div>	 -->