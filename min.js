var winwidth3;

$(function () {
	winwidth3 = $(this).width();
	fixed_nav(); //navbar fixed
	//nav_dropDown();// dropdown
	homePage_banner(); // HomePage Banner
	latest_happenings(); //Latest Happenings
	sectionScroll_animation(); //inview and animae element
	plants_list(); //plants list
	members_lightBox(); //members light box
	openings_accordion(); //openings accordion
	copyRight(); //copyRights

	var a = $('.dropdown').find('.dropdown-toggle');
	a.after('<span class="toggle-icon fa fa-angle-down" data-toggle="dropdown-menu" role="button" aria-haspopup="true" aria-expanded="false"></span>');
});

$(window).on('load resize', function () {
	winwidth3 = $(window).width();
	nav_dropDown();
});


function nav_dropDown() {
	if (winwidth3 > 991) {  
		$(".dropdown").hover(function (e) {
			e.stopPropagation();
			$(this).children('.dropdown-menu').not('.in .dropdown-menu').css({
				"opacity": 1,
				"visibility": "visible"
			}).stop(true, true).slideDown("slow", function () {
				$(this).toggleClass('open');
				$('.dropdown-menu li').removeClass('view');
				// if ($('.dropdown-menu li.active').length == 0)
				// 	$('.dropdown-menu .secondary-nav:first-child li:first-child').addClass('view');
				// else
				// 	$('.dropdown-menu li.active').addClass('view');
			});
		}, function (e) {
			e.stopPropagation();
			$(this).children('.dropdown-menu').not('.in .dropdown-menu').css({
				"opacity": 0,
				"visibility": "visible"
			}).stop(true, true).slideUp(30, function () {
				$(this).toggleClass('open');
			});
		});
	} else {
		$('.toggle-icon').on('click', function(e){
			e.preventDefault();
			$(this).parent('.dropdown').toggleClass('opened');
			$(this).siblings('.dropdown-menu').slideToggle('slow');
		});
	}
	$('a.dropdown-toggle').click(function () {
		var _this_nav = $(this).attr('href');
		window.open(_this_nav, "_self")
	});
	// $('.dropdown-menu li').hover(function () {
	// 	$('.dropdown-menu li').removeClass('view');
	// 	$(this).toggleClass('view');
	// });
	// function align_dropdown() {
	// 	$('.nav-dropdown').each(function () {
	// 		var _this = $(this).parent('.dropdown');
	// 		$(this).find('.secondary-nav').css({
	// 			'left': _this.offset().left - 90
	// 		});
	// 	});
	// };
};


function homePage_banner() {
	$('.homePage-banner .banner-slider-container').slick({
		infinite: true,
		dots: false,
		arrows: true,
		fade: true,
		autoplay: true,
		cssEase: 'ease-in-out',
		easing: 'easeOutElastic',
		autoplaySpeed: 5000,
		pauseOnHover: false,
		pauseOnFocus: false, 
	}).on('afterChange', function () {
		$('.slider-content .banner-title').show('slow');
		$('.slider-content .slider-active-content').html($('.banner-slider-container .item.slick-active').find('.banner-title').clone());
	}).on('beforeChange', function () {
		$('.slider-content .banner-title').hide();
	});
	$('.banner-slider-container .slick-dots').appendTo('.slider-content .container');
	$('.banner-slider-container .item.slick-active').find('.banner-title').clone().appendTo('.slider-content .slider-active-content');
};

function latest_happenings() {
	$('.latest-happenings .list-wrapper').slick({
		infinite: true,
		autoplay: true,
		speed: 800,
		autoplaySpeed: 3000,
		vertical: true,
		pauseOnHover: true,
		pauseOnFocus: true,
	}).find('.happenings-content').css({
		'height': $('.latest-happenings .list-wrapper').height()
	});
}

function sectionScroll_animation() {
	var $animation_elements = $('.section-wrapper');
	var $window = $(window);

	function check_if_in_view() {
		var window_height = $window.height() - 20;
		var window_top_position = $window.scrollTop();
		var window_bottom_position = (window_top_position + window_height);

		$.each($animation_elements, function () {
			var $element = $(this);
			var element_height = $element.outerHeight();
			var element_top_position = $element.offset().top;
			var element_bottom_position = (element_top_position + element_height);

			//check to see if this current container is within viewport
			if ((element_bottom_position >= window_top_position) &&
				(element_top_position <= window_bottom_position)) {
				$element.addClass('in-view');
				//$element.find('.has-animate').addClass('animate');
				//$('.contents-loaded').find('.in-view').addClass('animate_title');
			} else {
				$element.removeClass('in-view');
				//$element.find('.has-animate').removeClass('animate');	
				//$('.contents-loaded .in-view').removeClass('animate_title');		
			}
		});
		$('.in-view').find('.has-animate').each(function () {
			var animate_element = $(this);
			var animate_element_top = animate_element.offset().top;
			var animate_element_bottom = animate_element_top + animate_element.height();

			if ((animate_element_bottom >= window_top_position) &&
				(animate_element_top <= window_bottom_position)) {
				$(this).addClass('elementInview');
			} else {
				$(this).removeClass('elementInview');
			}
		});
	}
	$window.on('scroll resize', check_if_in_view);
	$window.trigger('scroll');
};

