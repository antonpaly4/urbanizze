var $ = require('jquery');

var timeout = null;

$(document)
  .on('mouseover', '.js-onhover', function(){
    var $card = $(this);
    clearTimeout(timeout);
    timeout = setTimeout(function(){
      $('.description', $card).css('top', 0);
    }, 1000);
  })
  .on('mouseleave', '.js-onhover', function(){
    clearTimeout(timeout);
    $('.description', $(this)).css('top', '100%');
  })
  .on('click', '.js-show-hidden', function(e){
    e.preventDefault();

    var $link = $(this)
      , $box = $link.closest('.js-box')
      , $hidden = $box.find('.js-hidden');

    $link.hide();
    $hidden.removeClass('invisible');
  })
;