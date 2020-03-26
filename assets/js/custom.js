$(window).on('load', function () {
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
		$('body').addClass('ios');
	} else {
		$('body').addClass('web');
	};
	$('body').removeClass('loaded');

    actionsForWordPress()
});

/* viewport width */
function viewport() {
	var e = window,
		a = 'inner';
	if (!('innerWidth' in window)) {
		a = 'client';
		e = document.documentElement || document.body;
	}
	return { width: e[a + 'Width'], height: e[a + 'Height'] }
};
/* viewport width */


$(function () {

	if ($('.js-img').length) {
		var jsImg = $(".js-img");
		new LazyLoad(jsImg, {
			root: null,
			rootMargin: "0px",
			threshold: 0
		});
	};

	/*button open main nav begin*/
	$('.js-button-nav').click(function () {
		$(this).toggleClass('active');
		$('.header-nav').toggleClass('show');
		$('.header-logo').toggleClass('small');
		return false;
	});
	/*button open main nav end*/

	$('.footer-nav li').click(function () {
		$(this).toggleClass('active');
		return false;
	});

	/* placeholder*/
	$('input, textarea').each(function () {
		var placeholder = $(this).attr('placeholder');
		$(this).focus(function () { $(this).attr('placeholder', ''); });
		$(this).focusout(function () {
			$(this).attr('placeholder', placeholder);
		});
	});
	/* placeholder*/

	/* phone mask */

	$("input[type='tel']").mask("+7 (999) 999-99-99");
	// $("input#input-time").mask("c 99:99 до 99:99");

	/* phone masks */

	/* clubs slider */

	var mySwiper = new Swiper('.js--clubs-items', {
		loop: true,
		slidesPerView: 2,
		spaceBetween: 20,
		lazy: true,
		navigation: {
			nextEl: '.nav-arrow-right',
			prevEl: '.nav-arrow-left',
		},
		breakpoints: {
			767: {
				slidesPerView: 3,
				spaceBetween: 20,
			},
			1200: {
				slidesPerView: 5,
				spaceBetween: -35,
			},
			1400: {
				slidesPerView: 6,
				spaceBetween: -35
			}
		}
	});

	/* clubs slider */

	/* clubs slider */

	var stockSlider = new Swiper('.js--stock-items', {
		loop: true,
		slidesPerView: 1,
		spaceBetween: 45,
		lazy: true,
		navigation: {
			nextEl: '.nav-arrow-right',
			prevEl: '.nav-arrow-left',
		},
		breakpoints: {
			767: {
				slidesPerView: 2,
				spaceBetween: 30,
			},
			1200: {
				slidesPerView: 3,
				spaceBetween: 30,
			}
		}
	});

	/* clubs slider */

	/* other news slider */

	var otherNewsSlider = new Swiper('.js--other-news__slider', {
		loop: true,
		slidesPerView: 1,
		spaceBetween: 10,
		lazy: true,
		navigation: {
			nextEl: '.news-nav-arrow-right',
			prevEl: '.news-nav-arrow-left',
		},
		breakpoints: {
			767: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			930: {
				slidesPerView: 2,
				spaceBetween: 100
			},
			1400: {
				slidesPerView: 2,
				spaceBetween: 240
			}
		}
	});

	/* other news slider */

	/*input label animation*/
	$('.form-control').focus(function () {
		$(this).parents('.box-field').addClass('focused-field').removeClass('filled-field');
	});
	$('input, textarea').each(function () {
		var valField = $(this).val().length;
		if (valField >= 1) {
			$(this).parents('.box-field').addClass('focused-field');
		} else {
			$(this).parents('.box-field').removeClass('focused-field');
		};
	});
	$('.form-control').focusout(function () {
		var valField = $(this).val().length;
		if (valField >= 1) {
			$(this).parents('.box-field').addClass('focused-field').addClass('filled-field');
			if ($(this).val() == '+7 (___) ___-__-__' || $(this).val() == "c __:__ до __:__") {
				$(this).parents('.box-field').removeClass('focused-field');
			}
		} else {
			$(this).parents('.box-field').removeClass('focused-field');

		};
	});
	/*input label animation*/

	/*fancubox popup*/

	if ($('.js-fancybox').length) {
		$('.js-fancybox').fancybox({
			margin: 0,
			padding: 0,
			beforeShow: function () {
				$("html").addClass('fixed');
			},
			afterClose: function () {
				$("html").removeClass('fixed');
			}
		});
	};

	$('.js-fancybox-close').click(function () {
		$('.fancybox-close').click();
		return false;
	});

	var $popup = $('.js-popup');

	//popup-close
	var hideContainer = function () {
		$popup.closest(".main-wrapper").find('.js-popup-box').removeClass('is-active');
	};

	//popup
	$('[data-popup-link]').on('click', function (e) {
		e.preventDefault();
		var $ddLink = $(e.currentTarget).data('popup-link');
		var $ddBox = $('[data-popup-box= "'+ $ddLink +'"]');
		e.stopPropagation();
		$ddBox.addClass('is-active');
	});

	//popup-close
	$('body').on('click', '.js-popup-close-btn', function (e) {
		e.preventDefault();
		hideContainer();
	});

	$('body').on('click', function (e) {
		if ($(e.target).closest($popup).length == 0 && $(e.target).closest($('.xdsoft_datetimepicker')).length == 0) {
			hideContainer();
		} else {
			return;
		}
	});

	/*fancubox popup*/

	/*scroll id*/
	$('.js-scroll').click(function () {
		var target = $(this).attr('href');
		$('html, body').animate({
			scrollTop: $(target).offset().top
		}, 1000);
		return false;
	});
	/*scroll id*/

	/*form validation*/
	if ($('.js--contact-form').length) {
		$('.js--contact-form').each(function () {
			$(this).validate({
				rules: {
					name: {
						required: true,
						minlength: 1
					},
					phone: {
						required: true
					}
				},
				messages: {
					name: {
						required: "",
						minlength: ""
					},
					phone: {
						required: ""
					}
				},

				submitHandler: function (form) {
					$('.contact-form-success').addClass('active');
					$('.contact-form').addClass('fade');
				}
			});
		})
	};
	/*form validation*/


	/* calendar */

	$('#input-date').datetimepicker({
		timepicker:false,
		format:'d.m.yy',
		formatDate:'d.m.yy',
		dayOfWeekStart: 1,
		todayButton:false,
		lang: 'ru'
	});

	$('#input-time').datetimepicker({
		datepicker:false,
		format:'H:i',
		step:30
	});

	$('#input-time-to').datetimepicker({
		datepicker:false,
		format:'H:i',
		step:30
	});


	/* calendar */

	/* tabs */
	$('.library-types li a').click(function () {
		$('.library-block__items-wrap').addClass('hide-tab');
		var id = $(this).attr('href');
		$(id).removeClass('hide-tab');
		return false;
	});

	$('.prices-panel li a').click(function () {
		$('.prices-panel li a').removeClass('active');
		$(this).addClass('active');
		$('.prices-block').addClass('hide-tab');
		var id = $(this).attr('href');
		$(id).removeClass('hide-tab');
		return false;
	});

	/* tabs */

	/*load btn*/
	if ($('#library-pc').length) {
		$("#library-pc .library-block__item").slice(0, 20).css('display', 'block');
		$("#library-pc .library-block__btn-more").on('click', function (e) {
			e.preventDefault();
			$("#library-pc .library-block__item:hidden").slice(0, 4).css('display', 'block');
			if ($("#library-pc .library-block__item:hidden").length == 0) {
				$("#library-pc .library-block__btn-more").fadeOut('slow');
			}
		});
	}
	if ($('#library-ps').length) {
		$("#library-ps .library-block__item").slice(0, 20).css('display', 'block');
		$("#library-ps .library-block__btn-more").on('click', function (e) {
			e.preventDefault();
			$("#library-ps .library-block__item:hidden").slice(0, 4).css('display', 'block');
			if ($("#library-ps .library-block__item:hidden").length == 0) {
				$("#library-ps .library-block__btn-more").fadeOut('slow');
			}
		});
	}
	/*load btn*/

	/*list js*/
	var options = {
		valueNames: [
			'name'
		]
	};

	var gamesList1 = new List('library-pc', options);
	var gamesList2 = new List('library-ps', options);
	$(".search").keyup(function () {
		gamesList1.search($(this).val());
		gamesList2.search($(this).val());
		if ($(this).val().length < 1) {
			$(".library-block__btn-more").fadeIn('slow');
			$(".library-block__item").css('display', 'none');
			$("#library-pc .library-block__item").slice(0, 20).css('display', 'block');
			$("#library-ps .library-block__item").slice(0, 20).css('display', 'block');
		} else {
			$(".library-block__btn-more").fadeOut('slow');
			$(".library-block__item").slice(0, $(".library-block__item").length).css('display', 'block');
		}

	});
	/*list js*/

});

