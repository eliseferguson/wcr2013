<?php// Includesinclude_once 'modules/class-wcr-tools.php';if (function_exists('register_sidebar')) {	register_sidebar(array(		'name'=> 'Right Side Call Out',		'id' => 'side_call_out'	));	register_sidebar(array(		'name'=> 'Footer Area',		'id' => 'footer_area'	));	register_sidebar(array(		'name'=> 'Top Call Out',		'id' => 'top_call_out'	));	//register_sidebar(array(	//	'name'=> 'Photo Slider Area',	//	'id' => 'photo_slider_area'	//));	//register_sidebar(array(	//	'name'=> 'News Slider Area',	//	'id' => 'news_slider_area'	//));	register_sidebar(array(		'name'=> 'Footer Logo Area',		'id' => 'footer_logo_area'	));	register_sidebar(array(		'name'=> 'Contact Information Area',		'id' => 'contact_information_area'	));}add_filter('widget_text', 'do_shortcode');add_theme_support( 'menus' );function subpage_peek() {	global $post;	//query subpages	$args = array(		'post_parent' => $post->ID,		'post_type' => 'page'	);	$subpages = new WP_query($args);	// create output	if ($subpages->have_posts()) :		$output = '<ul>';		while ($subpages->have_posts()) : $subpages->the_post();			$output .= '<li><strong><a href="'.get_permalink().'">'.get_the_title().'</a></strong>						<p>'.get_the_excerpt().'						<a href="'.get_permalink().'">Continue Reading →</a></p></li>';		endwhile;		$output .= '</ul>';	else :		$output = '<p>No subpages found.</p>';	endif;	// reset the query	wp_reset_postdata();	// return something	return $output;}add_shortcode('subpage_peek', 'subpage_peek');function show_recentpost($atts, $content=null){	$args = array( 'category' => '9' );	$getpost = get_posts( $args );	$getpost = $getpost[0];	$return = "<li><span class='fundraiser offscreen'>Information</span><h2>" . $getpost->post_title . "</h2>" . $getpost->post_excerpt;	$return .= "<br /><a href='" . get_permalink($getpost->ID) . "'><em>read more →</em></a></li>";	return $return;}add_shortcode('newestpost', 'show_recentpost');function show_secondpost($atts, $content=null){	$args = array( 'category' => '9' );	$getpost = get_posts( $args );	$getpost = $getpost[1];	$return = "<li><span class='informational offscreen'>Information</span><h2>" . $getpost->post_title . "</h2>" . $getpost->post_excerpt;	$return .= "<br /><a href='" . get_permalink($getpost->ID) . "'><em>read more →</em></a></li>";	return $return;}add_shortcode('secondpost', 'show_secondpost');function show_thirdpost($atts, $content=null){	$args = array( 'category' => '9' );	$getpost = get_posts( $args );	$getpost = $getpost[2];	$return = "<li><span class='fundraiser offscreen'>Information</span><h2>" . $getpost->post_title . "</h2>" . $getpost->post_excerpt;	$return .= "<br /><a href='" . get_permalink($getpost->ID) . "'><em>read more →</em></a></li>";	return $return;}add_shortcode('thirdpost', 'show_thirdpost');function show_fourthpost($atts, $content=null){	$args = array( 'category' => '9' );	$getpost = get_posts( $args );	$getpost = $getpost[3];	$return = "<li><span class='informational offscreen'>Information</span><h2>" . $getpost->post_title . "</h2>" . $getpost->post_excerpt;	$return .= "<br /><a href='" . get_permalink($getpost->ID) . "'><em>read more →</em></a></li>";	return $return;}add_shortcode('fourthpost', 'show_fourthpost');function wcr2013_paging_nav() {	global $wp_query;	// Don't print empty markup if there's only one page.	if ( $wp_query->max_num_pages < 2 )		return;	?>	<nav class="navigation paging-navigation" role="navigation">		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>		<div class="nav-links">			<?php if ( get_next_posts_link() ) : ?>			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>			<?php endif; ?>			<?php if ( get_previous_posts_link() ) : ?>			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>			<?php endif; ?>		</div><!-- .nav-links -->	</nav><!-- .navigation -->	<?php}// Enable featured images for WooCommerceadd_theme_support( 'post-thumbnails' );add_shortcode('razoo-donation-widget', 'razoo_donation_widget');function razoo_donation_widget() {    return <<<HTML    <div id='razoo_donation_widget'><span><a href="http://www.razoo.com/">Online fundraising</a> for <a href="http://www.razoo.com/story/Buy-A-Bale">Buy a Bale</a> at Razoo</span></div><script type='text/javascript'>var r_protocol=(("https:"==document.location.protocol)?"https://":"http://");var r_path="http://www.razoo.com/javascripts/widget_loader.js";var r_identifier='Buy-A-Bale';document.write(unescape("%3Cscript id='razoo_widget_loader_script' src='"+r_path+"' type='text/javascript'%3E%3C/script%3E"));</script>HTML;}add_shortcode('razoo-status-widget', 'razoo_status_widget');function razoo_status_widget() {    return <<<HTML        <div id="razoo_status_widget"><a href="http://www.razoo.com/team/Buy-A-Bale-2015?referral_code=sw"><img alt="Donate to Buy A Bale 2015" src="http://www.razoo.com/status/razoo/basic/Buy-A-Bale-2015.png" /></a></div>HTML;}add_shortcode('horses-list', array('WCR_Tools', 'getHorsesList'));add_shortcode('events-list', array('WCR_Tools', 'getEvents'));