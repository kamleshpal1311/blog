<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 post_border text-center">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); ?>

					<?php
					/*
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
					'next_text'          => __( 'Next page', 'twentyfifteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
				) );
			else :
				get_template_part( 'content', 'none' );

			endif;
			?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 post_sidebar">  
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>			

<?php get_footer(); ?>