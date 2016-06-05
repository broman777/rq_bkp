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
		var target = $(this).attr("href"),
			num = parseInt($(this).text())/12;
		$(target+", #pop-bg").addClass('visible');
		if ($(target+' ul').is('.qty-list')) {
			$(target).find('li').removeClass('active');
			$(target).find('li:eq('+(num-1)+')').addClass('active');
			window.select = this;
		}
	});
	$(".qty-list li").on('click',function(){
		$(".qty-list li").removeClass('active');
		$(this).addClass('active');
	});
	$('#pop-bg, .popup .close , .popup .btn').on('click',function(e){ 
		e.preventDefault();
		if ($('.visible .qty-list').length) {
			var num = $(".qty-list .active").index()+1,
			priceEl = $(window.select).siblings('.uah'),
			price = 900*num;
			if (!priceEl.length) {
				priceEl = $(window.select).parents('td').next('td').children('p');
				priceEl.text(price+' р.');
				var summ = 0;
				$('#cart-form tbody .price p').each(function(){
					summ = summ + parseInt($(this).text());
				});
				summ = summ + parseInt($('#cart-form .del').text());
				$('#cart-form .summ').text(summ+' р.');
			}
			$(window.select).text(num*12);
			priceEl.text(price+' р.');
		}
		$('#pop-bg, .popup').removeClass('visible');
	});
	// замінити аяксом
	$('.link-next').on('click',function(){
		$(this).prev().find('.hidden').eq(0).removeClass('hidden');
		return false;
	});
	if ($('div').is('#aside-slider')) $('#aside-slider').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav:true
	});
	$("#gal-list .types li").on('click',function(){
		if (!$(this).hasClass('active')) {
			var list = $('#gal-list .list');
			$('#gal-list .types').children('li').removeClass('active'); 
			$(this).addClass('active');
			list.children('li').addClass('hidden');
			if ($(this).data('mode') == "video") list.children('.video').removeClass('hidden');
			else if ($(this).data('mode') == "photo") list.children('li').not('.video').removeClass('hidden');
			else list.children('li').removeClass('hidden');
		}
	});
	$('#products-list .item').on('click',function(){
		if ($(window).width() <= 1024) { 
			$("#products-list .item").not(this).removeClass('active');
			$(this).toggleClass('active');
		}
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