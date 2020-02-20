var windowW = $(window).width()
var windowH = $(window).height()
//close video on main page
$('.close-btn').on('click', function () {
	$('.video-block').hide()
});

//settings video
if ($('#mainVideo').length) {
	var btnMute = $('#btnMute'),
		player = $('#mainVideo'),
		btnPlayPause = $('#btnPlayPause'),
		btnFullScreen = $('#btnFullScreen');

	//init funct
	btnMute.on('click', function () {
		muteVolume()
		$('i', this).toggleClass('fa-volume-up fa-volume-off')
	});
	btnPlayPause.on('click', function () {
		playPauseVideo()
		$('i', this).toggleClass('fa-pause-circle fa-play-circle')
	});
	btnFullScreen.on('click', function () {
		toggleFullScreen()
		$('i', this).toggleClass('fa-arrows-alt fa-compress')
	});

	//play\pause
	player.on('play', function () {
		btnPlayPause.attr('pause');
	}, false);
	player.on('pause', function () {
		btnPlayPause.attr('play');
	}, false);

	function playPauseVideo() {
		if (player.get(0).paused || player.ended) { 
			btnPlayPause.attr('pause');
			player.get(0).play();
		}
		else { 
			console.log(player.get(0))
			btnPlayPause.attr('play');
			player.get(0).pause();
		}
	}

	// Toggles the media player's mute and unmute status
	function muteVolume() {
		if (player.get(0).muted) {
			player.get(0).muted = false;
		}
		else {
			player.get(0).muted = true;
		}
	}
	
	//fullscreen
	function toggleFullScreen() { 

		if (player.get(0).requestFullscreen)
			if (document.fullScreenElement) {
				document.cancelFullScreen();
			} else {
				player.get(0).requestFullscreen();
			}
		else if (player.get(0).msRequestFullscreen)
			if (document.msFullscreenElement) {
				document.msExitFullscreen();
			} else {
				player.get(0).msRequestFullscreen();
			}
		else if (player.get(0).mozRequestFullScreen)
			if (document.mozFullScreenElement) {
				document.mozCancelFullScreen();
			} else {
				player.get(0).mozRequestFullScreen();
			}
		else if (player.get(0).webkitRequestFullscreen)
			if (document.webkitFullscreenElement) {
				document.webkitCancelFullScreen();
			} else {
				player.get(0).webkitRequestFullscreen();
			}
		else {
			alert("Fullscreen API is not supported");

		}
	}

	function exitFullScreen() {
		if (document.exitFullscreen) {
			document.exitFullscreen();
		} else if (document.msExitFullscreen) {
			document.msExitFullscreen();
		} else if (document.mozCancelFullScreen) {
			document.mozCancelFullScreen();
		} else if (document.webkitExitFullscreen) {
			document.webkitExitFullscreen();
		}
	}

}

//select