var handler = function () {

	var height_footer = $('footer').height();
	var height_header = $('header').height();


	var viewport_wid = viewport().width;
	var viewport_height = viewport().height;

	if (viewport_wid <= 768) {
		$('.header-left').detach().insertAfter($('.header-nav > ul'));
	}
	if (viewport_wid > 767) {
		$('.header-left').detach().insertBefore($('.header-logo'));
	}

}

$(window).bind('load', handler);
$(window).bind('resize', handler);

function getYaMap() {
	if ($('#map').length) {
		ymaps.ready(function () {
			var myMap = new ymaps.Map('map', {
				center: [55.760874, 37.718076],
				zoom: 15
			}, {
				searchControlProvider: 'yandex#search'
			})

			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
				myMap.behaviors.disable('multiTouch');
				myMap.behaviors.disable('scrollZoom');
				myMap.behaviors.disable('drag');
			};
			myMap.behaviors.disable('scrollZoom');
			myMap.controls.remove('geolocationControl');
			myMap.controls.remove('searchControl');
			myMap.controls.remove('trafficControl');
			myMap.controls.remove('typeSelector');
			myMap.controls.remove('fullscreenControl');
			myMap.controls.remove('rulerControl');
		});

	};
	if ($('#map2').length) {
		ymaps.ready(function () {
			var myMap = new ymaps.Map('map2', {
				center: [55.760874, 37.718076],
				zoom: 15
			}, {
				searchControlProvider: 'yandex#search'
			})

			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
				myMap.behaviors.disable('multiTouch');
				myMap.behaviors.disable('scrollZoom');
				myMap.behaviors.disable('drag');
			};
			myMap.behaviors.disable('scrollZoom');
			myMap.controls.remove('geolocationControl');
			myMap.controls.remove('searchControl');
			myMap.controls.remove('trafficControl');
			myMap.controls.remove('typeSelector');
			myMap.controls.remove('fullscreenControl');
			myMap.controls.remove('rulerControl');
		});

	};
	if ($('#map3').length) {
		ymaps.ready(function () {
			var myMap = new ymaps.Map('map3', {
				center: [55.760874, 37.718076],
				zoom: 15
			}, {
				searchControlProvider: 'yandex#search'
			})

			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
				myMap.behaviors.disable('multiTouch');
				myMap.behaviors.disable('scrollZoom');
				myMap.behaviors.disable('drag');
			};
			myMap.behaviors.disable('scrollZoom');
			myMap.controls.remove('geolocationControl');
			myMap.controls.remove('searchControl');
			myMap.controls.remove('trafficControl');
			myMap.controls.remove('typeSelector');
			myMap.controls.remove('fullscreenControl');
			myMap.controls.remove('rulerControl');
		});

	};
}

