(function(window, $){

  var timeout = null;

  $('.js-onhover').on('mouseover', function(){
    var $card = $(this);
    clearTimeout(timeout);
    timeout = setTimeout(function(){
      $('.description', $card).css('top', 0);
      $('.description_holder', $card).css('opacity', 1);
    }, 1000);
  }).on('mouseleave', function(){
    clearTimeout(timeout);
    $('.description', $(this)).css('top', '100%');
    $('.description_holder', $(this)).css('opacity', 0);
  })

})(window, jQuery);