if ($('.school-search-form').length) {
	$('.school-search-form select').each(function () {
		var t = $(this)
		t.SumoSelect({
			csvDispCount: 8,
			captionFormat: '{0} выбрано',
			captionFormatAllSelected: '{0} все выбраны!',
			triggerChangeCombined: false,
		})
	})
} else {
	var x, i, j, selElmnt, a, b, c;
	/*look for any elements with the class "custom-select":*/
	x = document.getElementsByClassName("filter-select");
	for (i = 0; i < x.length; i++) {
		selElmnt = x[i].getElementsByTagName("select")[0];
		/*for each element, create a new DIV that will act as the selected item:*/
		a = document.createElement("p");
		a.setAttribute("class", "select-selected");
		a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
		x[i].appendChild(a);
		/*for each element, create a new DIV that will contain the option list:*/
		b = document.createElement("DIV");
		b.setAttribute("class", "select-items select-hide");
		for (j = 0; j < selElmnt.length; j++) {
			/*for each option in the original select element,
			create a new DIV that will act as an option item:*/
			c = document.createElement("p");
			c.innerHTML = selElmnt.options[j].innerHTML;
			c.addEventListener("click", function (e) {
				/*when an item is clicked, update the original select box,
				and the selected item:*/
				var y, i, k, s, h;
				s = this.parentNode.parentNode.getElementsByTagName("select")[0];
				h = this.parentNode.previousSibling;
				for (i = 0; i < s.length; i++) {
					if (s.options[i].innerHTML == this.innerHTML) {
						s.selectedIndex = i;
						h.innerHTML = this.innerHTML;
						y = this.parentNode.getElementsByClassName("same-as-selected");
						for (k = 0; k < y.length; k++) {
							y[k].removeAttribute("class");
						}
						this.setAttribute("class", "same-as-selected");
						break;
					}
				}
				h.click();
			});
			b.appendChild(c);
		}
		x[i].appendChild(b);
		a.addEventListener("click", function (e) {
			/*when the select box is clicked, close any other select boxes,
			and open/close the current select box:*/
			e.stopPropagation();
			closeAllSelect(this);
			this.nextSibling.classList.toggle("select-hide");
			this.classList.toggle("select-arrow-active");
		});
	}
	function closeAllSelect(elmnt) {
		/*a function that will close all select boxes in the document,
		except the current select box:*/
		var x, y, i, arrNo = [];
		x = document.getElementsByClassName("select-items");
		y = document.getElementsByClassName("select-selected");
		for (i = 0; i < y.length; i++) {
			if (elmnt == y[i]) {
				arrNo.push(i)
			} else {
				y[i].classList.remove("select-arrow-active");
			}
		}
		for (i = 0; i < x.length; i++) {
			if (arrNo.indexOf(i)) {
				x[i].classList.add("select-hide");
			}
		}
	}
	/*if the user clicks anywhere outside the select box,
	  then close all select boxes:*/

	document.addEventListener("click", closeAllSelect);
}

// filter page active input\select
// if ($('.filter').length) {

//   $('.select-selected').on('click', function () {
// 	$('.js-filter').removeClass('filter-active')
// 	$(this).parent().addClass('filter-active')
//   });

//   $('.institution-filter-input').on('click', function () {
// 	$('.js-filter').removeClass('filter-active')
// 	$(this).addClass('filter-active')
//   });



// }
// $('.search-slider').slick()
$('.search--for').slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	arrows: false, 
	infinite: false, 
	asNavFor: '.search--nav'
  });

  $('.search--nav').slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	focusOnSelect: true,
	infinite: false,
	asNavFor: '.search--for',  
  });
if (windowW < 1200) {
//search page tabs
	//change placeholder text
	$('.search-input').attr('placeholder', 'Поиск')

	//get titles width
	// var titlesTitleWidth = $('.article-title').outerWidth() 
	// console.log(titlesTitleWidth)
	// $('.article-title').each(function () {
	// 	titlesTitleWidth = $(this).outerWidth() 
	// });

	//append titles to another div
	// $('.search-article--titles').append($('.article-title'))

	// //move artcles
	// $('.article-title').on('click', function () {

	// 	var articleTitleIndex = $(this).index()

	// 	//move article content
	// 	var articleContent = $('.search-wrap--item')

	// 	if(windowW < 576) {
	// 		var articleContentWidth = articleContent.outerWidth()
	// 	} else {
	// 		var articleContentWidth = articleContent.outerWidth() * 0.8
	// 	}
	// 	var contentTranslate = 'translateX(-' + (articleTitleIndex * articleContentWidth) + 'px)'

	// 	$('.search-wrap--mobile').css({
	// 		transform: contentTranslate,
	// 	})

	// 	//move article titles 
	// 	if(windowW < 576) { 
	// 		var articleTitleWidth = +$(this).outerWidth()
	// 		var articleTitleWidthHalf = -Math.abs(+$(this).outerWidth() / 2)
	// 		var articleTitleScroll = (articleTitleIndex * articleTitleWidth) + articleTitleWidthHalf
	// 		console.log(articleTitleScroll)
	// 		$('.search-article--titles').css({
	// 			transform:  'translateX(-' + articleTitleScroll + 'px)',
	// 		}) 
	// 	} else {
	// 		$('.search-article--titles').css({
	// 			transform: contentTranslate,
	// 		})
	// 	}

	// 	//add active class
	// 	$('.article-title').removeClass('active')
	// 	$(this).addClass('active')

	// });

	//EOL
}
if (windowW < 768) {

	//main page
	//put login btn and main title block under video block
	$('.video-block').css('height', (windowH - 56) + 'px').append($('.main-title .h1, .btn--login'))

	//add icons
	// $('.btn--institution').append('<i class="fas fa-link"></i>')

	//article sliders
	if ($('.institution, .article--items, .post-articles--slider').length) {

		$('.article--items, .post-articles--slider').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			vertical: true,
			verticalSwiping: true
		})

		$('.institution').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
		})
	}

	//EOL
	
	//to top
	$('.to-top').on('click', function () {
		$('html, body').animate({ scrollTop: 0 }, 800);
		return false;
	});

	//show to top 
	$(window).on('scroll', function () {
		if ($(window).scrollTop() > (window.innerHeight - 100)) {
			$('.to-top').addClass('to-top_show')
		} else {
			$('.to-top').removeClass('to-top_show')
		}
	})

	//EOL
	//schoold not paid
	$('.institution-btn[data-institution-btn]').on('click', function () {
		$(this)
			.addClass('active')
			.siblings('.institution-btn').removeClass('active') //bgc active btn

		//show needed content
		var institutionBtnData = $(this).attr('data-institution-btn')

		$('.institution-content[data-institution-content=' + institutionBtnData + ']')
			.addClass('active')
			.siblings('.institution-content')
			.removeClass('active')
	});

}

