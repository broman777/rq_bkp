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
	// плавная прокрутка
	$('a[data-popup]').on('click',function(e){
		e.preventDefault();
		$("#pop-bg").addClass('visible');
		var target = $(this).attr("href"),
			num = parseInt($(this).text());
		$(target).addClass('visible')
		if ($(target+' ul').is('.qty-list')) {
			$(target).find('li:contains('+num+')').addClass('active');
			window.select = this;
		}
	});
	$(".qty-list li").on('click',function(){
		$(".qty-list li").removeClass('active');
		$(this).addClass('active');
	});
	$('#pop-bg, .popup .close , .popup .btn').on('click',function(e){
		e.preventDefault();
		$('#pop-bg, .popup').removeClass('visible');
		var num = $(".qty-list .active").index();
		$(window.select).text(num*12);
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