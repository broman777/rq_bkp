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
});
$(window).on('scroll',function(){
	$('#menu').removeClass('open');
});