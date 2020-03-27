$(window).on('load', function () {
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
		$('body').addClass('ios');
	} else {
		$('body').addClass('web');
	};
	$('body').removeClass('loaded');

    /** START: WordPress */
    actionsForWordPress()
    /** END: WordPress */
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

    $('body.single .prices-panel li a').click(function () {
        $('body.single .prices-panel li a').removeClass('active');
        $(this).addClass('active');
        $('.prices-block').addClass('hide-tab');
        var id = $(this).attr('href');
        $(id).removeClass('hide-tab');
        return false;
    });
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
    findGamesWithAjax()
	loadMoreShowPosts()
	addClassesForPagination()
}


function findGamesWithAjax() {
    var searchTerm = '';
    var searchPlatform = $('#searchform input[name=platform]').val();

    $('.search-input').keydown(function () {
        searchTerm = $.trim($(this).val());
    });

    /* START: click on tab for search game */
    $('.library-types li a').click(function () {
        var id = $(this).attr('href').replace('#','');
        $('#searchform input[name=platform]').val(id)
        ajaxRequestSearchGames(searchTerm, id)

        return false;
    });
    /* END: click on tab for search game */

    /* START: input text for search game */
    $('.search-input').keyup(function () {
        searchPlatform = $('#searchform input[name=platform]').val();
        if (!($.trim($(this).val()) == searchTerm)) { // Если новое значение не равно старому, идем дальше
            searchTerm = $.trim($(this).val());
            if (searchTerm.length > 0) { // Если введено больше 2-х символов, идем дальше
                ajaxRequestSearchGames(searchTerm, searchPlatform)
            }
        }
    });
    /* END: input text for search game */



    $('.search-input').focusin(function () {
        $('.result-search').fadeIn();
    })
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

function ajaxRequestSearchGames(searchTerm, searchPlatform) {
    $.ajax({
        url: homeUrl + '/wp-admin/admin-ajax.php', // Ссылка на AJAX обработчик WP
        type: 'POST', // Отправляем данные методом POST
        data: {
            'action': 'ajax_search_games', // Вызываемое действие, которое мы описали в functions.php
            'term': searchTerm, // Отправляемые данные поля ввода
            'platform': searchPlatform // Отправляем данные нажатой вкладки
        },
        beforeSend: function () { // Перед отправкой данных
            $('.js-result-search-list').fadeOut(); // Скроем блок результатов
            $('.js-result-search-list').empty(); // Очистим блок результатов
            $('.preloader').show(); // Покажем загрузчик
        },
        success: function (result) { // После выполнения поиска
            // console.log(result)
            $('.preloader').hide(); // Скроем загрузчик
            $('.js-result-search-list').fadeIn().html(result); // Покажем блок результатов и добавим в него полученные данные
            loadMoreShowPosts()
        }
    });
}

function loadMoreShowPosts() {
    var countFirsLoad = 10,
        countLoadingPosts = 4

    if ($('.js-result-search-list').length) {
        loadMoreDisplayBlock(countFirsLoad)
        if ($(".js-result-search-list .library-block__item:hidden").length == 0) {
            $(".library-block__btn-more").hide();
        } else {
            $(".library-block__btn-more").show();
        }

        $(".library-block__btn-more").on('click', function (e) {
            e.preventDefault();
            $(".js-result-search-list .library-block__item:hidden").slice(0, countLoadingPosts).css('display', 'block');
            if ($(".js-result-search-list .library-block__item:hidden").length == 0) {
                $(".library-block__btn-more").fadeOut('slow');
            }
            return false;
        });
    }

}

function loadMoreDisplayBlock(countLoadingPosts) {
    $(".js-result-search-list .library-block__item").slice(0, countLoadingPosts).css('display', 'block');
}

function addClassesForPagination() {
	var wrap = '.news-pagination';

	$(wrap).find('ul').addClass('paging-list')
    $(wrap).find('li').addClass('paging-list__item')
    $(wrap).find('li:first').has('a').addClass('paging-prev')
    $(wrap).find('li:last').has('a').addClass('paging-next')
    $(wrap).find('a, span').addClass('paging-list__link')
    $(wrap).find('.current').addClass('active')
}