var Backbone = require('bakckbone')
  , $ = require('jquery')
  , _ = require('underscore');

var carouselCollection = require('../../collections/photoCarousel/collection');

var photoCarouselView = Backbone.View.extend({
  el: 'js-carousel-holder',

  render: function(){
    _.each(carouselCollection, function(photo){
      $(el).append('<div>' + photo.get('url') + '</div>');
    });
  }
});

module.exports = new photoCarouselView;