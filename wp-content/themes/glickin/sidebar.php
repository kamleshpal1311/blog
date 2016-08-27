<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<form class="navbar-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="text" class="form-control search_form" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default search_button">
				<i class="fa fa-search"></i>
			</button>
		</span>
	</div>
</form>

<ul class="nav category_list">
	<div class="category_lable"><b>Categories</b></div>
	<?php 
		$categories = get_terms( 'category', 'hide_empty=0' );
		foreach ($categories as $categories_row) { 
			$term_link = get_term_link( $categories_row );
			$postsInCat = get_term_by('name',$categories_row->name,'category');
			?>
			<li><a href="<?php echo $term_link; ?>"><?php echo $categories_row->name; ?><div class="pull-right count_post"><?php echo $postsInCat->count; ?></div></a></li>
			<?php }
	?>
</ul>
<div class="latest_post_content">
	<div class="post_lable"><b>Latest Posts</b></div>
	<?php $args = array(
	    'numberposts' => 3,
	    'orderby' => 'post_date',
	    'order' => 'DESC',
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'suppress_filters' => true );

    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
    foreach ($recent_posts as $recent_posts_row) { 
    	$recent_posts_row['post_date'];
	    $recent_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($recent_posts_row['ID']));
	?>
    <div class="clearfix margin_left_img">
	  <a href="#"><img class="pull-left margin_right_img" height="80px" width="80px" src="<?php echo $recent_image_url[0]; ?>"></a>
	  <p class="l_p_title"><a href="<?php echo get_permalink($recent_posts_row['ID']); ?>"><?php echo wp_trim_words( get_the_title($recent_posts_row['ID']), 7 ); ?></a></p>
	  <p class="l_p_date"><?php echo get_the_date('F j, Y' , $recent_posts_row['ID']); ?></p>
	</div>	
    <?php } ?>
	
</div>	

<div class="follow_me">
	<div class="follow_me_lable"><b>Follow Me</b></div>
	<p>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-google-plus"></i></a>
		<a href="#"><i class="fa fa-pinterest"></i></a>
	</p>	

</div>

<div class="tags">
	<div class="follow_me_lable"><b>Tags</b></div>
	<p class="tags_css">
	<?php 
	$tags = get_tags();
	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );
		?>
		<a href="<?php echo $tag_link; ?>">
		<?php
			echo '#'.$tag->name.', ';
		?>
		</a>
		<?php

	}?>
	</p>
</div>


<div class="Archives">
	<div class="follow_me_lable"><b>Archive (Year wise)</b></div>
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	<?php endif; ?>
</div>