function fixed_nav() {
	var nav_header_top = $('.header-wrapper').height();
	$(window).scroll(function () {
		var scroll_top = $(window).scrollTop();
		if (scroll_top > 20) {
			$('.header-wrapper').addClass('nav-fixed');
		} else {
			$('.header-wrapper').removeClass('nav-fixed');
		}
	});
};

function plants_list() {
	$('.plants-list-wrapper').slick({
		centerMode: true,
		centerPadding: '60px',
		slidesToShow: 5,
		responsive: [{
				breakpoint: 840,
				settings: {
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		],
	}).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		//console.log($('.plants-content.slick-current').find('.title-text').html());
		$('.plants-details-container').addClass('animated fadeIn');
		$('.plants-details-container').addClass('animated fadeOut');
	}).on('afterChange', function (event, slick, currentSlide, nextSlide) {
		//console.log($('.plants-content.slick-current').find('.title-text').html());
		$('.plants-details-container').html($('.plants-list-wrapper').find('.slick-current .plant-details').clone());
		$('.plants-details-container').removeClass('animated fadeOut');
		$('.plants-details-container').addClass('animated fadeIn');
	});
	$('.plant-title').on('click', function (e) {
		e.preventDefault();
		$('.plants-list-wrapper').slick('slickGoTo', $(this).parent().attr('data-slick-index'));
	});
	$('.plants-details-container').html($('.plants-list-wrapper').find('.slick-current .plant-details').clone());
}

function members_lightBox() {
	var _this;
	$(".members").click(function () {
		_this = $(this).index()
	});
	$(".members").fancybox({
		afterLoad: function () {
			//this.content = this.content.html();
			if ($(window).width() >= 680) {
				this.content = $('.members-list').clone().html();
			} else {
				this.content = this.content.clone();
			}
		},
		beforeShow: function () {
			$('.fancybox-overlay,.fancybox-wrap').addClass('no-gallery');
			$('.fancybox-inner').addClass('lightbox_directors');
			$('.fancybox-inner').wrapInner('<div class="lightbox-wrapper"> </div>');
			$('.lightbox-wrapper .members').removeClass('col-md-3 cols-sm-4 cols-xs-6').addClass('fancy_members').wrap('<div class="person-slides"></div>');
			$('.person-slides .fancy_members').removeClass('members');
			if ($(window).width() >= 680) {
				$('.lightbox-wrapper').slick({
					arrow: true,
					dots: false,
					adaptiveHeight: true,
					fade: true,
					speed: 600,
					cssEase: 'ease-in-out',
					easing: 'easeOutElastic',
				});
				$('.lightbox-wrapper').slick('slickGoTo', _this);
			}
		}
	});
}

function openings_accordion() {
	$('.openings-list_action').live('click', function () {
		var _this, _content_container, job_id;
		_this = $(this);
		_content_container = _this.closest('.openings-list_content');
		job_id = _this.data('id');
		$('.openings-list_content').removeClass('active');
		$('.openings-details').slideUp('slow');
		if (_content_container.find('.openings-details').is(':hidden') == true) {
			_content_container.addClass('active');
			$('.section-opeings_enquiry_form').appendTo(_content_container.find('.openings-details'));
		//	$('.active .section-opeings_enquiry_form').find('form #job_id').attr('value', 'jobs_enquiry' + job_id);
		$('.active .section-opeings_enquiry_form').find('form #job_id').attr('value',  job_id);
			_content_container.find('.openings-details').slideDown('slow', function () {
				$('html,body').animate({
					scrollTop: _content_container.offset().top - 60
				});
			});
		}

	});
	$('input[type="file"]').change(function () {
		var filename = $(this).val().replace(/C:\\fakepath\\/i, '')
		$(this).parent().find('.placeholder').text(filename);
	});
}





function copyRight() {
	var date = new Date();
	var year = date.getFullYear();
	document.getElementById('copyRightYear').innerHTML = year;


// $(document).on({
//     "contextmenu": function(e) {
//         console.log("ctx menu button:", e.which); 

//         // Stop the context menu
//         e.preventDefault();
//     },
//     "mousedown": function(e) { 
//         console.log("normal mouse down:", e.which); 
//     },
//     "mouseup": function(e) { 
//         console.log("normal mouse up:", e.which); 
//     }
// });

$("img").mousedown(function(){
    return false;
});


} 
$.fn.extend({ 
	barChart: function (_data) {  
		$(this).highcharts({
			chart: {
				type: 'column', 
				
			},
			title: {
				text: _data.title,
				style : {
					'color': '#00a654'
				}
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				categories:  _data.xAxis,
				crosshair: true
			},
			legend: {
					enabled: false
			},
			yAxis: {
				min: 0, 
				
			},
			credits: {
				enabled: false
			},			
			tooltip: { 
				formatter: function () {
					return '<b>'+ _data.title +'</b> for '+this.x +
						' is <div class="text-center">' + this.y +'</div>';
				},
				useHTML: true
			},
			plotOptions: {
				column: {
					dataLabels: {
						enabled: true,
						crop: false,
						overflow: 'none'
					}
				}
			},
			series: [{
				name: ' ',
				data: _data.chart_data,
				color: '#ffcb41'

			}]
		});
	}
});