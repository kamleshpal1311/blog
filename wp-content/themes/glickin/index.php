<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 post_border text-center">
		<?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
			<div class="post_meta">
				<p class="post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></p>
				<p class="text-center author">By <?php the_author(); ?> on <?php the_time('F j, Y'); ?>
				<?php echo do_shortcode('[wp_social_sharing social_options="facebook,twitter,googleplus,pinterest"]'); ?>
				<?php $image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) ); ?>
				<img class="img-responsive" src="<?php echo $image_url; ?>">
				<p class="post_content"><?php echo wp_trim_words( get_the_content(), 50 ); ?></p>
				<div class="read_more_padding"><a href="<?php echo the_permalink(); ?>" class="read_more">Read More</a></div>
			</div>
		<?php endwhile; ?>
		<?php
		the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
		) );
		?>
		<?php else : ?>
 		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>	
		<?php endif; ?>	
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 post_sidebar">  
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>



<?php get_footer(); ?>