function actionsForWordPress() {
    copyTextBtnForForm('.js-copy-text-in-form', '#booking-modal form')
	sendFormWithAjax()
	wrapImagesTwoAndMore()
}

function copyTextBtnForForm(selector, form) {
    $(selector).find('a').each(function () {
        $(this).on('click', function () {
            var text = $(this).text()

            if ($(form).find('input[name=club]'))
                $(form).find('input[name=club]').remove()

            $(form).find(':submit').after('<input type="hidden" name="club" value="' + text + '">')
        })
    })
}

function sendFormWithAjax() {
    var form = $('form')
    form.submit(function (event) {
        event.preventDefault()

        validate()

        $.ajax({
            type: "POST",
            url: "wp-admin/admin-ajax.php",
            data: $(this).serialize() + "&action=send_form",
            success: function (res) {
                form.find(":submit").attr("disabled", false)
                if(res === 'openPopup'){
                    // open popup success
					$('.contact-form-success').addClass('active');
					$('.contact-form').addClass('fade');
                } else {
                    console.log(res)
                }
            },
            beforeSend: function () {
                form.find(":submit").attr("disabled", true)
            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        })
    })
}

function validate(){
    if ($('.js--contact-form2').length) {
        $('.js--contact-form2').each(function () {
            $(this).validate({
                rules: {
                    complection: {
                        required: true,
                        minlength: 1
                    },
                    num: {
                        required: true,
                        minlength: 1
                    },
                    date: {
                        required: true,
                        minlength: 1
                    },
                    time: {
                        required: true,
                        minlength: 1
                    },
                    email: {
                        required: true,
                        minlength: 1
                    },
                    name2: {
                        required: true,
                        minlength: 1
                    }
                },
                messages: {
                    complection: {
                        required: "",
                        minlength: ""
                    },
                    num: {
                        required: "",
                        minlength: ""
                    },
                    date: {
                        required: "",
                        minlength: ""
                    },
                    time: {
                        required: "",
                        minlength: ""
                    },
                    email: {
                        required: "",
                        minlength: ""
                    },
                    name2: {
                        required: "",
                        minlength: ""
                    }
                },
            });
        })
    };
}

function wrapImagesTwoAndMore() {
    var imgs = $('.js-add-wrap-for-img p > img')
    if (imgs.length > 1) {
        imgs.wrapAll('<div class="single-news__img">');
    }
}

function heateorSssPopup(e) {
    window.open(e, "popUpWindow", "height=400,width=600,left=400,top=100,resizable,scrollbars,toolbar=0,personalbar=0,menubar=no,location=no,directories=no,status")
}