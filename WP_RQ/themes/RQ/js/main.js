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
	$(document).on('click', 'a[data-anchor]', function(e){
		e.preventDefault();
		var body = $("html, body"), 
			dest = $(this).attr('href'),
			speed = $(this).attr('data-anchor') || 500;
			console.log(speed);
		body.stop().animate({scrollTop:$(dest).offset().top}, speed, 'swing');
	});

	//
	$(document).on('click', 'a[data-popup]', function(e){
		e.preventDefault();
		var target = $(this).attr("href");
		$(target+", #pop-bg").addClass('visible');

		// если это попап с количеством
		if (target=='#qty') {
			var html_string = '';
			var chosen_count = parseInt($(this).text());
			var product = $(this).data("product");
			var count = parseInt($(this).data("count"));
			var price = parseInt($(this).data("price"));
			if(chosen_count && product && count && price){
				for (var i = 1; i <= 15; i++) {
					html_string += '<li' + (chosen_count == (i*count) ? ' class="active"' : '') + ' data-product="' + product + '" data-count="' + (i*count) + '" data-price="' + price + '">' + (i*count) + '</li>';
				}
			}
			$('#qty .header .counted').html(count);
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

	$(document).on('click', '#products-list .item', function(){
		var item = $(this);
		if ($(window).width() <= 1024) {
			$("#products-list .item").not(this).removeClass('active');
			item.toggleClass('active');
			if (item.hasClass('active')) setTimeout(function(){item.removeClass('loading')}, 1000);
			else item.addClass('loading')
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