//filter price
var profileInput = $('.field--input')
if (profileInput.length) {
	profileInput.on('click', function () {
		profileInput.parent().removeClass('active')
		$(this).parent().addClass('active')
	})
}

//schhol and hei search switcher content
// $('.institution-btn[data-search-btn]').on('click', function () {
//   $(this)
//	 .addClass('active')
//	 .siblings('.institution-btn').removeClass('active') //bgc active btn

//   //show needed content
//   var institutionBtnData = $(this).attr('data-search-btn')

//   $('.institution-wrap[data-search-content=' + institutionBtnData + ']')
//	 .addClass('active')
//	 .siblings('.institution-wrap')
//	 .removeClass('active')
// });

//fix chat send block to the bottom before footer
// var innerHeight = window.innerHeight - 369

// $(window).on('scroll', function () {
//   if ($(window).scrollTop() > innerHeight) {
//	 $('.chat-send').css({
//	   position: 'absolute',
//	   bottom: 'initial',
//	   top: windowH - 369 + 'px'
//	 })
//   } else {
//	 $('.chat-send').css({
//	   position: 'fixed',
//	   bottom: 0,
//	   top: 'initial'
//	 })
//   }
// });



//login popup
$('.btn--login, .main-info--content .btn').on('click', function () {
	// $('.popup-main').addClass('popup-show').removeClass('popup-hide')
	$('.popup-login').addClass('popup-show').removeClass('popup-hide')
	$('.popup-main').removeClass('popup-show').addClass('popup-hide')
	$('.popup-mask').addClass('popup-mask--show').removeClass('popup-hide')
	// return false;
});

//show login popup
$('.choose-login--link.mail').on('click', function () {
	// $('.popup-login').addClass('popup-show').removeClass('popup-hide')
	// $('.popup-main').removeClass('popup-show').addClass('popup-hide')
})

//show phone popup
$('.choose-login--link.phone').on('click', function () {
	$('.popup-tel').addClass('popup-show').removeClass('popup-hide')
	$('.popup-main').removeClass('popup-show').addClass('popup-hide')
})

//return to main popup
$('.popup--title').on('click', function () {
	$(this).parent().removeClass('popup-show').addClass('popup-hide')
	$('.popup-main').addClass('popup-show').removeClass('popup-hide')
})


//close popup
//by esc
$(document).on('keydown', function (e) {
	if (e.keyCode == 27) {
		$('.popup-show').removeClass('popup-show').addClass('popup-hide')
		$('.popup-mask').removeClass('popup-mask--show')
	}
})

//by click outside popup
$(document).on('click', function (e) {
	if (e.target.classList[0] == 'popup-mask') {
		$('.popup-show').removeClass('popup-show').addClass('popup-hide')
		$('.popup-mask').removeClass('popup-mask--show')
	}
})

//test mail check
var mail = 'admin@mail.com'
var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var mailActiveBtn = 0
var passActiveBtn = 0

