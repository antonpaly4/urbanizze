(function(window, $){

  var timeout = null;

  $('.js-onhover').on('mouseover', function(){
    var $card = $(this);
    clearTimeout(timeout);
    timeout = setTimeout(function(){
      $('.description', $card).css('top', 0);
    }, 1000);
  }).on('mouseleave', function(){
    clearTimeout(timeout);
    $('.description', $(this)).css('top', '100%');
  })

})(window, jQuery);