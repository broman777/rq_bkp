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

	//
	$('a[data-popup]').on('click',function(e){
		e.preventDefault();
		var target = $(this).attr("href");
		$(target+", #pop-bg").addClass('visible');

		// если это попап с количеством
		if (target=='#qty') {
			var html_string = '';
			var count = $(this).data("count");
			var price = $(this).data("price");
			if(count && price){
				for (var i = 1; i <= 15; i++) {
					html_string += '<li data-count="' + count + '" data-price="' + price + '">' + i * count + '</li>';
				}
			}
			$('#qty .qty-list').html(html_string);
		}
	});

	$('#pop-bg, .popup .close , .popup .btn').on('click',function(e){ 
		e.preventDefault();
		$('#pop-bg, .popup').removeClass('visible');
	});

	if ($('div').is('#aside-slider')) $('#aside-slider').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav:true
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
	setTimeout(function(){$('#menu, body').removeClass('hidden');}, 200);
});

//////////////////

$(document).on('focusout', 'input', function(){
	if($(this).val()){
		$(this).addClass('filled');
	}else{
		$(this).removeClass('filled');
	}
});