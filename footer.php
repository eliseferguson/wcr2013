</div>
	</div>
	<footer class="footer-page">
		<div class="copyright">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area')) : ?>
			<p>Copyright © 2000-2013 We Can Ride, Inc.</p>
			<?php endif; ?>
		</div>
	</footer>
	<!--[if lt IE 9]>
	<script src="<?php bloginfo('template_url'); ?>/scripts/respond-1.1.0.js"></script>
	<![endif]-->

	<script type="text/javascript">
		$(function(){
			// init stuff
			var html = $('html');
			html.removeClass('no-js');
			var supportsTouch = 'ontouchstart' in window || 'onmsgesturechange' in window;
			if(supportsTouch){
				html.addClass('yes-touch');
			}else{
				html.addClass('no-touch');
			}
			// custom stuff
		});

		// Show/hide elements 
		$('.btn-nav-main').on('click',function(e){
			e.preventDefault();
			var box = $('.'+$(this).data('target')).slideToggle(), shown = $('.show');
			if (!box.hasClass('show')) box.addClass('show');
			shown.removeClass('show');
		});
	</script>
	<?php wp_footer(); ?> 

</body>
</html>