$('.popup--input').on('keyup', function () {

	if ($(this).attr('name') === 'user_mail') {

		if ($(this).val() != mail) { // if mail does NOT exist in DB

			//change btn text and class
			$(this).siblings('.btn').removeClass('btn--popup-login').addClass('btn--popup-reg').text('Зарегистрироваться')

			//if val reg has done test add +1 to active btn
			if (reg.test(String($(this).val()).toLowerCase())) {
				//limit
				if (mailActiveBtn >= 1) {
					mailActiveBtn = 1
				} else {
					mailActiveBtn += 1
				}
			} else {
				//limit
				if (mailActiveBtn <= 1) {
					mailActiveBtn = 0
				} else {
					mailActiveBtn -= 1
				}
			}
		} else {  // if exist in DB
			//change btn text and class
			$(this).siblings('.btn').removeClass('btn--popup-reg').addClass('btn--popup-login').text('Вход')
		}

	}

	if ($(this).attr('name') === 'user_pass') {
		//if val reg has done test add +1 to active btn
		if ($(this).val().length > 2) {
			//limit
			if (passActiveBtn >= 1) {
				passActiveBtn = 1
			} else {
				passActiveBtn += 1

			}
		}
		if ($(this).val().length < 3) {
			//limit
			if (passActiveBtn <= 1) {
				passActiveBtn = 0
			} else {
				passActiveBtn -= 1
			}
		}
	}

	//if mail and pass val is valid
	if (mailActiveBtn == 1 && passActiveBtn == 1) {
		$(this).siblings('.btn').removeClass('btn--disable')
	} else {
		$(this).siblings('.btn').addClass('btn--disable')
	}

	console.log(mailActiveBtn, passActiveBtn)

})

//profile edit btn in mobile
if ($('.profile').length) {

	if ($(window).width() < 768) {
		$('.profile-top .flex.col-12').append($('.btn-profile-edit'))

		function changeInputBlockDOM(element, after) {
			$(element).parent().insertAfter($(after).parent())
		}

		changeInputBlockDOM('.field--input[name="region"]', '.field--input[name="country"]')
		changeInputBlockDOM('.field--input[name="index"]', '.field--input[name="region"]')
		changeInputBlockDOM('.field--input[name="street"]', '.field--input[name="city"]')
	}

	// $('.field--input[name="flat"], .field--input[name="house"]').parent().addClass('field--single')

}

//comment textarea hightlight if focus
$('.comment-add--textarea textarea').on('focus', function () {
	$(this).parent().addClass('active')
});

$('.comment-add--textarea textarea').on('blur', function () {
	$(this).parent().removeClass('active')
});


