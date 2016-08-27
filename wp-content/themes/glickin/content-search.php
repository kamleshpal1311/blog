<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
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
				<?php //twentyfifteen_post_thumbnail(); ?>

				<!-- <header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div> -->

				<!-- <?php if ( 'post' == get_post_type() ) : ?>

					<footer class="entry-footer">
						<?php twentyfifteen_entry_meta(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>

				<?php else : ?>

					<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

				<?php endif; ?> -->

			</article><!-- #post-## -->
	