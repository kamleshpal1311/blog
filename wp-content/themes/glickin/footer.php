<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!-- 1) create category from admin and show category image at front side
2) create diffrent form as per given fields for all category at admin and show at the front side after select category and create event. -->   
<!-- convert blog page and blog details page from static html to wordpress and call all category list , archive list , tag list , latest post list as a sidebar at blog page -->

<div class="container-fluid footer_bg_color">
	<div class="container footer_menu">
		<!-- <ul class="nav navbar-nav">
			<li>
				<a href="#">Glickin<sup>TM</sup> Garage Sales inc. All Right Reserved</a>
			</li>
			<li>
				<a href="#">About us</a>
			</li>
			<li>
				<a href="#">Terms of Use</a>
			</li>
			<li>
				<a href="#">Privacy Policy</a>
			</li>
			<li>
				<a href="#">Contact Us</a>
			</li>
		</ul> -->
		<?php wp_nav_menu(array(
		    'theme_location' => 'footer',
		    'menu_class'=>'nav navbar-nav menu_bg_color'
		) );  ?>
		<ul class="nav navbar-nav pull-right social_icon">
			<li>
				<a href=""><i class="fa fa-google-plus"></i></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-facebook"></i></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-twitter"></i></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-pinterest"></i></a>
			</li>
		</ul>
	</div>
</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		
		
		<script type="text/javascript">
		jQuery( document ).ready(function() {
    		jQuery('.widget > ul').addClass('nav archive_list');
    		jQuery('#menu-item-67').append('<li class="divider"></li>');
    		jQuery('#menu-item-68').append('<li class="divider"></li>');
    		jQuery('#menu-item-69').append('<li class="divider"></li>');
		});
		
		</script>
		

<?php wp_footer(); ?>

</body>
</html>
<?php //http://192.168.1.63/phpmyadmin/ ?>