if ($('.chat').length) {

	
	//for firefox hieght
	var f = navigator.userAgent.search("Firefox"); 
	if (f > -1) {
		$('.chat').css('height', (windowH - 195) + 'px')
	}  


	//show setting chat if click right mouse btn
	$(document).on('contextmenu', function (e) {

		e.preventDefault();

		//position of chat menu setting
		if (e.button == 2) {
			$('.chat-setting').addClass('active').css({
				top: event.pageY + "px",
				left: event.pageX + "px"
			});
		}

		//hide chat menu setting
		$(document).bind("mousedown", function (e) {

			// If the clicked element is not the menu
			if (!$(e.target).parents(".chat-setting").length > 0) {
				$('.chat-setting').removeClass('active')
			}
		});
	})

	if (windowW < 992) {
		$('.chat-person--item').on('click', function () {
			$('.chat-sidebar').addClass('hide')
		});

		$('.chat-info--return-mob').on('click', function () {
			$('.chat-sidebar').removeClass('hide')
		});
	}


	if (windowW < 768) {
		$('.chat-block').each(function () {
			$(this).find('.chat--sms').insertBefore($(this).find('.chat--info'))
		})


		// finger swipe through 
		var sms = document.querySelectorAll('.chat--sms')

		for (var i = 0; i < sms.length; i++) {
			sms[i].addEventListener('touchstart', handleTouchStart, false);
			sms[i].addEventListener('touchmove', handleTouchMove, false);
		}
		var xDown = null;
		var yDown = null;

		function getTouches(evt) {
			return evt.touches ||			 // browser API
				evt.originalEvent.touches; // jQuery
		}

		function handleTouchStart(evt) {
			const firstTouch = getTouches(evt)[0];
			xDown = firstTouch.clientX;
			yDown = firstTouch.clientY;
		};

		function handleTouchMove(evt) {

			if (!xDown || !yDown) {
				return;
			}

			var xUp = evt.touches[0].clientX;
			var yUp = evt.touches[0].clientY;

			var xDiff = xDown - xUp;
			var yDiff = yDown - yUp;

			if (Math.abs(xDiff) > Math.abs(yDiff)) {/*most significant*/
				if (xDiff > 0) {
					/* left swipe */
					$('.form-send--sms').text(evt.target.textContent).show();
					$(evt.target.parentNode).addClass('swipe')
					setInterval(function () {
						$(evt.target.parentNode).removeClass('swipe')
					}, 500)

				} else {
					/* right swipe */
				}
			} else {
				if (yDiff > 0) {
					/* up swipe */
				} else {
					/* down swipe */
				}
			}
			/* reset values */
			xDown = null;
			yDown = null;
		};
	}

	//chat-setting p click
	// $('.chat-setting p').on('click', function(){

	//   //if qoute click
	//   if($(this).attr('id') == 'chat-quote') {
	//	 $('.form-send--sms').html(clickedSms).show() //quote sms
	//	 $('.chat-setting').removeClass('active') //hide chat menu setting
	//   }
	// });



	//chat date change
	var today = new Date()

	//add comment
	function addComment(currentDate, sms, fullDate) {

		if (windowW > 768) {
			var commentBody = '<div class="chat-block" data-date="' + fullDate + '">'
				+ '<p class="chat--info">Вы в <span class="chat--title">' + currentDate + '</span></p>'
				+ '<p class="chat--sms">' + sms + '</p>'
				+ '</div>'
		} else {
			var commentBody = '<div class="chat-block" data-date="' + fullDate + '">'
				+ '<p class="chat--sms">' + sms + '</p>'
				+ '<p class="chat--info">Вы в <span class="chat--title">' + currentDate + '</span></p>'
				+ '</div>'
		}

		return commentBody
	}

	//add new day block
	function addFullDay(currentDay) {
		var getDay = currentDay.split(' ')
		var showDate = getDay[2] + '.' + getDay[1]
		var fullDay = '<div class="chat-fullday flex flex-column">'
			+ '<p class="chat-day" data-day="' + currentDay + '"> ' + showDate + '</p>'
			+ '</div>'

		return fullDay
	}

	//click on send btn
	$('.btn--send').on('click', function () {
		var today = new Date()

		var fullDate = today.getFullYear() + ' ' + (today.getMonth() + 1) + ' ' + today.getDate() + ' ' + today.getHours() + ' ' + today.getMinutes()
		var curentTime = today.getHours() + ':' + today.getMinutes()


		//if start new day
		if (+$('.chat-day').last().attr('data-day').split(' ')[2] != today.getDate()) {
			$('.chat').append(addFullDay(today.getFullYear() + ' ' + (today.getMonth() + 1) + ' ' + today.getDate()))
			$('.chat-fullday').last().append(addComment(curentTime, $(this).siblings('input').val(), fullDate))

			//update filterDays
			filterDays[+lastDayGet + 1] = { //add new key to day + 1
				'chat-date': 'Сегодня',
				'top-position': $('.chat')[0].scrollHeight - $('.chat-fullday').last().height() - 80 //full height in scroll block - height new day - margin
			}
			//clear seelct sms
			$('.form-send--sms').hide()

			return false
		}

		//if current day
		$('.chat-fullday').last().append(addComment(curentTime, $(this).siblings('input').val(), fullDate))

		//clear seelct sms
		$('.form-send--sms').hide()
	});

	//scroll to last message when we create message
	$('.btn--send').on('mouseup', function () {
		setTimeout(function () {
			d.scrollTop(d.prop("scrollHeight"));
		}, 10) //10 msec wait while message created
	});

	var unfilterDays = {} //get dates and position when each day start
	$('.chat-day').each(function (index) {
		unfilterDays[index] = {
			'data-day': $(this).attr('data-day'),
			'top-position': $(this).offset().top.toFixed(0) - 160
		}
	})

	var lastDayGet = 0
	var filterDays = {} //filter unfilterDays to final values
	$.each(unfilterDays, function (index, value) {

		var dataDay = value['data-day'].split(' ')[2]

		if (dataDay == today.getDate()) { //if date from unfilterDays == current day
			filterDays[index] = {
				'chat-date': 'Сегодня',
				'top-position': value['top-position']
			}
		} else if (dataDay == (today.getDate() - 1)) { //if date from unfilterDays == yesterday
			filterDays[index] = {
				'chat-date': 'Вчера',
				'top-position': value['top-position']
			}
		} else {
			filterDays[index] = { // another date
				'chat-date': value['data-day'],
				'top-position': value['top-position']
			}
		}

		lastDayGet = index //get last index of all days
	})

	//change text in chat-date on scroll
	$('.chat').on('scroll', function () {

		for (var i in filterDays) {
			if ($(this).scrollTop().toFixed(0) > filterDays[i]['top-position']) { // if scroll > then filter i val 
				$('.chat-date').text(filterDays[i]['chat-date']) // change text
			}
		}

	})

	//scroll to bottom when page onload
	var d = $('.chat');
	d.scrollTop(d.prop("scrollHeight"));
}

