if ($('.chat').length) {

    var windowW  = $(window).width()

    var clickedSms,
        clickedSmsPosition //STOP HERE 14.11.2018
    //show setting chat if click right mouse btn
    $(document).on('contextmenu', function (e) {
  
      e.preventDefault();
      clickedSms = e.target.textContent
      clickedSmsPosition = e.target
  
  
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
  
    if (windowW < 768) {
      $('.chat-block').each(function () {
        $(this).find('.chat--sms').insertBefore($(this).find('.chat--info'))
      })
  
      // finger swipe through 
  
    var sms = document.querySelectorAll('.chat--sms')
  
    for(var i=0; i < sms.length; i++){
      sms[i].addEventListener('touchstart', handleTouchStart, false);
      sms[i].addEventListener('touchmove', handleTouchMove, false);
  }
    var xDown = null;                                                        
    var yDown = null;
    
    function getTouches(evt) {
      return evt.touches ||             // browser API
             evt.originalEvent.touches; // jQuery
    }                                                     
    
    function handleTouchStart(evt) {
        const firstTouch = getTouches(evt)[0];                                      
        xDown = firstTouch.clientX;                                      
        yDown = firstTouch.clientY;                        
    };                                                
    
    function handleTouchMove(evt) {
                                
        if ( ! xDown || ! yDown ) {
            return;
        }
    
        var xUp = evt.touches[0].clientX;                                    
        var yUp = evt.touches[0].clientY;
    
        var xDiff = xDown - xUp;
        var yDiff = yDown - yUp;
    
        if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
            if ( xDiff > 0 ) {
                /* left swipe */    
                $('.form-send--sms').text(evt.target.textContent).show()
                
            } else {
                /* right swipe */
            }                       
        } else {
            if ( yDiff > 0 ) {
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
    $('.chat-setting p').on('click', function(){
      
      //if qoute click
      if($(this).attr('id') == 'chat-quote') {
        $('.form-send--sms').html(clickedSms).show() //quote sms
        $('.chat-setting').removeClass('active') //hide chat menu setting
      }
    });
  
  
  
    //chat date change
    var today = new Date()
  
    //add comment
    function addComment(currentDate, sms, fullDate) {
      var commentBody = '<div class="chat-block" data-date="' + fullDate + '">'
                        + '<p class="chat--info">Вы в <span class="chat--title">' + currentDate + '</span></p>'
                        + '<p class="chat--sms">' + sms + '</p>'
                      + '</div>'
  
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
  
      //if qoute have data
      var selectedText = '<span class="form-send--quote">' + $('.form-send--sms').text() + '</span>'
   
  
      //if start new day
      if (+$('.chat-day').last().attr('data-day').split(' ')[2] != today.getDate()) {
        $('.chat').append(addFullDay(today.getFullYear() + ' ' + (today.getMonth() + 1) + ' ' + today.getDate()))
        $('.chat-fullday').last().append(addComment(curentTime,( selectedText +  $(this).siblings('input').val()) , fullDate))
  
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
      $('.chat-fullday').last().append(addComment(curentTime,(selectedText + $(this).siblings('input').val()), fullDate))
  
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