$(document).ready(function(){
	$('.toggle').on('click',function(e){
		$(this).parents('#menu').toggleClass('open');
		e.preventDefault();
	});
	$('#aside-slider').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav:true
	});
	$('#news-slider').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav:true
	});
	$('#about-slider').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav:true
	});
	// плавная прокрутка
	$('a[data-anchor]').on('click',function(e){
		e.preventDefault();
		var body = $("html, body"), 
			dest = $(this).attr('href'),
			speed = $(this).attr('data-anchor') || 500;
			console.log(speed);
		body.stop().animate({scrollTop:$(dest).offset().top}, speed, 'swing');
	});
});
$(window).on('scroll',function(){
	$('#menu').removeClass('open');
});
$(window).on('load',function(){
	$('#loader').fadeOut(900);
});