// EOT chat


//checbox
// $('.comment-ability--checkbox .filter-by--input').on('change', function(){
//   console.log('123')
//   $(this).parent().toggleClass('active')
// });

//forum page sort by newset
$('.forum-settings span').on('click', function () {
	if ($('span', this).text() == 'Первый пост') {
		$('span', this).text('Последний пост')
	} else {
		$('span', this).text('Первый пост')
	}
});

//show comment\content in institution pages 
$('.institution-btn[data-institution-view]').on('click', function () {
	$(this)
		.addClass('active')
		.siblings('.institution-btn').removeClass('active') //bgc active btn

	//show needed content
	var institutionBtnData = $(this).attr('data-institution-view')

	$('.institution-content--view[data-institution-content=' + institutionBtnData + ']')
		.addClass('active')
		.siblings('.institution-content--view')
		.removeClass('active')
});

//forum list show themes
$('.forum-type--center span').on('click', function () {
	$(this).siblings('.forum-type--themes').slideToggle(300)
	$(this).toggleClass('active')
});

//slider price universities
if ($('#Slider2').length) {
	$("#Slider2").slider({ from: 5000, to: 150000, heterogeneity: ['50/50000'], step: 1000, dimension: '&nbsp;€' });
}

//close filter
var show = true
$('.filter-hei .btn--filter').on('click', function () {
	if (show) {
		$('.filter-hei form').hide()
		$('.filter-hei').css('padding', '0')
		$(this).html('Показать фильтры' + '<i class="fas fa-chevron-down"></i>')
		show = false
	} else {
		$('.filter-hei form').show()
		$('.filter-hei').css('padding-bottom', '56px')
		$(this).html('Скрыть фильтры' + '<i class="fas fa-times-circle"></i>')
		show = true
	}
});

