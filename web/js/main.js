$(document).ready(function(){
	var menu = $('#menu'), fix = $('#fix');
	$('.toggle').on('click',function(e){
		if(menu.hasClass('open')) {
			menu.removeClass('open');
			fix.removeClass('visible');
		}
		else {
			menu.addClass('open');
			fix.addClass('visible');
		}
		e.preventDefault();
	});
	fix.on('click',function(){
		menu.removeClass('open');
		fix.removeClass('visible');
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
    var dscrl = $(document).scrollTop(),
        wHeight = $(window).height();
	$('[data-animate]').each(function(){
        if (dscrl+wHeight-220 > $(this).offset().top && dscrl < $(this).offset().top+$(this).height()) {
            $(this).addClass('animated')
        }
        else $(this).removeClass('animated');
    });
});
$(window).on('load',function(){
	$('#loader').fadeOut(900);
	setTimeout(function(){$('#menu, body').removeClass('hidden');}, 500);
});