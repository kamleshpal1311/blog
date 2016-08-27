<?php
/*
Template Name:testing
*/
get_header();
?>
<div id="ajax-posts" class="row">
        <?php
            $postsPerPage = 2;
            $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $postsPerPage,
                    'page'
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
        ?>

         <div class="small-12 large-4 columns">
                <h4><?php the_title(); ?></h4>
         </div>

         <?php
                endwhile;
        wp_reset_postdata();
         ?>
    </div>
        <div id="more_posts">Load More</div>
<?php get_footer(); ?>