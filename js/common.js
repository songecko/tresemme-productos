/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
	var isMobile = false;
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
		isMobile = true;
	}

	var pading_col1 = 250;
	var pading_col2 = 230;
	var pading_col3 = 256;
	var landing = 214;

	//isMobile = true;

	//	landing

	$(document).on('click', 'a.ajax-landing', function(event) {
		event.preventDefault();
		currentHash = $(this).attr('href');
		location.hash = currentHash;
		$('html, body').scrollTop(0);
	});

	var valLanding = 0;
	var landingSlideWidth = 236;
	var multiplier;
	var landingClicked = false;
	$(document).
					on('click', '.landing div.arrow-left, .landing div.arrow-right', function(
					event) {
		event.preventDefault();

		if (!isArrowEnabled($(this)))
			return;

		if (landingClicked)
			return;

		landingClicked = true;
		
		$('.elements-wrapper a').fadeTo(125, 0.3, function() {
			$('.elements-wrapper a').fadeTo(125, 1);
		});

		var itemsSlider = (isMobile)?1:1;
		
		if ($(this).hasClass('arrow-left')) {
			valLanding += landingSlideWidth * itemsSlider;
		} else {
			multiplier = $('.elements-wrapper a').length - 1;
			valLanding -= landingSlideWidth * itemsSlider;
		}

		$('.elements-wrapper').animate({
			marginLeft: valLanding
		},
		250, function() {
			landingClicked = false;
			
			if (parseInt($(this).css('margin-left')) < 0) {
				toogleArrow(true, $('.arrow-left'));
			} else {
				toogleArrow(false, $('.arrow-left'));
			}

			if ($('.elements-wrapper a:last').offset().left > $('.inner-container').
							width()) {
				toogleArrow(true, $('.arrow-right'));
			} else {
				toogleArrow(false, $('.arrow-right'));
			}
		});

	});


	//	collections

	var valCollection = 0;
	var collectionSlideWidth = 158;
	var multiplier;	
	$(document).
					on('click', '.collection div.arrow-left, .collection div.arrow-right', function(
					event) {
		event.preventDefault();

		if (!isArrowEnabled($(this)))
			return;		
		
		$('.elements-wrapper a').fadeTo(125, 0.3, function() {
			$('.elements-wrapper a').fadeTo(125, 1);
		});

		if ($(this).hasClass('arrow-left')) {
			valCollection += collectionSlideWidth;
		} else {
			multiplier = $('.elements-wrapper a').length - 1;
			valCollection -= collectionSlideWidth;
		}

		$('.elements-wrapper').animate({
			marginLeft: valCollection
		},
		250, function() {			
			if (parseInt($(this).css('margin-left')) < 0) {
				toogleArrow(true, $('.arrow-left'));
			} else {
				toogleArrow(false, $('.arrow-left'));
			}

			if ($('.elements-wrapper a:last').offset().left > $('.inner-container').
							width()) {
				toogleArrow(true, $('.arrow-right'));
			} else {
				toogleArrow(false, $('.arrow-right'));
			}
		});
	});

	//

	if (!isMobile) {

		$(document).on('click', 'a.ajax-product', function(event) {
			event.preventDefault();

			currentHash = $(this).attr('href');

			$.getJSON(currentHash, function(data) {
				$('.copy').html(data.copy);

				$('.copy').css('font-size', '13px').css('line-height', '15px');

				$('.header').html(data.header);

				if (location.hash.indexOf('id=2') > 0) {
					$('.items').css('padding-top', '22px');
				} else if (location.hash.indexOf('id=3') > 0) {
					$('.items').css('padding-top', '0px');
				} else {
					$('.items').css('padding-top', '0px');
				}
			});
		});

	} else {

		window.addEventListener('orientationchange', doOnOrientationChange);
		doOnOrientationChange();

		$(document).on('click', 'a.ajax-product', function(event) {
			event.preventDefault();
		});

		$(document).on('mousedown', 'a.ajax-product', function(event) {
			event.preventDefault();
			currentHash = $(this).attr('href');
			var img = $('.img img', $(this)).attr('src');

			$.getJSON(currentHash, function(data) {
				$('.overlay .copy').html(data.copy);
				$('.overlay .header').html(data.header);

				if ($('.wrapper').hasClass('col2')) {
					$('.overlay .main .header').css('color', '#74BAA3');
				} else if ($('.wrapper').hasClass('col3')) {
					$('.overlay .main .header').css('color', '#9B1B22');
				} else {
					$('.overlay .main .header').css('color', '#C6B7D9');
				}

				$('.overlay .product').css('background-image', 'url(' + img + ')');
				$('html, body').animate({
					scrollTop: 0
				},
				'slow');

				$('#container').hide();
				$('.overlay').fadeIn();

			});
		});

		$(document).on('touchstart', '.overlay .close', function(event) {
			event.preventDefault();
			$('.overlay').fadeOut(function() {
				$('#container').fadeIn();
				$('html, body').animate({
					scrollTop: $(window).height()
				},
				'slow');
			});
		});

	}
	;

	function doOnOrientationChange()
	{
		if (isMobile) {
			resize();
		}
	}

	function isArrowEnabled(arrow)
	{
		if (arrow.css('cursor') === 'auto')
			return false;
		return true;
	}

	function toogleArrow(enable, arrow)
	{
		if (enable) {
			arrow.css('background-position', '50% 50%').css('cursor', 'pointer');
		} else {
			arrow.css('background-position', '200% 50%').css('cursor', 'auto');
		}
	}

	function initArrow()
	{
		if (!isMobile) {
			if($('.wrapper').hasClass('landing')){
				if ($('.elements-wrapper a').length > 3) {
					toogleArrow(true, $('.arrow-right'));
				}
			}else{
				if ($('.elements-wrapper a').length > 4) {
					toogleArrow(true, $('.arrow-right'));
				}
			}
		} else {
			if ($('.elements-wrapper a').length > 1) {
				toogleArrow(true, $('.arrow-right'));
			}
		}
	}

	function resize()
	{
		if (isMobile) {
			var p = $(window).width() / 320;
			if ($('.wrapper').hasClass('col1'))
				$('#header').
								css('padding-top', (p * pading_col1) + 'px');
			if ($('.wrapper').hasClass('col2'))
				$('#header').
								css('padding-top', (p * pading_col2) + 'px');
			if ($('.wrapper').hasClass('col3'))
				$('#header').
								css('padding-top', (p
								* pading_col3)
								+ 'px');
			if ($('.wrapper').hasClass('landing'))
				$('#copy').
								css('padding-top', (p
								* landing)
								+ 'px');
		} else {
			
		}
		
		var w;
		if($('.wrapper').hasClass('landing')){
			w = $('.elements-wrapper a').length * 236;
		}else{
			w = $('.elements-wrapper a').length * 158;
		}
		$('.elements-wrapper').width(w);
	}

	$(window).hashchange(function() {
		var hash = location.hash;

		if (hash === '') {

			$('#container').load('index.php?r=app/landing', function() {
				initArrow();
				resize();
			});

		} else {

			$('body').addClass('loading');
			$('#temp').empty();

			$('#temp').load(hash.substr(1), function() {

				$('#container').fadeOut('slow');

				$('#temp').fadeIn('slow', function() {

					$('#container').html($('#temp').html()).show();
					$('#temp').empty().hide();
					$('body').removeClass('loading');
					initArrow();
					resize();

				});

			});
		}
	});

	// Since the event is only triggered when the hash changes, we need to trigger
	// the event now, to handle the hash the page may have loaded with.
	$(window).hashchange();


});
