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