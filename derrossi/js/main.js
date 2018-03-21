var dr = {};

dr.init = function() {
	dr.init_triangle();
	dr.init_contact();
	dr.init_placeholder();
	dr.init_slider();
	dr.init_tobottom();
};

dr.init_placeholder = function() {
	var o = $('[placeholder]');
	if (o.length) {
		o.placeholder();
	}
};

dr.init_triangle = function() {
	var o = $('#triangle');
	if (o.length) {
		$(window).resize(function() {
			o.css('borderBottomWidth', o.parent().height() + 'px');
		});
		$(window).resize();
	}
};

dr.init_contact = function() {
	var o = $('#refresh');
	if (o.length) {
		var lis = $('#refresh_list li');
		o.click(function() {
			var ind = lis.index(lis.filter('.active'));
			ind++;
			if (ind >= lis.length) ind = 0;
			lis.removeClass('active');
			lis.eq(ind).addClass('active');
			return false;
		});
	}
};

dr.init_slider = function() {
	var verticalslider = $('.vertical-slider');
	if (verticalslider.length){
		verticalslider.jCarouselLite({
			btnNext: ".slider .arrow-down",
			btnPrev: ".slider .arrow-up",
			vertical: true
		});
	}
};

dr.init_tobottom = function() {
	var o = $('.to-bottom');
	if (o.length) {
		var b = $('.index');
		o.click(function() {
			if (b.hasClass('opened')) {
				dr.go_totop();
			}
			else {
				dr.go_tobottom();
			}
			return false;
		});
	}
};

dr.go_totop = function() {
	var o = $('.index-image');
	var b = $('.index');
	o.stop(0, 0).animate({
		height: $(window).height() + 'px'
	}, 400, function() {
		b.removeClass('opened');
		o.height('auto').css('min-height', '100%');
	});
};

dr.go_tobottom = function() {
	var o = $('.index-image');
	var b = $('.index');
	o.height(o[0].offsetHeight).css('min-height', '0px').stop(0, 0).animate({
		height: '60px'
	}, 400, function() {
		b.addClass('opened');
	});
};

$(dr.init);

