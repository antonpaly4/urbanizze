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

  calculate: function(){
    return this.imageWidth * this.imagesCount;
  },

  switchImage: function(e){
    var $btn = $(e.currentTarget)
      , direction = $btn.data('direction')
      , $carousel = $('.js-gallery-carousel')
      , curPos = parseInt((parseFloat($carousel.css('left')) * 72 / 96).toFixed(0))
      , $currentNumber = $('.js-curent-viewed')
      , curImage = parseInt($currentNumber.text())
      , newPos, newImg;

    e.preventDefault();

    if($btn.hasClass('js-disabled')) return;

    if(direction === 'left'){
      newPos = curPos - this.imageWidth;
      newImg = curImage + 1;
    }
    else{
      newPos = this.imageWidth + curPos;
      newImg = curImage - 1;
    }
    if(newImg < 1 || newImg > this.imagesCount) return;

    $btn.addClass('js-disabled');

    $carousel.css('left', newPos + 'pt');
    $currentNumber.text(newImg);

    setTimeout(function(){$btn.removeClass('js-disabled')}, 400);
  },

  render: function(){
    var cWidth = 'width:' + this.calculate() + 'pt'
      , images = [];

    _.each(carouselCollection.models, function(image){
      images.push({url: image.get('url'), title: image.get('title')});
    });

    $(this.el).append(template({carouselWidth: cWidth, images: images, imgCount: this.imagesCount}));
  }
});

module.exports = new photoCarouselView;