<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" id="olFont" href="http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic" type="text/css" media="all" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="container-fluid bg_image">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<a href="<?php echo bloginfo('url');?>"><img class="pull-right img-responsive image_padding" src="<?php echo bloginfo('url').'/wp-content/themes/glickin/images/top_bar.png'; ?>"></a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid bg_color">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
				
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<?php wp_nav_menu( array(
							    'theme_location' => 'primary',
							    'menu' => 'Main Menu', 
								'container_id' => 'cssmenu',
							    'menu_class'=>'nav navbar-nav navbar-right',
								'walker' => new CSS_Menu_Walker()
							));?>

						<!-- <ul class="nav navbar-nav navbar-right">
                            <li class=""><a class="color-white font-ralewaym" href="http://glickin.com/sale/search">FIND</a></li>
                            <li class=" postli"><a class="color-white font-ralewaym" href="http://glickin.com/postgarage/add.html">POST</a></li>
                            <li><a class="color-white font-ralewaym" href="#download">Download</a></li>
							<li><a class="color-white font-ralewaym" href="http://glickin.com/home/gallery">Gallery</a></li>
                            <li class="dropdown myglickin"><a data-toggle="dropdown" class="color-white font-ralewaym dropdown-toggle" id="myAcc" href="#" data-hover="dropdown">My GLICKIN<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="popoverMyAccount">    
                                	<li><a href="http://glickin.com/sale/fav.html" class="clr-7b7b7b myAcc_a ">Favourites</a></li>
                                    <li class="divider"></li>
                                    <li><a href="http://glickin.com/sale/mysale.html" class="clr-7b7b7b myAcc_a ">My Sale</a></li>
                                    <li class="divider"></li>
                                    <li><a href="http://glickin.com/profile.html" class="clr-7b7b7b myAcc_a ">Edit Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="http://glickin.com/logout.html" class="clr-7b7b7b myAcc_a logout_">Logout</a></li>
                                </ul>
                            </li>
                        </ul> -->
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
