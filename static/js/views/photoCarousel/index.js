var Backbone = require('backbone')
  , $ = require('jquery')
  , _ = require('underscore');

var carouselCollection = require('../../collections/photoCarousel/collection');

var template = require('../../../templates/carousel/index.jade');

var photoCarouselView = Backbone.View.extend({
  el: '.js-carousel-holder',

  imageWidth: 449,
  imagesCount: carouselCollection.models.length,

  events: {
    'click .js-slide-image': 'switchImage'
  },

  switchImage: function(e){
    var $btn = $(e.currentTarget)
      , direction = $btn.data('direction')
      , $carousel = $('.js-gallery-carousel')
      , $image = $carousel.find('.event__gallery-image_active')
      , $iNumber = $('.js-curent-viewed')
      , curImage = parseInt($iNumber.text())
      , newNumber, $newImage;

    e.preventDefault();

    if($btn.hasClass('js-disabled')) return;
    $btn.addClass('js-disabled');

    if(direction === 'right'){
      $newImage = $image.next('.js-carousel-image').length ? $image.next('.js-carousel-image') : $carousel.find('.js-carousel-image:first-child');
      newNumber = curImage + 1;
    }
    else{
      $newImage = $image.prev('.js-carousel-image').length ? $image.prev('.js-carousel-image') : $carousel.find('.js-carousel-image:last-child');
      newNumber = curImage - 1;
    }
    if(newNumber < 1) newNumber = this.imagesCount;
    if(newNumber > this.imagesCount) newNumber = 1;

    console.log($newImage);

    $image.removeClass('event__gallery-image_active');
    setTimeout(function(){
      $newImage.addClass('event__gallery-image_active');
    }, 250);

    $iNumber.text(newNumber);

    setTimeout(function(){
      $btn.removeClass('js-disabled');
    }, 550);
  },

  render: function(){
    var images = [];

    _.each(carouselCollection.models, function(image){
      images.push({url: image.get('url'), title: image.get('title')});
    });

    $(this.el).html(template({images: images, imgCount: this.imagesCount}));
  }
});

module.exports = new photoCarouselView;