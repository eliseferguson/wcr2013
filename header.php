<!DOCTYPE html>
<!--[if lte IE 7]><html id="ie" class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 8]><html id="ie8" class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 9]><html id="ie9" class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if gt IE 9]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<meta name="viewport" content="width=device-width" />
<title><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'/>

<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url'); ?>/scripts/html5Shiv-3.6.2pre.js"></script>
<![endif]-->

<?php wp_head(); ?> 
</head>
<body class="design">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=518168691577829";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="container-page">
		<header class="header-page">
			<a href="/" class="brand offscreen">We Can Ride</a>
			<div class="container-header">
				<nav class="nav-mbl">
					<ul>
						<li><a href="#" class="btn-togglebox btn-nav-main" data-target="nav-main">Main Menu</a></li>
					</ul>
				</nav>
				
				<?php wp_nav_menu( array( 'menu' => 'Main', 'sort_column' => 'menu_order', 'container' => 'nav', 'container_class' => 'nav-main cascadingMenu', 'container_id' => 'nav-main', 'items_wrap' => '<ul role="navigation" >%3$s</ul>'  ) ); ?>
				
				<div class="call-out">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Call Out')) : ?>
						<p>We Can Ride, founded in 1982, offers therapeutic horseback riding to adults and children living with disabilities in Minnesota. We Can Ride is a 501(c)(3) nonprofit and a Premier Accredited member of PATH International.</p>
					<?php endif; ?>
				</div>
			</div>
			<section class="social-media">
				<ul>
					<li><a href="http://www.facebook.com/wecanride" class="facebook offscreen" target="_blank">Facebook</a></li>
					<li><a href="/blog/" class="rss offscreen">Blog</a></li>
					<li><a href="http://twitter.com/wecanride" class="twitter offscreen" target="_blank">Twitter</a></li>
				</ul>
			</section>

			<section class="photo-slider">
				<?php if(function_exists('simpleHTMLSlider')){ echo simpleHTMLSlider($option = 'photoslider'); } ?>
			</section>
 			<section class="call-out secondary">
                                 <!--this is for a call out section-->
				
			</section>
			
		</header>
		<div class="container-columns">