if ($('#chartView').length) {
	//chart cv full
	google.charts.load('current', { packages: ['corechart', 'line'] });
	google.charts.setOnLoadCallback(drawBasic);

	function drawBasic() {

		var data = new google.visualization.DataTable();
		data.addColumn('number', 'X');
		data.addColumn('number', 'Dogs');

		data.addRows([
			[0, 0], [1, 10], [2, 23], [3, 17], [4, 18], [5, 9],
			[6, 11], [7, 27], [8, 33], [9, 40], [10, 32], [11, 35],
			[12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
			[18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
			[24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
			[30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
			[36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
			[42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
			[48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
			[54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
			[60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
			[66, 70], [67, 72], [68, 75], [69, 80]
		]);

		var options = {
			hAxis: {
				title: 'Time'
			},
			vAxis: {
				title: 'Popularity'
			}
		};

		var chart = new google.visualization.LineChart(document.getElementById('chartView'));

		chart.draw(data, options);
	}
}

if ($('#chartOffer').length) {
	//chart cv full
	google.charts.load('current', { packages: ['corechart', 'line'] });
	google.charts.setOnLoadCallback(drawBasic);

	function drawBasic() {

		var data = new google.visualization.DataTable();
		data.addColumn('number', 'X');
		data.addColumn('number', 'Dogs');

		data.addRows([
			[0, 0], [1, 10], [2, 23], [3, 17], [4, 18], [5, 9],
			[6, 11], [7, 27], [8, 33], [9, 40], [10, 32], [11, 35],
			[12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
			[18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
			[24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
			[30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
			[36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
			[42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
			[48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
			[54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
			[60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
			[66, 70], [67, 72], [68, 75], [69, 80]
		]);

		var options = {
			hAxis: {
				title: 'Time'
			},
			vAxis: {
				title: 'Popularity'
			}
		};

		var chart = new google.visualization.LineChart(document.getElementById('chartOffer'));

		chart.draw(data, options);
	}
}


//change filter 
$('.filter-price--cost').on('click', function () {
	if ($('span', this).text() == 'По убыванию') {
		$('span', this).text('По возрастанию')
		$('i', this).removeClass('fa-sort-amount-down').addClass('fa-sort-amount-up')
		$('input', this).val('asc')
	} else {
		$('span', this).text('По убыванию')
		$('i', this).removeClass('fa-sort-amount-up').addClass('fa-sort-amount-down')
		$('input', this).val('desc')
	}
});


//career main slider
if ($('.main-slider').length) {
	$('.main-slider').slick({
		dots: true,
		arrows: false
	})
}

//career main close
$('.main-popup--close').on('click', function () {
	$('.main-popup').hide()
});

//career main banner btn
$('.btn--candidates').on('click', function () {
	$(this).hide()
	$('.search-employee').css('display', 'flex');
});

//career radio btn
//checked last tarif item
$('.plan-price').last().find('.filter-by--input').prop('checked', true)
$('.filter-career').on('click', function () {
	if ($(this).find('input:checkbox:checked').length > 0) {
		$('.filter-by--type', this).css('background-color', '#afc0ff')
		$(this).find('input').prop('checked', true)
		
		//pik plan checkboxes
		if($('.plan-price').length){
			$(this).parents('.plan-price').find('.plan-price--checkbox span').addClass('active')
		}

	} else {
		$('.filter-by--type', this).css('background-color', '#cdcdcd')
		$(this).find('input').prop('checked', false)
		
		
		//pik plan checkboxes
		if($('.plan-price').length){
			$(this).parents('.plan-price').find('.plan-price--checkbox span').removeClass("active");
		}

	}
});

//pik plan checkboxes
if($('.plan-price').length){
$('.plan-price--checkbox').on('click', function () {

	if($('span', this).hasClass('active')) {
		$('span', this).removeClass('active')
		// $(this).parent().find('.filter-by--input').removeAttr("checked");
		$(this).parent().find('.filter-by--input').prop('checked', false)
		$(this).parent().find('.filter-by--type').css('background-color', '#cdcdcd')
	} else {
		$('span', this).addClass('active')
		$(this).parent().find('.filter-by--input').prop('checked', true)
		// $(this).parent().find('.filter-by--input').attr("checked", "checked");
		$(this).parent().find('.filter-by--type').css('background-color', '#afc0ff')
	}
});
}

//career show popup in search candidate
$('.conformity').on('mouseenter', function () {
	var position = $(this).offset()
	var hoverH = $(this).outerHeight()
	var hoverW = $(this).outerWidth()
	var noteH = $('.candidate-popup--note').height()
	var noteW = $('.candidate-popup--note').width()
	$('.candidate-popup--note').show().css({
		left: position.left + hoverW - noteW - 27,
		top: position.top - noteH - hoverH - 24
	})
});

// //career add-remove experience
// if ($('.cv-exp').length && $(document).ready()) {
// 	// var jobNum = +$('.job-num').text()
// 	// var newExp = $('#clone').clone()

// 	var div = document.getElementById('clone'),
// 		clone = div.cloneNode(true, true); // true means clone all childNodes and all event handlers

// 	console.log(clone)
// 	$(document).on('click', '.add-exp', function () {
// 		// $('<div class="cv-content">' + newExp + "</div>").appendTo('.cv-exp')
// 		document.querySelector('.cv-exp').appendChild(clone);
// 		// jobNum + 1
// 		// $('.job-num').last().text(jobNum + 1)
// 	});


// 	//career disable duration of work
// 	$('.cv-periods .filter-select').on('click', function (e) {
// 		e.preventDefault()
// 	});

// }

// // #remove-exp')

//career login
if($('.header-career').length){

var login = 'admin@test.com'
var pass = '123456'

//login
$('.popup-inputs .btn').on('click', function(){
	if($(this).hasClass('btn--popup-login')){
		localStorage.setItem('login', 'true')
	//if boss\employee
	if(localStorage.getItem('role') == 'boss') {
		window.location.href = '/pik_plan.html'; 
	} else   {
		window.location.href = '/cv.html';	с
	}
	} 
});

//exit
$('.logout').on('click', function(){
	localStorage.removeItem("login")
	window.location.href = '/';	
});

//full cv
$('.cv-save').on('click', function(){
	window.location.href = '/cv_full.html';	
});

//show\hide login 
if(localStorage.getItem('login')) {
	$('.header-user, .switch-role').show()
	$('.btn--login').hide()
}

// //switch role
// $('.switch-role').on('click', function(){
	

// 	//if boss\employee
// 	if(localStorage.getItem('role') == 'boss') {
// 		window.location.href = '/cv.html';	
// 		localStorage.setItem('role', 'employee')
// 	} else   {
// 		window.location.href = '/pik_plan.html';	
// 		localStorage.setItem('role', 'boss')
// 	}
// });
if(localStorage.getItem('role') == 'boss') {
	$('.switch-role').text('Соискатель')
} else   {
	$('.switch-role').text('Работодатель')
}

//go to search
$('.btn-payed').on('click', function(){
	window.location.href = '/job_search.html';	
});

$('.switch-wrapper input').on('click', function(){
	localStorage.setItem('role', $(this).parents('.switch-wrapper').find('input:checked').attr('data-role'))
});
localStorage.setItem('role', 'boss')

}

//career pik plan price radio
 $('.plan-item').on('click', function(){
	$('.plan-item input').removeAttr('checked')
	$('input' ,this).attr('checked','checked')
 });

//career search tag
$('.search-tag').on('click', function(){ 
	$(this).toggleClass('active')
 });

 //salary duration
 $('.salary-durat p').on('click', function(){ 
	$('.salary-durat ul').toggleClass('active')
	$('.salary-durat').toggleClass('active')
 });

 $('.salary-durat li').on('click', function(){ 
	 var durationText = $(this).text()
	 var durationData = $(this).attr('data-salary')
	$('.salary-durat p').text(durationText).attr('data-salary', durationData)
	$('.salary-durat ul').removeClass('active')
	$('.salary-durat').removeClass('active')
 });

//salary price filter
$('.slary--price-filter').on('click', function(){ 
	$(this).toggleClass('active') 
	if($(this).text() == 'По возрастанию'){
		$(this).text('По убыванию').attr('data-price-filter', '1')
	} else {
		$(this).text('По возрастанию').attr('data-price-filter', '0')
	}
 });

//connects show sort menu
$('.connect-sort--item > p').on('click', function(){ 
	var sortParent = $(this).parent()
	
	if(sortParent.hasClass('active')){
		$(this).parent().removeClass('active')
	} else {
		$('.connect-sort--item').removeClass('active')
		$(this).parent().addClass('active')
	}
 });

//connects cahnge sort item
$('.connect-sort--menu p').on('click', function(){ 
	var itemAttr = $(this).attr('data-connect-sort')
	var itemText = $(this).text()
	$('.connect-sort--item').removeClass('active')
	$(this).parent().siblings('p').text(itemText).attr('data-connect-sort', itemAttr)
 });


//show connect settings
$('.connect-setting span').on('click', function(){ 
	$(this).siblings('.connect-menu').toggle()
 });

//toggle connects item
$('.toggle-connect').on('click', function(){ 
	$(this).toggleClass('active').next().slideToggle()
 });

 //show menu 
 $('.mobile-toggle').on('click', function(){
	$(this).toggleClass('active')
	$('.header-nav--ul').slideToggle({
	  start: function () {
		$(this).css({
		  display: "flex"
		})
	  }
	});
  });

$('.menu-item-has-children').on('click', function(){
	$(this).toggleClass('active')
	$('.submenu', this).slideToggle();
  });

  if(windowW < 768) {
	  $('.menu-item-has-children').each(function(){
		  $(this).append($('<i class="fas fa-chevron-circle-down"></i>'))
	  })
  }